<?php
// setup the autoloading
require_once 'vendor/autoload.php';
// setup Propel
require_once 'generated-conf/config.php';
require_once 'myClasses/PHPDebug.php';
require_once( "myClasses/KpiTable.php" );
require_once( "myClasses/DataStore.php" );
require_once( "myClasses/Assignee.php" );
include "vendor/backendless/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use backendless\Backendless;
use backendless\model\BackendlessUser;
use backendless\services\persistence\BackendlessDataQuery;

$defaultLogger = new Logger('defaultLogger');
$defaultLogger->pushHandler(new StreamHandler('log/propel.log', Logger::WARNING));
$serviceContainer->setLogger('defaultLogger', $defaultLogger);

function rm_from_array($needle, &$array, $all = true){
    if(!$all){
        if(FALSE !== $key = array_search($needle,$array)) unset($array[$key]);
        return;
    }
    foreach(array_keys($array,$needle) as $key){
        unset($array[$key]);
    }
}
function getDay($str){
    if ($str=="-") return 0;
    $step1 = explode(" ",$str);
    $newData = explode("-",$step1[0]);
    return $newData[0];
}
function getMonth($str){
    if ($str=="-") return 0;
    $step1 = explode(" ",$str);
    $newData = explode("-",$step1[0]);
    return $newData[1];
}
function getYear($str){
    if ($str=="-") return 0;
    $step1 = explode(" ",$str);
    $newData = explode("-",$step1[0]);
    return $newData[2];
}
function loadBigReport()
{
    $myDebugSys = new PHPDebug();
    $myDebugSys->debug("Start process of loading data to the base<br>");
    $anyData = myDataStoreQuery::create()->find();
    if($anyData!=""){
        $myDebugSys->debug("We already have data in the table");
        $anyData->delete();
    }
    $myDataStore = new myDataStore();
    $myData = getDataFromReport('http://localhost:3000/lrv0ve06e3f');
        foreach ($myData as $index => $col)
        {
            $myDataStore->setProject($col[0]);
            $myDataStore->setNonBil($col[1]);
            $myDataStore->setAssignee($col[2]);
            $myDataStore->setEstimated(floatval($col[3]));
            $myDataStore->setSpentTime(floatval($col[4]));
            $myDataStore->setDay(getDay($col[5]));
            $myDataStore->setMonth(getMonth($col[5]));
            $myDataStore->setYear(getYear($col[5]));
            $myDataStore->save();
            $myDataStore->clear();
        }
    $myDebugSys->debug("The process of loading data to the base was finished");
}
function getDataFromReport($link)
{
    $myDebugSys = new PHPDebug();
    $myDebugSys->debug("Start process of getting the data");
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $link);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP');
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($data);
    $myDebugSys->debug ("The process of getting data was finished...");
    return $obj->results->data;

}
function showDataInTable() //получить список данных из таблички DataStore и вывести их ввиде таблтчки
{
    $myDebugSys = new PHPDebug();
    $anyData = myDataStoreQuery::create()->find();
    if($anyData==""){
        $myDebugSys->debug("We donn't have data to show...");
    }
    $count=0;
    $res=$anyData->toArray();
    foreach ($res as $key=>$val)
    {
        $count++;
        echo "<tr>";
        echo "<td>" . $count . "</td>" ;
        echo "<td>" . $res[$key]["Project"]   ."</td>";
        echo "<td>" . $res[$key]["NonBil"]    ."</td>";
        echo "<td>" . $res[$key]["Assignee"]  ."</td>";
        echo "<td>" . $res[$key]["Estimated"] ."</td>";
        echo "<td>" . $res[$key]["SpentTime"] ."</td>";
        echo "<td>" . $res[$key]["Day"].".".$res[$key]["Month"].".".$res[$key]["Year"]."</td>";
        echo "</tr>";

    }
}
function logOutBack($someUser) //вылогинить пользователя из системы
{
    try {
        $res = Backendless::$UserService->logout($someUser);
    }
    catch (Exception $ex){
        return $ex;
    }
    return true;
}
function loginToTheSystem($someLogin, $somePass) //логин пользрвателя в систему
{
    Backendless::initApp('70518918-F4D9-EA7A-FF91-7E981EF9CF00', '05193E30-2613-A4C8-FFC7-2431B4935800', 'v1');
    $curUser = $someLogin;
    $curPass = $somePass;
    $user = new BackendlessUser();
    //$user->setEmail( $curUser );
    //$user->setPassword( $curPass );

    try {
        $res = Backendless::$UserService->login($curUser,$curPass);
    }
    catch(Exception $ex){

        $resultOfAuth = false;
        echo "Error!" . $ex . "<br>";
        return $resultOfAuth;
    }
    if($user->email=!$curUser){
        $resultOfAuth = false;
    } else {
        $resultOfAuth = true;
    }
    $_POST["username"] = $res->name;
    return $resultOfAuth;
}
function getTotalEstimatedHours(){ //получаем totalEstimated из KpiTable
    $query = new BackendlessDataQuery();
    $result = Backendless::$Data->of( "KpiTable" )->find( $query )->getAsObject();
    foreach ($result as $key=>$val) {
        $ressult[] = $result[$key]->totalEstimated;
    }
    return $ressult;
}
function getTotalSpentHours(){ //получаем totalSpentTime из KpiTable
    $query = new BackendlessDataQuery();
    $result = Backendless::$Data->of( "KpiTable" )->find( $query )->getAsObject();
    foreach ($result as $key=>$val) {
        $ressult[] = $result[$key]->totalSpentTime;
    }
    return $ressult;
}
function getTotalSpentBill(){ //получаем billblSpentTime из KpiTable
    $query = new BackendlessDataQuery();
    $result = Backendless::$Data->of( "KpiTable" )->find( $query )->getAsObject();
    foreach ($result as $key=>$val) {
        $ressult[] = $result[$key]->billblSpentTime;
    }
    return $ressult;
}
function getTotalSpentNonBill(){
    $query = new BackendlessDataQuery();
    $result = Backendless::$Data->of( "KpiTable" )->find( $query )->getAsObject();
    foreach ($result as $key=>$val) {
        $ressult[] = $result[$key]->nonBillblSpentTime;
    }
    return $ressult;
}
function getTotalPM(){
    $query = new BackendlessDataQuery();
    $result = Backendless::$Data->of( "KpiTable" )->find( $query )->getAsObject();
    foreach ($result as $key=>$val) {
        $ressult[] = $result[$key]->totalPM;
    }
    return $ressult;
}
function getTotalProjects(){
    $query = new BackendlessDataQuery();
    $result = Backendless::$Data->of( "KpiTable" )->find( $query )->getAsObject();
    foreach ($result as $key=>$val) {
        $ressult[] = $result[$key]->totalProjects;
    }
    return $ressult;
}
function getAssigneesFromRepor()
{
    $myDebugSys = new PHPDebug();
    $myDebugSys->debug("getAssigneesFromRepor");
    $data = myDataStoreQuery::create()
        ->select('Assignee')
        ->groupByAssignee()
        ->find()->toArray();
    rm_from_array("-", $data, true);
    if($data=="")$myDebugSys->debug("No data");
    return $data;
}
function createUserTable(){
    $data = getAssigneesFromRepor();
    foreach ($data as $user){
        $spentSum = myDataStoreQuery::create()
        ->where('mydatastore.Assignee = ?',$user)
        ->withColumn('SUM(SpentTime)')
        ->select('SUMSpentTime')
        ->find()->toArray();

        echo $user." Spent = ". $spentSum[0]."<br>";
    }




//
//    $value = OrderEquipmentQuery::create()
//        ->withColumn('SUM(price_equipment)')
//        ->filterByOrderId(57072)
//        ->groupByOrderId()
//        ->find()
}





















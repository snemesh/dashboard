<?php
// setup the autoloading
require_once 'vendor/autoload.php';
// setup Propel
require_once 'generated-conf/config.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$defaultLogger = new Logger('defaultLogger');
$defaultLogger->pushHandler(new StreamHandler('log/propel.log', Logger::WARNING));
$serviceContainer->setLogger('defaultLogger', $defaultLogger);

function getData($str){
    if ($str=="-") return 0;
    $step1 = explode(" ",$str);
    $step2 = explode("-",$step1[0]);
    $tmpData=$step2[1]."-".$step2[0]."-".$step2[2];
    $tmpData1 = strtotime($tmpData);
    $newData = date("d-m-Y",$tmpData1);
    return $newData;
}
function getMonth($str){
    if ($str=="-") return 0;
    $step1 = explode(" ",$str);
    $step2 = explode("-",$step1[0]);
    $tmpData=$step2[1]."-".$step2[0]."-".$step2[2];
    $tmpData1 = strtotime($tmpData);
    $newData = date("m",$tmpData1);
    return $newData;
}
function getYear($str){
    if ($str=="-") return 0;
    $step1 = explode(" ",$str);
    $step2 = explode("-",$step1[0]);
    $tmpData=$step2[1]."-".$step2[0]."-".$step2[2];
    $tmpData1 = strtotime($tmpData);
    $newData = date("Y",$tmpData1);
    return $newData;
}

function loadBigReport()
{
    echo ("Start process of loading data to the base<br>");
    $myDataStore = new myDataStore();
    $myData = getDataFromReport('http://localhost:3000/lrv0ve06e3f');
    //print_r($myData);
    foreach ($myData as $index => $col) {

    echo $col[7]. "    -----     ".getYear($col[5]) ."<br>";
//        echo "<br>project => ". $myDataStore->setProject($col[0]);
//        echo "<br>Billble => ". $myDataStore->setNonBil($col[1]);
//        echo "<br>Assignee => ". $myDataStore->setAssignee($col[2]);
//        echo "<br>Estimeted => ". $myDataStore->setEstimated(floatval($col[3]));
//        echo "<br>Spent => ". $myDataStore->setSpentTime(floatval($col[4]));
//        echo "<br>Data => ". $myDataStore->setData($col[5]);
//        echo "<br>Year => ". $myDataStore->setDataYear($col[6]);
//        echo "<br>Month => ". $myDataStore->setDataMonth($col[7]);
//        echo "<br><br>Safe data =>". $myDataStore->save();
    }
    echo ("The process of loading data to the base was finished<br>");
}

function getDataFromReport($link)
{
    echo ("Start process of getting the data <br>");
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
    echo ("The process of getting data was finished... <br>");
    return $obj->results->data;

}
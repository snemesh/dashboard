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


$myKpiData = new myAssignee();
$myKpiData->setassigneeName("Nemesh Sergey");
$myKpiData->sethourlyRate(3.33);
$myKpiData->setSalary(4.324);
$myKpiData->save();

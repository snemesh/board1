<?php
/**
 * Created by PhpStorm.
 * User: snemesh
 * Date: 11/28/16
 * Time: 12:29
 */
require_once 'vendor/autoload.php';
require_once 'generated-conf/config.php';
require_once 'myClasses/PHPDebug.php';
require_once 'myClasses/KpiTable.php';
require_once 'myClasses/DataStore.php';
require_once 'myClasses/Assignee.php';
require_once 'vendor/simple_html_dom.php';

include 'vendor/backendless/autoload.php';
require_once 'vendor/backendless/src/BackendlessAutoloader.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use backendless\Backendless;
use backendless\model\BackendlessUser;
use backendless\services\persistence\BackendlessDataQuery;

$defaultLogger = new Logger('defaultLogger');
$defaultLogger->pushHandler(new StreamHandler('log/propel.log', Logger::WARNING));
$serviceContainer->setLogger('defaultLogger', $defaultLogger);


function PrepareTmpDataTable(){
    $myDebugSys = new PHPDebug();
    $myDebugSys->debug("Start PrepareTmpDataTable<br>");
    $newRecord = new myDataTemp();
    $getDataTable = myDataStoreQuery::create()
        ->withColumn('SUM(Estimated)','sumEstimated')
        ->withColumn('SUM(SpentTime)','sumSpentTime')
        ->select(array('project','nonbil','day','sumEstimated','sumSpentTime','userspent'))
        ->groupByDay()
        ->groupByProject()
        ->groupByUserSpent()
        ->groupByNonBil()
        ->groupByProject()
        ->find()
        ->toArray();

    foreach ($getDataTable as $key=>$val){
        $newRecord->setProject($getDataTable[$key]['project']);
        $newRecord->setDate($getDataTable[$key]['day']);
        //echo "Data = ".$getDataTable[$key]['day']."<br>";
        $newRecord->setEmployee($getDataTable[$key]['userspent']);
        $newRecord->setNonBil($getDataTable[$key]['nonbil']);
        $newRecord->setEstimated($getDataTable[$key]['sumEstimated']);
        $newRecord->setSpent($getDataTable[$key]['sumSpentTime']);
        $newRecord->save();
        $newRecord->clear();
    }
    $myDebugSys->debug("PrepareTmpDataTable was finished<br>");
}

function FindEmploeeyByData($someEmploeey,$someDate){
    echo $someEmploeey." : ";
    echo $someDate."<br>";
    $emploeeyRate=array();
    if ($someEmploeey=='-' or $someEmploeey=='' or empty($someEmploeey)){ //проверяем что пришло в переменной
        $emploeeyRate["salary"]=0;                                        //$someEmploeey
        $emploeeyRate["hourlyRate"]=0;                                    //если пустые то присваиваем salary=0
        echo "someEmploeey is Enpty<br>";                                 // и hourlyRate=0
        return $emploeeyRate;                                             // возвразаем это значение в массиве
    }
    if ($someDate=='-' or $someDate=='' or empty($someDate)){ //проверяем что пришло в переменной $someDate
        $emploeeyRate["salary"]=0;                            //если пустые то присваиваем salary=0
        $emploeeyRate["hourlyRate"]=0;                        //и hourlyRate=0
        echo "someDate is Enpty<br>";                         //возвразаем это значение в массиве
        return $emploeeyRate;
    }
    $findUser = myEmployeeQuery::create()
        ->where('myemployee.employee = ?', $someEmploeey)
        ->where('myemployee.data = ?', $someDate)
        ->select(array('salary', 'hourlyRate', 'data'))
        ->find()->toArray();
    if(empty($findUser)){
        $findUser = myEmployeeQuery::create()
            ->where('myemployee.employee = ?', $someEmploeey)
            ->select(array('salary', 'hourlyRate', 'data'))
            ->find()->toArray();
    }
    echo "Emploeey = ".$someEmploeey." ";
    echo "Date = "    .$someDate."     ";
    echo "findUser[salary] = ".$findUser[0]['salary']." ";
    echo "findUser[hourlyRate] = ".$findUser[0]['hourlyRate']." ";
    echo "findUser[data] = ".$findUser[0]['data']." <br>";


    $emploeeyRate["salary"]=$findUser[0]["salary"];
    $emploeeyRate["hourlyRate"]=$findUser[0]["hourlyRate"];

    return $emploeeyRate;
}

function ReadDataTempTable(){
    $myDebugSys = new PHPDebug();
    $myDebugSys->debug("Start ReadDataTempTable reading<br>");
    $tmpData = myDataTempQuery::create()
        ->select(array('project','nonbil','estimated','spent','date','employee'))
        ->find()->toArray();
    $myDebugSys->debug("Finish ReadDataTempTable reading<br>");
    return $tmpData;

}


function ProjectResults(){
    $numberDaysInMonth=168;
    $myDebugSys = new PHPDebug();
    $myDebugSys->debug("Start PrepareTmpDataTable<br>");
    $newRecord = new myProjectTmp();
    $dataTemp = ReadDataTempTable();

    foreach ($dataTemp as $key=>$value){
        $thisEmployee=$dataTemp[$key]['employee'];
        $thisDate = $dataTemp[$key]['date'];
        $rate = FindEmploeeyByData($thisEmployee,$thisDate);
        $newRecord->setProjectName($dataTemp[$key]['project']);
        if($rate["hourlyRate"]==''){
            $rate["hourlyRate"]=$rate["salary"]/$numberDaysInMonth;
        }
        $aCost_tmp=round($dataTemp[$key]['spent']*$rate["hourlyRate"],2);
        $newRecord->setTotalCostSpent($aCost_tmp);
        $newRecord->setEmployee($thisEmployee);
        $newRecord->setDate($thisDate);

        $newRecord->save();
        $newRecord->clear();
        //echo $rate['salary']." ";
        //echo $rate['hourlyRate']." <br>";
    }

}
//PrepareTmpDataTable();
//ProjectResults();

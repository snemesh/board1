<?php


// setup Propel


// setup the autoloading

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
    return $newData[1];
}
function getMonth($str){
    if ($str=="-") return 0;
    $step1 = explode(" ",$str);
    $newData = explode("-",$step1[0]);
    return $newData[0];
}
function getYearMonth($str){
    //09-16-2016 Fri
    if ($str=="-") return 0;
    $step1 = explode(" ",$str);
    $newData = explode("-",$step1[0]);
    $mix=$newData[2].$newData[0];

    return intval($mix);
}
function getYear($str){
    if ($str=="-") return 0;
    $step1 = explode(" ",$str);
    $newData = explode("-",$step1[0]);
    return $newData[2];
}
function loadBigReport() //загружаем данные из отчета Jira в базу данный mySQL
{
    $myDebugSys = new PHPDebug();
    $myDebugSys->debug("Start process of loading data to the base<br>");
    $anyData = myDataStoreQuery::create()->find();
    if($anyData!=""){
        $myDebugSys->debug("We already have data in the table myDataStore");
        $anyData->delete();
        $myDebugSys->debug("The table myDataStore was deleted");
    }
    $myDataStore = new myDataStore();
    $myData = getDataFromReport('http://localhost:3000/lrv0ve06e3f');
    if($myData==""){
        echo "Probably we havn't data from the report - http://localhost:3000/lrv0ve06e3f, Please check";
        $myData = getDataFromReport('http://localhost:3000/lrv0ve06e3f');
    }
        foreach ($myData as $index => $col)
        {
            $myDataStore->setProject($col[0]);
            $myDataStore->setNonBil($col[1]);
            $myDataStore->setAssignee($col[2]);
            $myDataStore->setEstimated(floatval($col[3]));
            $myDataStore->setSpentTime(floatval($col[4]));
            $myDataStore->setDay(intval(getYearMonth($col[5])));
            $myDataStore->setMonth(getMonth($col[5]));
            $myDataStore->setYear(getYear($col[5]));
            $myDataStore->setIssueKey($col[8]); //UssueKey
            $myDataStore->setSummary($col[9]); //Summary
            $myDataStore->setUserSpent($col[10]); //UserSpent
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
function showDataForUsersTable() //получить список данных из таблички DataStore и вывести их ввиде таблтчки
{
    $myDebugSys = new PHPDebug();
    $anyData=myEmployeeQuery::create()->find();
    if($anyData==""){
        $myDebugSys->debug("We donn't have data to show...");
    }
    $count=0;
    $res=$anyData->toArray();
    //print_r($res);
    foreach ($res as $key=>$val)
    {
        $count++;
        $tmpId=$res[$key]["Id"];
        echo "<tr class='even pointer'>";
        echo "<td>" . $res[$key]["Id"]."</td>";
        echo "<td>" . $res[$key]["Employee"]."</td>";
        echo "<td>" . $res[$key]["DateMonth"]."</td>";
        echo "<td class='edit salary ".$tmpId." '>" . $res[$key]["Salary"] . "</td>";
        echo "<td class='edit hourlyrate ".$tmpId." '>" . $res[$key]["hourlyRate"] . "</td>";
        echo "<td class='edit Group ".$tmpId." '>" . $res[$key]["Group"]. " </td>";
        echo "<td>" . $res[$key]["Spented"]."</td>";
        echo "<td class='last'><a href='#'>View</a>";
        echo "</tr>";

    }
}
function showEmployeeTable($someDate) //получить список данных из таблички DataStore и вывести их ввиде таблтчки
{
    //$someDate=date('Ym');
    $dateReport = new DateTime($someDate);
    $dateReport = $dateReport->format('Ym');


    $myDebugSys = new PHPDebug();
    $anyData=myEmployeeQuery::create()
        ->where('myemployee.data = ?', $dateReport)
        ->find();
    if($anyData==""){
        $myDebugSys->debug("We donn't have data to show...");
    }
    $count=0;
    $res=$anyData->toArray();
    //print_r($res);
    foreach ($res as $key=>$val)
    {
        $count++;
        $tmpId=$res[$key]["Id"];
        echo "<tr class='even pointer'>";

        echo "<td>" . $res[$key]["Id"]."</td>";
        echo "<td>" . $res[$key]["Employee"]."</td>";
        echo "<td>" . $res[$key]["Speciality"]."</td>";
        echo "<td>" . $res[$key]["Level"]."</td>";
        echo "<td>" . $res[$key]["Group"]."</td>";
        echo "<td>" . $res[$key]["Data"]."</td>";
        echo "<td class='edit salary ".$tmpId." '>" . $res[$key]["Salary"] . "</td>";

//        echo "<td>" . $res[$key]["DateMonth"]."</td>";
//        echo "<td class='edit salary ".$tmpId." '>" . $res[$key]["Salary"] . "</td>";
//        echo "<td class='edit hourlyrate ".$tmpId." '>" . $res[$key]["hourlyRate"] . "</td>";
//        echo "<td class='edit Group ".$tmpId." '>" . $res[$key]["Group"]. " </td>";
//        echo "<td>" . $res[$key]["Spented"]."</td>";
        echo "<td class='last'><a href='#'>View</a>";
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
    $_POST["login"] = $res->name;
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
    if($data==""){
        $myDebugSys->debug("No data");
        return false;
    }
    return $data;
}
function GetAssigneeFromReport(){
    $data = getAssigneesFromRepor();
    $count=0;
    $assignee = array();
    foreach ($data as $user){
        $spentSum = myDataStoreQuery::create()
        ->where('mydatastore.Assignee = ?',$user)
        ->withColumn('SUM(SpentTime)')
        ->select('SUMSpentTime')
        ->find()->toArray();
        $assignee[$count]['assignee'] = $user;
        $assignee[$count]['spent'] = round($spentSum[0],2);
        $count++;
        //echo $user." Spent = ". round($spentSum[0],2)."<br>";
    }
    return $assignee;
}
function GetUserSpentFromReport(){
    $myDebugSys = new PHPDebug();
    $myDebugSys->debug("Start function getUserSpentFromReport");
    $data = myDataStoreQuery::create()      //ищем в таблице DataStore
        ->select('userspent')               // все записи в колонке userspent
        ->groupByUserSpent()                // и груперуем из по колоке userspent
        ->find()->toArray();                // отдем в виде масива в переменную $data
    if(empty($data)){                          //если масив пустой -
        $myDebugSys->debug("No data");      // выводим что нет данных
        echo "No data in data Array, maybe you tabele DataStore is Empty"."<br>";
        return false;
    }else{                                  // иначе
        rm_from_array("-", $data, true);    // иначе удаляем дубоикаты
    }
    //в итоге в переменно $data у нас находятся все userspent
    $count=0;                               //созадем счетчик
    $usersspent = array();                  //создаем массив
    foreach ($data as $user){               //перебираем все значения переменной $data в которой находятся все userspent
        $spentSum = myDataStoreQuery::create()
            ->where('mydatastore.userspent = ?',$user) //суммируем все значения поля SpentTime
            ->withColumn('SUM(SpentTime)')             //исользуем функцию сумирования
            ->select('SUMSpentTime')                   //запсуем в колонуку SUMSpentTime
            ->find()->toArray();                       //отдеем эту колонку в виже масива
        $usersspent[$count]['userspent'] = $user;      //в масив $usersspent записуем найденого юзера
        $usersspent[$count]['spent'] = round($spentSum[0],2); //записуем его спент
        $count++;
    }
    // получили масив с пользователями из потраченнвм временем
    if(empty($usersspent)){
        echo "No data in usersspent Array, pleache the data";
        return false;
    };

    $myDebugSys->debug("Start process of adding UserSpent to the table<br>");
    $uTable = myEmployeeQuery::create()->find()->toArray(); //не пустая ли таблицуа myUserSpent
    if(!empty($uTable)){ // не пустая!
        $myDebugSys->debug("uTable inn't empty - we have data in EmployeeQuery");
        foreach ($usersspent as $index => $user) {
            $userForSearh = $user["userspent"]; //перебираем масив с юзерами
            $myUserSpentInTable = myEmployeeQuery::create()
                ->findByEmployee($userForSearh) //ищем юзера из масива $usersspent в таблице
                ->toArray();
            if (empty($myUserSpentInTable)){     //если в таблицу myUserSpent нет пользователя с именем $user["userspent"]
                $myNewUserSpent = new myUserSpent(); //создаем новую записать в таблице myUserSpent
                $myNewUserSpent->setEmployee($user["userspent"]); //записываем поле UserSpent
                $myNewUserSpent->setSpented($user["spent"]);       //записываем поле spent
                $myNewUserSpent->save();                           //сохраняем
                $myNewUserSpent->clear();                          //подчищаем
                echo "Just added new user ".$user["userspent"]." to the table<br>";
            } else{
                echo $userForSearh ." => already exist, traing to update<br>";
                $myUpdatedUserSpent = myEmployeeQuery::create()->findOneByEmployee($userForSearh);
                //находим такого юзера в таблице UserSpent
                print_r( $myUpdatedUserSpent->toArray());
                $myUpdatedUserSpent->setEmployee($user["userspent"]); //записываем поле UserSpent
                $myUpdatedUserSpent->setSpented($user["spent"]);       //записываем поле spent
                $myUpdatedUserSpent->save();                           //сохраняем
                $myUpdatedUserSpent->clear();                          //подчищаем

            }

        }
    } else {
        $myDebugSys->debug("myEmployee is Empty, so we are loading data from screatch");
        $myUserSpentD = new myEmployee();
        foreach ($usersspent as $index => $col) {
            echo $col["userspent"]."<br>";
            echo $col["spent"]."<br>";
            $myUserSpentD->setEmployee($col["userspent"]);
            $myUserSpentD->setSpented($col["spent"]);
            $myUserSpentD->save();
            $myUserSpentD->clear();
        }
        $myDebugSys->debug("The process of loading data to the myEmployee was finished");
    }
}
function SaveAssignee($data){
    $myDebugSys = new PHPDebug();
    $myDebugSys->debug("Start process of adding Assignee to the table<br>");
    $aTable = myAssigneeQuery::create()->find();
    if(!empty($aTable)){
        $myDebugSys->debug("We already have data in the table myAssignee");
        $aTable->delete();
    }
    $myAssignee = new myAssignee();

    foreach ($data as $index => $col)
    {
        $tmpAssignee = myAssigneeQuery::create()//->where('myAssignee.assigneename = ?',$col["assignee"])
            ->findByassigneeName($col["assignee"])
            ->toArray();
        //print_r($tmpAssignee);
        $myAssignee->setassigneeName($col["assignee"]);
        $myAssignee->setSpented($col["spent"]);
        $myAssignee->save();
        $myAssignee->clear();
    }
    $myDebugSys->debug("The process SaveAssignee was finished");
}
function SaveUserSpent($data){
    $myDebugSys = new PHPDebug();
    $myDebugSys->debug("Start process of adding UserSpent to the table<br>");
    $uTable = myEmployeeQuery::create()->find();
    if(!empty($uTable)){
        $myDebugSys->debug("We already have data in the table myUserSpent");
        $uTable->delete();
    }
    $myUserSpentD = new myEmployee();
    foreach ($data as $index => $col)
    {
        $myUserSpentD->setUserSpent($col["userspent"]);
        $myUserSpentD->setSpented($col["spent"]);
        $myUserSpentD->save();
        $myUserSpentD->clear();
    }
    $myDebugSys->debug("The process of loading data to the base was finished");
}
function GetJiraReport()
{
    $fullurl = 'https://intersog.atlassian.net/sr/jira.issueviews:searchrequest-excel-current-fields/temp/SearchRequest.html?jqlQuery=category+%3D+Service+AND+worklogDate%3E%3DstartOfMonth%28%29&tempMax=1000';
    $username = 'snemesh';
    $password = 'System021080';
    $file = 'file.html';
    $ch = curl_init();
    $fp = fopen($file, "w+");
    if ($fp==""){
        echo "Open file - ".$fp."<br>";
        return false;
    }

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_FAILONERROR, 0);
    curl_setopt($ch, CURLOPT_FILE, $fp);
// curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_URL, $fullurl);

    curl_exec($ch);
    curl_close($ch);
    fclose($fp);

//создаём новый объект
    $html = new simple_html_dom();
//загружаем в него данные
    $html->load_file('file.html');
//находим все ссылки на странице и...
    $articles = array();
    $html->preserveWhiteSpace = false;
    $count = 0;
    $tables = $html->getElementsByTagName('table[id=issuetable]')->children(1);
    $dataJ = array();
    if ($tables->innertext != '' and count($tables->find('tr'))) {
        foreach ($tables->find('tr') as $a) {
            $dataJ[$count]["Project"] = trim($a->children(0)->plaintext);
            $dataJ[$count]["Creator"] = trim($a->children(1)->plaintext);
            $dataJ[$count]["Assignee"] = trim($a->children(2)->plaintext);
            $dataJ[$count]["Key"] = trim($a->children(3)->plaintext);
            $dataJ[$count]["nonBillble"] = trim($a->children(4)->plaintext);
            $dataJ[$count]["Estimate"] = floatval(trim($a->children(5)->plaintext)) / 3600;
            $dataJ[$count]["Spent"] = floatval(trim($a->children(6)->plaintext)) / 3600;
            $dataJ[$count]["Status"] = trim($a->children(7)->plaintext);
            $count++;
        }
    }
//освобождаем ресурсы
    $html->clear();
    unset($html);
    return $dataJ;
}

function ProjectAnalise(){
    $myDebugSys = new PHPDebug();
    $myDebugSys->debug("Start get Projects");
    $allProjects = myDataStoreQuery::create()
        ->select('Project')
        ->groupByProject()
        ->find()->toArray();
    if(empty($allProjects)){
        $myDebugSys->debug("No data in myDataStore table");
        return false;
    } else{
        rm_from_array("-", $allProjects, true);    // иначе удаляем дубликаты
    }
    $myProjectSave = new myProjectData();
    //в массиве $allProjects у нас находятся все все проекты без повторений
    $myPData = myProjectDataQuery::create()->find()->toArray(); //ищем данные в myProjectData
    if(empty($myPData)){
        $myDebugSys->debug("Insert data to ProjectTable");
        foreach ($allProjects as $index => $projFromPerort)
        {
            $myProjectSave->setProjectName($projFromPerort); //записываем название проектов в колонку ProjectName
            $myProjectSave->setTotalEstimated(getEstimatedHoursByProject($projFromPerort));
            $myProjectSave->setTotalSpent(getSpentHoursByProject($projFromPerort));
            $myProjectSave->setActualCost(getSpentMoneyByProject($projFromPerort));
            $myProjectSave->save();
            $myProjectSave->clear();
        }
    } else {
        echo "We have data it the Project table<br><br>";
        //$allProjects содержит все названия проектов
        // $myPData - хранит все поля таблицы myProjectData (данные о проектах в MySQL)


        foreach ($allProjects as $index => $projFromPerort)
        {
            $searcProject = myProjectDataQuery::create()->findOneByProjectName($projFromPerort);
            $searcProject->setTotalEstimated(getEstimatedHoursByProject($projFromPerort));
            $searcProject->setTotalSpent(getSpentHoursByProject($projFromPerort));
            $searcProject->setActualCost(getSpentMoneyByProject($projFromPerort));
            $searcProject->save();
            $searcProject->clear();
            echo "Project name from REPORT => ".$projFromPerort."<br>";
            echo "Estimated => ".getEstimatedHoursByProject($projFromPerort);
            echo " and Spented =>".getSpentHoursByProject($projFromPerort)."  ";
            echo " ProjectCost =>".getSpentMoneyByProject($projFromPerort)."<br>";
        }
    }
}

function getEstimatedHoursByProject($someProject){
    //ищем в таблице все значения Estimated напротив $someProject
    $estimP = myDataStoreQuery::create()
        ->where('mydatastore.project = ?',$someProject)
        ->withColumn('SUM(Estimated)')
        ->select('SUMEstimated')
        ->find()->toArray();
    return round($estimP[0],2);
}

/**
 * @param $someProject
 * @return float
 */
function getSpentHoursByProject($someProject){
    //ищем в таблице все значения Estimated напротив $someProject
    $spentP = myDataStoreQuery::create()
        ->where('mydatastore.project = ?',$someProject)
        ->withColumn('SUM(SpentTime)')
        ->select('SUMSpentTime')
        ->find()->toArray();
    return round($spentP[0],2);
}

function findUserSpentInTable($someUser){
    $findUser = myEmployeeQuery::create()
        ->where('myemployee.employee = ?',$someUser)
        ->select(array('salary','hourlyRate'))
        ->find()->toArray();
    //echo "Sallary = ".$findUser[0]["salary"]."<br>";
    //echo "Rate = ".$findUser[0]["hourlyRate"]."<br>";
    return $findUser;
}


/**
 * @param $someProject
 * @return int
 */
function getSpentMoneyByProject($someProject){
    $projectCost = array(); //создаем пустой массив для результатов
    $totalProjectCost = array(); //создаем пустой массив для результатов
    $count=0;               //создаем счетчик
    //ищем в таблице все значения Estimated напротив $someProject
    $userHowSpent = myDataStoreQuery::create()
        ->where('mydatastore.project = ?',$someProject)
        ->withColumn('sum(SpentTime)','sumSpent')
        ->select(array("userspent","sumSpent"))
        ->groupByUserSpent()
        ->find()->toArray();
    print_r($userHowSpent);
    foreach ($userHowSpent as $val){ // ищем рейт пользователя, который работал над проектом
        $userRate = findUserSpentInTable($val["userspent"]); //находим его в таблице пользователей
        echo $val["userspent"]."<br>";
        if(empty($userRate)) { // если не нашли - присваем его рейту - 0
            //echo "user rate is empty";
            $userRate[0]["salary"]=0;           //присваеваем salary 0
            $userRate[0]["hourlyRate"]=0;       //присваемваем hourlyRate 0

        }
        $projectCost[$count]["userspent"]=$val["userspent"]; //пишем в массив userspent
        $projectCost[$count]["sumSpent"]=$val["sumSpent"];   ////пишем в массив сумму потраченных часов
        $projectCost[$count]["costMoney"]=$userRate[0]["hourlyRate"]*$val["sumSpent"];
        $count++;
    }
    print_r($projectCost);
    $records =  count($projectCost);    //считаем количество записей в масиве с данными о спенте и деньгах
    $totalSpent=0;                      //создаем пустые переменные для хранения результата Spent
    $totalMoney=0;                      //создаем пустые переменные для хранения результата Mpney
    for($i=0; $i<$records; $i++){
        $totalSpent = $totalSpent + $projectCost[$i]["sumSpent"];  //суммируем спент часы
        $totalMoney = $totalMoney + $projectCost[$i]["costMoney"]; //суммируем постраченные деньги
    }
    //echo $someProject . " " . $totalSpent."  ".$totalMoney."  <br>";
    $totalProjectCost["totalSpent"]=$totalSpent; //записываем результаты в фмнальный масиив для отдачи
    $totalProjectCost["totalMoney"]=$totalMoney; //записываем результаты в фмнальный масиив для отдачи
    //return $totalProjectCost; //возвразем масив наружу
    return $totalMoney;
}
function GetEmployeeFromReport(){
    $myDebugSys = new PHPDebug();
    $myDebugSys->debug("Start function GetEmployeeFromReport");
    $data = myDataStoreQuery::create()      //ищем в таблице DataStore
    ->select('userspent')               // все записи в колонке userspent
    ->groupByUserSpent()                // и груперуем из по колоке userspent
    ->find()->toArray();                // отдем в виде масива в переменную $data
    if(empty($data)){                          //если масив пустой -
        $myDebugSys->debug("No data");      // выводим что нет данных
        echo "No data in data Array, maybe you tabele DataStore is Empty"."<br>";
        return false;
    }else{                                  // иначе
        rm_from_array("-", $data, true);    // иначе удаляем прочерки -
    }
    //в итоге в переменно $data у нас находятся все userspent
    $count=0;                               //созадем счетчик
    $usersspent = array();                  //создаем массив
    foreach ($data as $user){               //перебираем все значения переменной $data в которой находятся все userspent
        $spentSum = myDataStoreQuery::create()
            ->where('mydatastore.userspent = ?',$user) //суммируем все значения поля SpentTime
            ->withColumn('SUM(SpentTime)')             //исользуем функцию сумирования
            ->select('SUMSpentTime')                   //запсуем в колонуку SUMSpentTime
            ->find()->toArray();                       //отдеем эту колонку в виже масива
        $usersspent[$count]['userspent'] = $user;      //в масив $usersspent записуем найденого юзера
        $usersspent[$count]['spent'] = round($spentSum[0],2); //записуем его спент
        $count++;
    }
    // получили масив с пользователями из потраченнвм временем
    if(empty($usersspent)){
        echo "No data in usersspent Array, pleache the data";
        return false;
    };

    $myDebugSys->debug("Start process of adding UserSpent to the table<br>");
    $uTable = myEmployeeQuery::create()->find()->toArray(); //не пустая ли таблицуа myUserSpent
    if(!empty($uTable)){ // не пустая!
        $myDebugSys->debug("uTable inn't empty - we have data in EmployeeQuery");
        foreach ($usersspent as $index => $user) {
            $userForSearh = $user["userspent"]; //перебираем масив с юзерами
            $employeeForTable = myEmployeeQuery::create()
                ->findByEmployee($userForSearh) //ищем юзера из масива $usersspent в таблице
                ->toArray();
            if (empty($employeeForTable)){     //если в таблицу myUserSpent нет пользователя с именем $user["userspent"]
                $newEmployee = new myEmployee(); //создаем новую записать в таблице myUserSpent
                $newEmployee->setEmployee($user["userspent"]); //записываем поле UserSpent
                $newEmployee->setSpented($user["spent"]);       //записываем поле spent
                $newEmployee->setDate('201611');
                $newEmployee->setSalary(1450);
                $newEmployee->save();                           //сохраняем
                $newEmployee->clear();                          //подчищаем
                echo "Just added new user ".$user["userspent"]." to the table<br>";
            } else{
                echo $userForSearh ." => already exist, traing to update<br>";
                $updatedEmployee = myEmployeeQuery::create()->findOneByEmployee($userForSearh);
                //находим такого юзера в таблице UserSpent
                ///print_r( $updatedEmployee->toArray());
                $updatedEmployee->setEmployee($user["userspent"]); //записываем поле UserSpent
                $updatedEmployee->setSpented($user["spent"]);       //записываем поле spent
                $updatedEmployee->setDate('201611');
                $updatedEmployee->setSalary(1450);
                $updatedEmployee->save();                           //сохраняем
                $updatedEmployee->clear();                          //подчищаем
            }

        }
    } else {
        $myDebugSys->debug("myEmployee is Empty, so we are loading data from screatch");
        $myUserSpentD = new myEmployee();
        foreach ($usersspent as $index => $col) {
            echo $col["userspent"]."<br>";
            echo $col["spent"]."<br>";
            $myUserSpentD->setEmployee($col["userspent"]);
            $myUserSpentD->setSpented($col["spent"]);
            $myUserSpentD->setDate('201611');
            $myUserSpentD->setSalary(1450);
            $myUserSpentD->save();
            $myUserSpentD->clear();
        }
        $myDebugSys->debug("The process of loading data to the myEmployee was finished");
    }
}

function loadAnaliticReport() //загружаем данные из отчета Jira в базу данный mySQL
{
    $myDebugSys = new PHPDebug();
    $myDebugSys->debug("Start process of loading data to the base<br>");
    $anyData = myAnaliticQuery::create()->find();
    if($anyData!=""){
        $myDebugSys->debug("We already have data in the table myDataStore");
        $anyData->delete();
        $myDebugSys->debug("The table myDataStore was deleted");
    }
    $myDataStore = new myAnalitic();
    $myData = getDataFromReport('http://localhost:3000/lrqli2dn35q');
    if($myData==""){
        echo "Probably we havn't data from the report - http://localhost:3000/lrv0ve06e3f, Please check";
        $myData = getDataFromReport('http://localhost:3000/lrqli2dn35q');
    }
    foreach ($myData as $index => $col)
    {
//        $project = $col[0];
//        echo($col[1])."  ";
//        echo($col[2])."  ";
//        echo($col[3])."  ";
//        echo($col[4])."  ";
//        echo($col[5])."  ";
//        echo($col[6])."  ";
//        echo($col[7])."  ";
//        echo($col[8])."  ";
//        echo($col[9])."  ";
//        echo($col[10])."  ";
//        echo($col[11])."  ";
//        echo($col[12])."  ";
//        echo($col[13])."  ";
//        echo($col[14])."  ";
//        echo($col[15])."  ";
//        echo($col[16])."<br>";
        $myDataStore->setProjectName($col[0]);
        $myDataStore->setIssueKey($col[1]);
        $myDataStore->setInitialEstimate($col[2]);
        $myDataStore->setNonBil($col[3]);
        $myDataStore->setAssignee($col[4]);
        $myDataStore->setEstimatedHoursSum($col[5]);
        $myDataStore->setLogWorkHoursSum($col[6]);
        $myDataStore->setLogWorkUserName($col[7]);
        $myDataStore->setLogWorkYear($col[8]);
        $myDataStore->setLogWorkMonth($col[9]);
        $myDataStore->setLogWorkDataTime($col[10]);
        $myDataStore->setLogWorkAge($col[11]);
        $myDataStore->setCountIssues($col[12]);
        $myDataStore->setCountIssuesPersent($col[13]);
        $myDataStore->setEstimatedHoursSubTask($col[14]);
        $myDataStore->setLogedHours($col[15]);
        $myDataStore->setRemainingHours($col[16]);
        $myDataStore->save();
        $myDataStore->clear();
    }
    $myDebugSys->debug("The process of loading data to the base was finished");
}

function loadAnaliticNonBillReport() //загружаем данные из отчета Jira в базу данный mySQL
{
    $myDebugSys = new PHPDebug();
    $myDebugSys->debug("Start process of loading data to the base<br>");
    $anyData = myAnaliticNonBillQuery::create()->find();
    if($anyData!=""){
        $myDebugSys->debug("We already have data in the table myDataStore");
        $anyData->delete();
        $myDebugSys->debug("The table myDataStore was deleted");
    }
    $myDataStore = new myAnaliticNonBill();
    $myData = getDataFromReport('http://localhost:3000/ma7045tsj19');
    if($myData==""){
        echo "Probably we havn't data from the report - http://localhost:3000/lrv0ve06e3f, Please check";
        $myData = getDataFromReport('http://localhost:3000/ma7045tsj19');
    }
    foreach ($myData as $index => $col)
    {
//        $project = $col[0];
//        echo($col[1])."  ";
//        echo($col[2])."  ";
//        echo($col[3])."  ";
//        echo($col[4])."  ";
//        echo($col[5])."  ";
//        echo($col[6])."  ";
//        echo($col[7])."  ";
//        echo($col[8])."  ";
//        echo($col[9])."  ";
//        echo($col[10])."  ";
//        echo($col[11])."  ";
//        echo($col[12])."  ";
//        echo($col[13])."  ";
//        echo($col[14])."  ";
//        echo($col[15])."  ";
//        echo($col[16])."<br>";
        $myDataStore->setProjectName($col[0]);
        $myDataStore->setIssueKey($col[1]);
        $myDataStore->setInitialEstimate($col[2]);
        $myDataStore->setNonBil($col[3]);
        $myDataStore->setAssignee($col[4]);
        $myDataStore->setEstimatedHoursSum($col[5]);
        $myDataStore->setLogWorkHoursSum($col[6]);
        $myDataStore->setLogWorkUserName($col[7]);
        $myDataStore->setLogWorkYear($col[8]);
        $myDataStore->setLogWorkMonth($col[9]);
        $myDataStore->setLogWorkDataTime($col[10]);
        $myDataStore->setLogWorkAge($col[11]);
        $myDataStore->setCountIssues($col[12]);
        $myDataStore->setCountIssuesPersent($col[13]);
        $myDataStore->setEstimatedHoursSubTask($col[14]);
        $myDataStore->setLogedHours($col[15]);
        $myDataStore->setRemainingHours($col[16]);
        $myDataStore->save();
        $myDataStore->clear();
    }
    $myDebugSys->debug("The process of loading data to the base was finished");
}







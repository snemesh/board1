<?php

ini_set('display_errors',3);
error_reporting(E_ALL);

require "cfunctions.php";
$file = 'logevents.txt';

$event = "Date: ". date("l dS of F Y h:I:s A"). " Start script..." ;
file_put_contents($file, $person, FILE_APPEND | LOCK_EX);
// Пишем содержимое в файл,
// используя флаг FILE_APPEND flag для дописывания содержимого в конец файла
// и флаг LOCK_EX для предотвращения записи данного файла кем-нибудь другим в данное время

$myData = getDataFromReport('http://localhost:3000/lrv0ve06e3f');
if($myData==""){
    $event = "Date: ". date("l dS of F Y h:I:s A"). " Error report http://localhost:3000/lrv0ve06e3f" ;
    file_put_contents($file, $person, FILE_APPEND | LOCK_EX);
    exit();
}
loadBigReport();

$event = "Date: ". date("l dS of F Y h:I:s A"). " Start script..." ;
file_put_contents($file, $person, FILE_APPEND | LOCK_EX);
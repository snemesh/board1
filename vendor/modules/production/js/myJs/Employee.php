<?php
$host = "localhost";
$user = "root";
$pass = "system021080";
$dbname = "data";
/** Do not Edit */
$mysqli = new mysqli($host, $user, $pass, $dbname);
$mysqli->set_charset("utf8");

//Если был послан POST запрос, то выбираем данные и сохраняем
if ($_POST){
    $mydate = $_POST['date'];
    $table = $_POST['table']; 	//таблица (получаем из #table)
    $field = $_POST['field']; 	//имя поля (получаем при разборе класса td)
    $id = $_POST['id']; 		//id ячейки которую будем обновлять (получаем при разборе класса td)
    $value = $_POST['value'];	//новое значение (получаем при разборе класса td)


    $query = "UPDATE `".$table."` SET `".$field."`='".$value."' WHERE id = '".$id."'"; //составляем запрос
    $mysqli->query($query); //выполняем запрос

    $query = "UPDATE `".$table."` SET `data`='".$mydate."' WHERE id = '".$id."'"; //составляем запрос
    $mysqli->query($query); //выполняем запрос

    echo "Updated success"; //выводим ответ
    exit(); //завершаем работу скрипта

}

$query = "SELECT * from myEmployee"; // запрос
$table = $mysqli->query($query); // выбираем данные из таблицы

?>
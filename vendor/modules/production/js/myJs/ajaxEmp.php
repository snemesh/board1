<?php
/**
 * Created by PhpStorm.
 * User: snemesh
 * Date: 12/13/16
 * Time: 18:26
 */

if ($_POST) {
    $mydate = $_POST['update'];
    echo "Updated success"; //выводим ответ
    exit(); //завершаем работу скрипта
}
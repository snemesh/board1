<?php
/**
 * Created by PhpStorm.
 * User: nemeshsergey
 * Date: 11/20/16
 * Time: 1:44 PM
 */

ini_set('display_errors',3);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';
require_once 'vendor/simple_html_dom.php';

function GetJiraReport()
{
    $fullurl = 'https://intersog.atlassian.net/sr/jira.issueviews:searchrequest-excel-current-fields/temp/SearchRequest.html?jqlQuery=category+%3D+Service+AND+worklogDate%3E%3DstartOfMonth%28%29&tempMax=1000';
    $username = 'snemesh';
    $password = 'System021080';
    $file = 'file.html';
    $ch = curl_init();
    $fp = fopen($file, "w+");
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


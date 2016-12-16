<?php
/**
 * Created by PhpStorm.
 * User: nemeshsergey
 * Date: 11/20/16
 * Time: 1:44 PM
 */

$fullurl = 'https://intersog.atlassian.net/sr/jira.issueviews:searchrequest-excel-current-fields/21600/SearchRequest-21600.html?tempMax=1000';
$username = 'snemesh';
$password = 'System021080';

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FAILONERROR, 0);
// curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_URL, $fullurl);

$returned = curl_exec($ch);

curl_close ($ch);
var_dump($returned);
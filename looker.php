<?php
/**
 * Created by PhpStorm.
 * User: snemesh
 * Date: 12/7/16
 * Time: 13:36
 */

function getToken()
{
    $url = 'https://intersog.looker.com:19999/api/3.0/login';
    $post_data = array(
        'client_id'=>'TRhwgSQJhV6ZFPvmqCpz',
        'client_secret'=>'WF47wRcfTbpSSmB5gqb6JrVF'
    );

// Open connection

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


// Execute request
    $result = curl_exec($ch);
// Close connection

    curl_close($ch);
    $asw =json_decode($result, true);
    return $asw['access_token'];

}

function Login()
{
    $url = 'https://intersog.looker.com:19999/api/3.0/login/2';


// Open connection

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


// Execute request
    $result = curl_exec($ch);
// Close connection

    curl_close($ch);
    $asw =json_decode($result, true);
    //echo $asw['access_token'];
}

function GetLoock($token)
{
    $url = 'https://intersog.looker.com:19999/api/3.0/looks/1';
// Open connection
    $authorization = "Authorization: Bearer ".$token;

    $headers = array(
        'Content-Type: application/json',
        $authorization
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $result = curl_exec($ch);
    curl_close($ch);
    $asw =json_decode($result, true);
    return $asw['embed_url'];

}

function GetData($link,$sometoken)
{
    $url = $link;
// Open connection
    $authorization = "Authorization: Bearer ".$sometoken;
    $headers = array(
        'Content-Type: application/json',
        $authorization
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $result = curl_exec($ch);
    curl_close($ch);
    print_r( $result);
    //$asw =json_decode($result, true);
    //return $asw['public_url'];

}

$token=getToken();
//echo "We get token =>".$token;

echo "<br>";
//Login();
//echo "<br>";

$lnk=GetLoock($token);
echo $lnk."<br>";
GetData($lnk,$token);

<?php
session_start(); 
// require_once("../configs/api-config.php");
// $param = array(
//     'credential_id' => 'b7789add-5cc7-4b66-bee5-790ed3316858',
//     'token_type' => 'bearer',
//     'expires_in' => '3600'
// );
 
// // URL có chứa hai thông tin name và diachi
// $url = 'http://35.185.178.104:30802/oauth2_tokens';
 
// $options = array(
//         'http' => array(
//         'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
//         'method'  => 'POST',
//         'content' => http_build_query($param),
//     )
// );

// $context  = stream_context_create($options);
// $result = file_get_contents($url, false, $context);
// $response = json_decode($result,false);
// $_SESSION["token"] = $response->access_token;
// echo $_SESSION["token"];

$url = 'http://35.185.178.104:32551/admin-product';
$ch = curl_init();

$headers = array('Authorization: Bearer '.$_SESSION["token"]);
curl_setopt($ch, CURLOPT_URL, $url); # URL to post to
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 ); # return into a variable
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers );
$result = curl_exec( $ch ); # run!
echo $result;

curl_close($ch);
?>
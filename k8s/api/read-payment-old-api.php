<?php
	include_once '../configs/api-config.php';
	$callApi = new CallApi();
	session_start();
	$url = $callApi->getApi();
	$url .= 'order_old';
	$ch = curl_init();

	$headers = array('Authorization: Bearer '.$_SESSION["token"]);
	curl_setopt($ch, CURLOPT_URL, $url); # URL to post to
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 ); # return into a variable
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers );
	$result = curl_exec( $ch ); # run!
	echo $result;

	curl_close($ch);
?>
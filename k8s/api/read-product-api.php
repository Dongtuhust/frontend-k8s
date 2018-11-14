<?php
	session_start(); 
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
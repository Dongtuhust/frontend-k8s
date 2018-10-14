<?php 
// require_once("../configs/api-config.php");
include_once '../configs/api-config.php';
$callApi = new CallApi();
$api = $callApi->getProductApi();
$api .= "product/read.php";
echo($api);
?>
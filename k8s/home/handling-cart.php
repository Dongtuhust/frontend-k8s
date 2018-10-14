<?php
session_start();
$soluongmoi = $_POST["soluong"];
$id = $_POST["id_pro"];
$_SESSION['cart'][$id] = $soluongmoi;
?>
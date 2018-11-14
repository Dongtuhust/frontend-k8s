<?php
session_start();
if (isset($_POST["reset"])) {
	unset($_SESSION['cart']);
}
$id = $_POST["id_pro"];
unset($_SESSION['cart'][$id]);
?>
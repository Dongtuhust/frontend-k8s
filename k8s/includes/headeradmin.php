<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/ >
	<script src="../js/fontawesome-all.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="../js/style.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/style.js"></script>
</head>
<body>
	<!--header-->
	<div id="header">
		<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
			<a class="navbar-brand" href="product_management.php">Ps4 Store</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="product_management.php">Trang chủ<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="addproduct.php">Thêm sản phẩm</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="orders_management.php">QL đơn hàng</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="users_management.php">QL tài khoản</a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<?php
					if (isset($_SESSION['user_id'])){
						?>
						<a href="#"><button type="button" class="btn btn-outline-dark">Tài khoản: <?php echo $_SESSION['username']; ?></button></a>
						<a href="../home/logout.php"><button type="button" class="btn btn-outline-warning">Đăng suất</button></a>
						<?php
					} else {
						?>
						<a href="signup.php"><button type="button" class="btn btn-outline-dark">Đăng ký</button></a>
						<a href="login.php"><button type="button" class="btn btn-outline-warning">Đăng nhập</button></a>
						<?php
					}
					?>
					<!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
					</form>
				</div>
			</nav>
		</div>
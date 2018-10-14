<?php
session_start();
$tongtien = 0;
include_once '../configs/api-config.php';
$callApi = new CallApi();
$api = $callApi->getProductApi();
$api .= "product/read.php";
$get_data_api = file_get_contents($api);
$obj = json_decode($get_data_api,false);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css"/>
	<link rel="stylesheet" type="text/css" href="../css/footer.css"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/ >
	<link href="http://fonts.googleapis.com/css?family=Ruge+Boogie" rel="stylesheet" type="text/css">
	<script src="../js/fontawesome-all.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="../js/style.js"></script>
</head>
<body>
	<!--header-->
	<div id="header">
		<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
			<a class="navbar-brand" href="#" style="padding-bottom: 10px;">Ps4 Store</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto" style="margin-top: 7px;">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Trang chủ<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="user_sell.php">Đĩa cũ</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Thể Loại
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="category.php?category_id=1">Bắn súng</a>
							<a class="dropdown-item" href="category.php?category_id=2">Thể thao</a>
							<a class="dropdown-item" href="category.php?category_id=3">Đối kháng</a>
							<a class="dropdown-item" href="category.php?category_id=4">Nhập vai</a>
							<a class="dropdown-item" href="category.php?category_id=5">Kinh dị</a>
							<div class="dropdown-divider"></div>
							<!-- <a class="dropdown-item" href="#">Something else here</a> -->
						</div>
					</li>
					<?php
					if (isset($_SESSION['user_id']) && ($_SESSION['email'] != "admin@gmail.com")){
						?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Người dùng
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="myproduct.php?id=<?=$_SESSION["user_id"]?>">Sản phẩm của tôi</a>
								<a class="dropdown-item" href="sellproduct.php?email=<?=$_SESSION["email"]?>">Đăng bán</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="acount.php">Đổi mật khẩu</a>
							</div>
						</li>
						<?php
					}
					?>
					<form action="search_result.php" method="get" accept-charset="utf-8">
						<span style="margin-top: 5px;margin-bottom: 7px;display: flex;">
							<input class="form-control" type="search" placeholder="Search" name="search" aria-label="Search">
							<button style="margin-top: 7px;cursor: pointer;margin-left: 5px;color: orange;font-size: 15px;" class="fas fa-search"></button>
						</span>
					</form>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<?php
					if (isset($_SESSION['user_id']) && ($_SESSION['email'] != "admin@gmail.com")){
						?>
						<span  id="cartshop" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal">
							<span><i class="fas fa-shopping-cart" style="margin-right: 2px;" >
							</i>
						</span>
						<span style="margin-right: 2px;" id="count-item" data-count="
						<?php
						if (isset($_SESSION['cart'])) {
							echo count($_SESSION['cart']);
							}else echo 0;
							?>">
							<?php if (isset($_SESSION['cart'])) {
								echo count($_SESSION['cart'])." Item";
							}
							?>
						</span>
						<span><i class="fa fa-chevron-down" style="margin-right: 20px;"></i>
						</span>
					</span>
					<span style="margin-right: 5px;" href="#">Tài khoản: <?php echo $_SESSION['username']; ?></span>
					<a href="logout.php"><button type="button" class="btn btn-outline-warning">Đăng xuất</button></a>
					<span style="margin-left: 10px;" class="notification"><i class="fas fa-bell bell" style="font-size: 25;"></i><i class="fas fa-circle dot" style="font-size: 10;"></i></span>

					<?php
				} else {
					?>
					<span  id="cartshop" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal" >
						<span><i class="fas fa-shopping-cart" style="margin-right: 2px;" ></i></span>
						<span style="margin-right: 2px;">
							<?php if (isset($_SESSION['cart'])) {
								echo count($_SESSION['cart'])." Item";
							}
							?>
						</span>
						<span><i class="fa fa-chevron-down" style="margin-right: 20px;"></i></span>
					</span>
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
		<!-- Dialog hiển thị thông tin giỏ hàng ========================================== -->
		<div id="result">
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1331321;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Giỏ hàng</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php
							if (isset($_SESSION['cart'])) {
								foreach ($obj->records as $key => $value) {
									foreach ($_SESSION['cart'] as $id => $soluong) {
										if ($id==$obj->records[$key]->id) {
											?>
											<div class="media">
												<span style="width: 50px;padding: 5px;margin-right: 15px;" ><img style="width: 50px;height: 50px;" src="<?=$obj->records[$key]->product_image?>" alt=""></span>
												<div style="display: flex;flex-direction: column;">
													<span ><?=$obj->records[$key]->name?></span>
													<span ><?=$_SESSION['cart'][$obj->records[$key]->id]?>*<span style="color: orange;"><?=number_format($obj->records[$key]->price)?></span></span>
												</div>
												<div style="margin: 10px 20px ;">
													<select class="custom-select quantity-cart" data-quatity="<?=$obj->records[$key]->id?>" >
														<?php
														for ($i=1; $i <99 ; $i++) {
															if ($i==$_SESSION['cart'][$obj->records[$key]->id]) {
																echo "<option value='$i' selected = 'selected'>$i</option>";
															}else{
																echo "<option value='$i'>$i</option>";
															}
														}
														?>
													</select>
												</div>
												<span style="position: absolute;right: 15px;cursor: pointer;" data-quatity="<?=$obj->records[$key]->id?>" class="del"><i class="far fa-times-circle"></i></span>
											</div>
											<hr width="80%" align="center" />
											<?php
											$tongtien += $_SESSION['cart'][$obj->records[$key]->id]*$obj->records[$key]->price;
										}
									}


								}
								?>
								<hr width="80%" align="center" />
								<div style="text-align: right;">Tổng tiền:
									<span style="color: orange;"><?=number_format($tongtien)?> VNĐ</span>
								</div>
								<?php
							}else{
								?>
								<h5 style="color: orange;">Ko có sản phẩm nào trong giỏ hàng</h5>
								<hr width="80%" align="center" />
								<div style="text-align: right;">Tổng tiền:
									<span style="color: orange;">0 VNĐ</span>
								</div>
								<?php
							}
							?>
						</div>
						<div class="modal-footer">
							<a href="order.php"><button type="button" class="btn btn-primary">Thanh toán</button></a>
							<button type="button" class="btn btn-success reset" data-dismiss="modal">Xóa giỏ hàng</button>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php include "../includes/header.php" ?>
<div class="sign-in">
	<div class="row">
		<div class="col-sm-8">
			<h2>Đăng nhập</h2>
			<form action="login.php" method="post">
				<div class="form-group row">
					<label  class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="email" placeholder="Email" required="">
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="password"  placeholder="Password" required="">
					</div>
				</div>
				<fieldset class="form-group">

				</fieldset>
				<div class="form-group row">
					<div class="col-sm-2">Remember password</div>
					<div class="col-sm-10">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" ">
							<label class="form-check-label" >
								Remember
							</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-10">
						<button type="submit" name="btn_submit" class="btn btn-primary">Login</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-4">
			<img src="../image/ps4.jpg" alt="">
		</div>
	</div>
</div>
<?php include "../includes/footer.php" ?>
<?php
include_once '../configs/api-config.php';
$callApi = new CallApi();

// call user api
$users_api = $callApi->getUsersApi();
$users_api .= "users/read.php";

$users_data_api = file_get_contents($users_api);
$user_obj = json_decode($users_data_api,false);

if (isset($_POST["btn_submit"])) {
	$check = 0;
	$email = $_POST["email"];
	$password = $_POST["password"];
	$email = strip_tags($email);
	$email = addslashes($email);
	$password = strip_tags($password);
	$password = addslashes($password);
	if ($email == "" || $password =="") {
		echo '<script language="javascript">';
		echo 'alert("bạn vui lòng nhập đầy đủ thông tin")';
		echo '</script>';
	}else{
		foreach ($user_obj->records as $key => $values) {
			if ($user_obj->records[$key]->email==$email && $user_obj->records[$key]->password==$password) {
				$check = 1;
				$_SESSION["user_id"] = $user_obj->records[$key]->user_id;
				$_SESSION["email"] = $user_obj->records[$key]->email;
				$_SESSION["username"] = $user_obj->records[$key]->username;
				$_SESSION["is_block"] = $user_obj->records[$key]->is_block;
				$_SESSION["permision"] = $user_obj->records[$key]->permision;
				break;
			}
		}	
		if ($check==0) {
			echo '<script language="javascript">';
			echo 'alert("Tài khoản mật khẩu không đúng yêu cầu nhập lại")';
			echo '</script>';
		}else{
			if ($_SESSION["is_block"]=="1") {
				echo '<script language="javascript">';
				echo 'alert("Tài khoản của bạn đã bị khóa vui lòng liên hệ nhà quản trị để dược cấp lại")';
				echo '</script>';
			}else{
				unset($_SESSION['cart']);
				echo '<script language="javascript">';
				echo 'alert("Đăng nhập thành công")';
				echo '</script>';
				if ($_SESSION['permision'] == "1") {
					$url="../admin/product_management.php";
				}
				else{ $url="index.php";}
				echo "<meta http-equiv='refresh' content='0;url=$url' />";
			}
		}
	}
}
?>
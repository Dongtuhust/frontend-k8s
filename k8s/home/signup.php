
<?php include "../includes/header.php" ?>
<?php require_once("connectdb.php");
$email='';$usename='';$city='';$phone='';$error='';

?>
<div class="sign-in">
	<div class="row">
		<div class="col-sm-8">

			<h2>Đăng ký</h2>
			<form action="signup.php" method="post">
			<div id="alert" class="alert alert-danger" style="display:none"></div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputEmail4">Email</label>
						<input onkeyup="checkUser()" type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?=$email?>" required>
					</div>
					<div class="form-group col-md-6">
						<label for="inputAddress">Tên đăng nhập</label>
						<input onkeyup="checkUser()" type="text" class="form-control" name="username" id="username" placeholder="username" value="<?=$usename?>" required>

					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword4">Mật khẩu</label>
					<input type="password" class="form-control" name="password1" id="pass1" placeholder="Password" required>
				</div>
				<div class="form-group">
					<div id="alertpass" class="alert alert-danger" style="display:none"></div>
					<label for="inputPassword4">Xác nhận mật khẩu</label>
					<input onkeyup="checkPass()" type="password" class="form-control" name="password2" id="pass2" placeholder="Password" required>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputCity">Thành phố</label>
						<input type="text" class="form-control" name="city" id="inputCity" value="<?=$city?>" >
					</div>
					<div class="form-group col-md-2">
						<label for="inputZip">Số điện thoại</label>
						<input type="text" class="form-control" name="phone" id="inputZip" value="<?=$phone?>" >
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Adminpass</label>
						<input type="text" class="form-control" name="passAdmin" id="inputZip" placeholder="Không bắt buộc">
					</div>
				</div>
				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="gridCheck" checked="true" required>
						<label class="form-check-label" for="gridCheck">
							Chấp nhận điều khoản
						</label>
					</div>
				</div>
				<button id="submit" type="submit" name="btn_submit" class="btn btn-primary">Đăng ký</button>
			</form>
		</div>
		<div class="col-sm-4">
			<img src="../image/ps4.jpg" alt="">
		</div>
	</div>
</div>

<script>
	function checkUser(){
		var username = document.getElementById('username').value;
		var email = document.getElementById('email').value;
		var box = document.getElementById("alert");
		var button = document.getElementById("submit");
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
						box.style.display = 'block';
						box.innerHTML = this.responseText;
						button.disabled = true;
					}else{
						box.style.display = 'none';
						button.disabled = false;
					}


				console.log(this.status);
		};
		xmlhttp.open("GET", "checkuser.php?username=" + username + "&email=" + email, true);
		xmlhttp.send();
	}

	function checkPass(){
		var pass1 = document.getElementById('pass1').value;
		var pass2 = document.getElementById('pass2').value;
		var button = document.getElementById("submit");
		var box = document.getElementById("alertpass");
		if(pass1!==pass2){
			box.style.display = 'block';
			box.innerHTML = "Mật khẩu nhập lại không chính xác";
			button.disabled = true;
		}else{
			box.style.display = 'none';
			button.disabled = false;
		}
	}
</script>
<?php include "../includes/footer.php" ?>
<?php

if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
	$username = $_POST["username"];
	$password1 = $_POST["password1"];
	$password2 = $_POST["password2"];
	$city = $_POST["city"];
	$street = $_POST["street"];
	$phone= $_POST["phone"];
	$email = $_POST["email"];
	$passAdmin = $_POST["passAdmin"];
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
	if ($password1!=$password2) {
		echo '<script language="javascript">';
		echo 'alert("Yêu cầu xác nhận lại password")';
		echo '</script>';
	}
	else{

		if ($username == "" || $password1 == "" ||$password2 == "" || $city == "" || $email == ""||$phone== "") {
			echo '<script language="javascript">';
			echo 'alert("Bạn vui lòng nhập đầy đủ thông tin")';
			echo '</script>';
		}else{

			if ($passAdmin=="") {
				$sql = "INSERT INTO users(username, password, address, email, createdate,phone,permision) VALUES ( '$username', '$password1', '$city', '$email', now(),'$phone','0')";
			// thực thi câu $sql với biến connect lấy từ file connection.php
				mysqli_query($connect,$sql);

				echo '<script language="javascript">';
				echo 'alert("chúc mừng bạn đã đăng ký thành công")';
				echo '</script>';
				$url="login.php";
				echo "<meta http-equiv='refresh' content='0;url=$url' />";
			}elseif ($passAdmin!="admin123") {
				echo '<script language="javascript">';
				echo 'alert("bạn muốn tạo tài khoản nhà quản trị yêu cầu nhập đúng passAdmin")';
				echo '</script>';
			}else{
				$sql = "INSERT INTO users(username, password, address, email, createdate,phone,permision) VALUES ( '$username', '$password1', '$city', '$email', now(),'$phone','1')";
			// thực thi câu $sql với biến connect lấy từ file connection.php
				mysqli_query($connect,$sql);
				echo '<script language="javascript">';
				echo 'alert("Đăng ký thành công tài khoản nhà quản trị")';
				echo '</script>';
				$url="login.php";
				echo "<meta http-equiv='refresh' content='0;url=$url' />";
			}
		}
	}
}

?>

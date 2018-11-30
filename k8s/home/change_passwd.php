<?php include "../includes/header.php" ?>
<div class="sign-in">
	<div class="row">
		<div class="col-sm-8">
			<h2>Đổi mật khẩu</h2>
			<form  method="post">
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
				<div class="form-group row">
					<label  class="col-sm-2 col-form-label">New password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="newpassword"  placeholder="Password" required="">
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-2 col-form-label">Re-enter</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="repassword"  placeholder="Re-enter Password" required="">
					</div>
				</div>
				<fieldset class="form-group">

				</fieldset>
				<div class="form-group row">
					<div class="col-sm-10">
						<button type="submit" name="btn_submit" class="btn btn-primary">Change</button>
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
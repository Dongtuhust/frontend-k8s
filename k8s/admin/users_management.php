<?php
session_start(); 
if (isset($_SESSION['user_id']) && $_SESSION["permision"] == 1) {
 include "../includes/headeradmin.php"; ?>

<div class="container" style="margin-top: -90px;">
	<div id="app"></div>
	<div id="pagination1"></div>
</div>
<!-- <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul> -->
<!-- Modal -->
<script src="../js/admin/users_management/users_management.js"></script>
<script src="../js/admin/users_management/search.js"></script>
<script src="../js/admin/users_management/users_template.js"></script>
<script src="../js/admin/users_management/update_user.js"></script>
<?php include "../includes/footer.php"; 
}else {
	echo "Bạn cần đăng nhập để truy cập trang này";
}
?>
<?php 
	if (isset($_POST["del-user"])) {
		$user_id = $_POST["user_id"];
		$sql = "update users set is_block ='1' where user_id='$user_id'";
		$result = mysqli_query($connect,$sql);
		if ($result){
		?>

		<script language="javascript">
			alert('<?php echo "Khóa tài khoản thành công. Nhấn \'OK\' để quay về trang ADMIN." ?>');
		</script>
		<?php
		$url="user.php";
		echo "<meta http-equiv='refresh' content='0;url=$url' />";
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Khóa tài khoản thất bại." ?>');
		</script>

		<?php
	}
	}
?>
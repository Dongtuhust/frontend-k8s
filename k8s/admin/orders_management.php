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
<script src="../js/admin/orders_management/orders_management.js"></script>
<script src="../js/admin/orders_management/search.js"></script>
<script src="../js/admin/orders_management/orders_template.js"></script>
<script src="../js/admin/orders_management/update_order.js"></script>
<?php include "../includes/footer.php"; 
}else {
	echo "Bạn cần đăng nhập để truy cập trang này";
}
?>
<?php
if (isset($_POST["neworder"])) {
	$order_id = $_POST['neworder'];
	$sql = "UPDATE order_customer SET status='Đã giao' where order_id= $order_id";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		?>
		<script language="javascript">
			alert('<?php echo "Cập nhật thành công. Nhấn \'OK\' để hoàn tất" ?>');
		</script>
		<?php
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thất bại." ?>');
		</script>

		<?php
	}
}
if (isset($_POST["delneworder"])) {
	$order_id = $_POST['delneworder'];
	$sql = "UPDATE order_customer SET status='Bị hủy' where order_id= $order_id";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		?>

		<script language="javascript">
			alert('<?php echo "Hủy đơn hàng thành công. Nhấn \'OK\' để hoàn tất" ?>');
		</script>

		<?php
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thất bại." ?>');
		</script>

		<?php
	}
}
if (isset($_POST["oldorder"])) {
	$order_id = $_POST['oldorder'];
	$sql = "UPDATE order_old_product SET status='Đã giao' where order_id= $order_id";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật thành công. Nhấn \'OK\' để hoàn tất" ?>');
		</script>

		<?php
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thất bại." ?>');
		</script>

		<?php
	}
}
if (isset($_POST["deloldorder"])) {
	$order_id = $_POST['deloldorder'];
	$sql = "UPDATE order_old_product SET status='Bị hủy' where order_id= $order_id";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		?>

		<script language="javascript">
			alert('<?php echo "Hủy đơn hàng thành công. Nhấn \'OK\' để hoàn tất" ?>');
		</script>

		<?php 
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thất bại." ?>');
		</script>

		<?php
	}
}
?>
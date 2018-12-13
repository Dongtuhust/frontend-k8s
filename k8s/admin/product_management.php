<?php
session_start(); 
if (isset($_SESSION['user_id']) && $_SESSION["permision"] == 1) {
	include "../includes/headeradmin.php"; 
	?>

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
<script src="../js/admin/products_management/product_management.js"></script>
<script src="../js/admin/products_management/search.js"></script>
<script src="../js/admin/products_management/product_template.js"></script>
<script src="../js/admin/products_management/update_product.js"></script>
<?php include "../includes/footer.php"; 
}else {
	echo "Bạn cần đăng nhập để truy cập trang này";
}
?>
<?php
if (isset($_POST["submited"])) {
	$product_id = $_POST["product_id"];
	$product_name = $_POST["product_name"];
	$price_buy = $_POST["price_buy"];
	$description = $_POST["description"];
	$category_id = $_POST["category_id"];
	$quantity = $_POST["quantity"];
	$distributor_name = $_POST["distributor_name"];
	$product_status = $_POST["product_status"];
	$update_time = date('Y-m-d H:i:s');
	$product_item=array(
		"id" => $product_id,
		"name" => $product_name,
		"description" => html_entity_decode($description),
		"price" => $price_buy,
		"category_id" => $category_id,
		"distributor" => $distributor_name,
		"quantity" => $quantity,
		"status" => $product_status,
		"update_time" => $update_time,
	);

	$data = json_encode($product_item);

	$callApi = new CallApi();
	$url = $callApi->getApi().'update-product';
	$ch=curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, array("customer"=>$data));
	curl_setopt($ch, CURLOPT_HEADER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER,
		array('Content-Type:application/json',
			'Content-Length: ' . strlen($data_string))
	);

	$result = curl_exec($ch);
	
	if ($result){
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thành công. Nhấn \'OK\' để quay về trang ADMIN." ?>');
		</script>

		<?php 
		$url="admin.php";
		echo "<meta http-equiv='refresh' content='0;url=$url' />";
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thất bại." ?>');
		</script>

		<?php
	}
	curl_close($ch);
}
?>
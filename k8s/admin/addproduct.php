<?php
session_start(); 
if (!isset($_SESSION['user_id'])) {
	echo "Bạn cần đăng nhập để truy cập trang này";
}elseif (isset($_SESSION['user_id']) && $_SESSION["permision"] == 1) { 
include "../includes/headeradmin.php";
include_once '../configs/api-config.php'; 
?>
<div class="sign-in" style="margin-bottom: 150px;">
	<div class="row">
		<div class="col-sm-8">
			<h2>Thêm sản phẩm</h2>
			<form  method="post" enctype="multipart/form-data">
				<div class="form-group row">
					<label  class="col-sm-4 col-form-label">Tên sản phẩm*</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="product_name"  required="">
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-4 col-form-label">Giá bán</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="price_buy"  placeholder="" required="">
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-4 col-form-label">Mô tả</label>
					<div class="col-sm-6">
						<textarea type="text" class="form-control" name="description" required=""></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-4 col-form-label">Thể loại</label>
					<div class="col-sm-6">
						<select  class="form-control" name="category">
							<option selected>Choose...</option>
							<option value="1">Bắn súng</option>
							<option value="2">Nhập vai</option>
							<option value="3">Đối kháng</option>
							<option value="4">Thể thao</option>
							<option value="5">Kinh dị</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Nhà phân phối</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="distributor">
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-4 col-form-label">Số lượng</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="quantity" required="">
					</div>
				</div>
				<div class="form-group row" style="margin-bottom: 40px;">
					<label class="col-sm-4 col-form-label" style="color: orange;">Ảnh minh họa</label>
					<div class="col-sm-6">
						<div class="custom-file">
							<input type="file"  class="custom-file-input" name="imgfile">
							<label class="custom-file-label">Choose file</label>
						</div>
					</div>
				</div>
				<div class="form-group row" style="margin-bottom: 40px;">
					<label class="col-sm-4 col-form-label" style="color: orange;">Ảnh chi tiết</label>
					<div class="col-sm-6">
						<div class="custom-file">
							<input type="file"  class="custom-file-input" name="imgfile_detail[]" multiple="multiple">
							<label class="custom-file-label">Choose file</label>
						</div>
					</div>
				</div>
				<fieldset class="form-group">

				</fieldset>
				<div class="form-group row">
					<div class="col-sm-6">
						<button type="submit" name="submited" class="btn btn-primary">Thêm</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-4">
			<img src="../image/ps4.jpg" alt="">
		</div>
	</div>
</div>
<?php include "../includes/footer.php"; ?>
<?php 
}
include_once '../configs/api-config.php';
require_once __DIR__ .'/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;
if (isset($_POST["submited"])){
	$product_name = $_POST["product_name"];
	$price_buy = $_POST["price_buy"];
	$description = $_POST["description"];
	$category = $_POST["category"];
	$quantity = $_POST["quantity"];
	$distributor = $_POST["distributor"];
	$imgfile = $_FILES["imgfile"];
	$update_time = date('Y-m-d H:i:s');
	$created_time = date('Y-m-d H:i:s');
	$purcharse_number = "0";
	$status = "Mới";

	if (isset($_FILES["imgfile"])) {
		if ($_FILES["imgfile"]["error"]) {
			echo "File bị lỗi";
		}else{
			move_uploaded_file($_FILES['imgfile']['tmp_name'], '../image/'.$_FILES['imgfile']['name']);
		}

	}

	$dir_imgfile = substr($_FILES['imgfile']['name'],0,-4);
	mkdir("../image/".$dir_imgfile);
	$count = count($_FILES["imgfile_detail"]["name"]);
	for ($i=0; $i < $count; $i++) {
		if (isset($_FILES["imgfile_detail"]["name"][$i])){
			move_uploaded_file($_FILES['imgfile_detail']['tmp_name'][$i], '../image/'.$dir_imgfile."/".$_FILES["imgfile_detail"]["name"][$i]);
		}
	}

	$product_image = "../image/".$_FILES['imgfile']['name'];

	$detail_image = "../image/".$dir_imgfile;

	$product_item=array(
		"name" => $product_name,
		"description" => html_entity_decode($description),
		"price" => $price_buy,
		"category_id" => $category,
		"product_image" => $product_image,
		"detail_image" => $detail_image,
		"distributor" => $distributor,
		"quantity" => $quantity,
		"status" => $status,
		"update_time" => $update_time,
		"created_time" => $created_time,
		"purcharse_number" => $purcharse_number
	);

	$data = json_encode($product_item);

	$callApi = new CallApi();
	$rabbitmqIP = $callApi->getKongIP();
	$connection = new AMQPConnection($rabbitmqIP, 31234, 'guest', 'guest');
	$channel    = $connection->channel();

	$channel->queue_declare('product_queue', false, false, false, false);


	$msg = new AMQPMessage($data, array('delivery_mode' => 2));

	$channel->basic_publish($msg, '', 'product_queue');
	?>

	<script language="javascript">
		alert('<?php echo "Dữ liệu đã được gửi đi đang được sử lý. Nhấn \'OK\' để quay về trang ADMIN." ?>');
	</script>

	<?php
	$url="product_management.php";
	echo "<meta http-equiv='refresh' content='0;url=$url' />";
}
?>

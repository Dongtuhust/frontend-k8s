<?php include "../includes/headeradmin.php" ?>
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
						<select  class="form-control" name="category_name">
							<option selected>Choose...</option>
							<option value="Bắn súng">Bắn súng</option>
							<option value="Nhập vai">Nhập vai</option>
							<option value="Đối kháng">Đối kháng</option>
							<option value="Thể thao">Thể thao</option>
							<option value="Kinh dị">Kinh dị</option>
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

<?php 

if (isset($_POST["submited"])){
	$product_name = $_POST["product_name"];
	$price_buy = $_POST["price_buy"];
	$description = $_POST["description"];
	$category_name = $_POST["category_name"];
	$quantity = $_POST["quantity"];
	$distributor = $_POST["distributor"];
	$imgfile = $_FILES["imgfile"];
	require_once("connectdb.php");
	$sql = "INSERT INTO `product` (`product_id`, `product_name`, `price_buy`, `description`, `product_image`, `detail_image`, `category_id`, `distributor_name`, `quantity`)
	VALUES (NULL, '$product_name', '$price_buy', '$description','NULL','NULL','1', '$distributor', '$quantity')";
	$result = mysqli_query($connect,$sql);
	$id=0;
	switch ($category_name) {
		case 'Bắn súng':
		$id=1;
		break;
		case 'Nhập vai':
		$id=4;
		break;
		case 'Đối kháng':
		$id=3;
		break;
		case 'Thể thao':
		$id=2;
		break;
		case 'Kinh dị':
		$id=5;
		break;
		default:
		$id=0;
		break;
	}
	$sqlcategory = "update product set category_id='$id' where product_name='$product_name'";
	$resultcategory = mysqli_query($connect,$sqlcategory);
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

	$sqlimg = "UPDATE `product` SET `product_image`='../image/".$_FILES['imgfile']['name']."' WHERE product_name='$product_name'";
	$resultimg = mysqli_query($connect,$sqlimg);
	$sqlimg = "UPDATE `product` SET `detail_image`='../image/".$dir_imgfile."' WHERE product_name='$product_name'";
	$resultimg = mysqli_query($connect,$sqlimg);
	if ($result){
		?>

		<script language="javascript">
			alert('<?php echo "Thêm dữ liệu thành công. Nhấn \'OK\' để quay về trang ADMIN." ?>');
		</script>

		<?php
		$url="admin.php";
		echo "<meta http-equiv='refresh' content='0;url=$url' />";
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Thêm dữ liệu thất bại." ?>');
		</script>

		<?php
	}
}
?>
<?php include "../includes/footer.php" ?>
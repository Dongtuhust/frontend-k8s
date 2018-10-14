<?php include "../includes/header.php" ?>
<div class="container">
	<div id="content" >
		<form action="#" method="POST" class="form-checkout ">
			<div class="row">
				<div class="col-sm-6">
					<h4>Đặt hàng</h4>
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label for="name">Họ tên người nhận*</label>
						<input type="text"  class="form-control" id="name" name="name"  required>
					</div>
					<div class="form-block">
						<label>Giới tính </label>
						<input id="gender"  type="radio" class="input-radio" name="gender" value="Nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
						<input id="gender" type="radio" class="input-radio" name="gender" value="Nữ" style="width: 10%"><span>Nữ</span>
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" class="form-control" id="adress" name="address" required>
					</div>

					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" class="form-control" id="phone" name="phone" required>
					</div>
					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea class="form-control" id="notes" name="note" rows="5"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="my-order" style="margin-left: 50px;">
						<div class="my-order-head"><h5>Đơn hàng của bạn</h5></div>
						<div class="my-order-body" style="padding: 0px 10px">
							<div class="my-order-item">
								<?php
								$tongtien = 0;
								if (isset($_SESSION['cart'])) {
									foreach ($obj->records as $key => $value) {
										foreach ($_SESSION['cart'] as $id => $soluong) {
											if ($id==$obj->records[$key]->id) {
												?>
												<div class="media" >
													<img width="40%" src="<?=$obj->records[$key]->product_image?>" alt="">
													<div class="info-product">
														<p class="font-large">Thông tin sản phẩm</p>
														<span class="color-gray my-order-info"><b>Tên đĩa:</b> <?=$obj->records[$key]->name?></span>
														<span class="color-gray my-order-info"><b>Giá:</b> <?=$obj->records[$key]->price?></span>
														<span class="color-gray my-order-info"><b>Số lượng:</b><?=$_SESSION['cart'][$obj->records[$key]->id]?></span>
													</div>
												</div>
												<hr width="80%" align="center" />
												<?php
												$tongtien += $_SESSION['cart'][$obj->records[$key]->id]*$obj->records[$key]->price;
											}
										}

									}
								}else{
									echo "<h3>Chưa có sản phẩm nào</h3>";

								}
								?>
							</div>
							<div class="my-order-item">
								<div style="float: left;margin-left: 10px;"><p class="my-order-f18">Tổng tiền:</p></div>
								<div style="float: right;margin-right: 10px;">
									<h4>
										<?php if (isset($_SESSION['cart'])) {
											echo number_format($tongtien)."VNĐ";

										} else{
											echo"<div class=\"media\">";
											echo "0VNĐ</div>";
										}
										?>
									</h4>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="my-order-head"><h5>Hình thức thanh toán</h5></div>
						<div class="my-order-body">
							<ul class="payment_methods">
								<li>
									<input type="radio" class="radio-ship" name="payment_method" value="COD" checked="checked" data-order_button_text="">
									<label>Thanh toán khi nhận hàng </label>
									<div class="pay-way ship" style="display: block;">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>
								</li>

								<li >
									<input  type="radio" class="radio-credit" name="payment_method" value="ATM" data-order_button_text="">
									<label >Chuyển khoản </label>
									<div  class="pay-way credit" style="display: none;">
										Chuyển tiền đến tài khoản sau:
										<br>- Số tài khoản: 123 456 789
										<br>- Chủ TK: Nguyễn A
										<br>- Ngân hàng ACB, Chi nhánh Hà Nội
									</div>
								</li>

							</ul>

						</div>
						<input class="order-item" type="submit" name="order-submit" value="  Đặt hàng">
					</div> <!-- .my-order -->
				</div>
			</div>
		</form>

		<!-- Cập nhật đơn hàng vào cơ sở dữ liệu -->

	</div> <!-- #content -->
</div> <!-- .container -->
<?php
if (isset($_POST['order-submit'])) {
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$note = $_POST['note'];
	$payment = $_POST['payment_method'];
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$order_date = date("Y/m/d H:i:s");
	$order_id = mt_rand(1, 999999);
	$num = 1;
	require_once("connectdb.php");
	while ($num != 0) {
		$sql = "SELECT * FROM order_customer WHERE order_id = $order_id";
		$result = mysqli_query($connect, $sql);
		$num = mysqli_num_rows($result);
		if ($num == 0) break;
		else $order_id = mt_rand(1, 999999);
	}
	if ($tongtien==0) {
		echo "<script language=\"javascript\">";
		echo "alert('Bạn chưa mua sản phẩm nào');";
		echo "</script>";
	}else{
		$sql = "INSERT into order_customer (order_id,customer_name,customer_add,customer_phone,total_money,order_date,payment,gender,note,status) VALUES
		('".$order_id."','".$name."','".$address."','".$phone."','".$tongtien."','".$order_date."','".$payment."','".$gender."','".$note."','Đang chờ')";
		echo $sql;
		$result = mysqli_query($connect,$sql);
		if ($result) {
			//giảm số lượng sản phẩm trong csdl
			foreach ($_SESSION['cart'] as $id => $soluong) {
				$arr[] = "'".$id."'";
			}
			$str = implode(",",$arr);
			$sql = "Select * from product where product_id in ($str)";
			$result = mysqli_query($connect,$sql);
			while ($row = mysqli_fetch_array ($result)) {
				//giảm số lượng sản phâm đã bán trong csdl
				$newquantity = $row["quantity"] - $_SESSION['cart'][$row["product_id"]];
				$sqlpro = "UPDATE product SET quantity = $newquantity where product_id = '".$row['product_id']."'";
				$resultpro = mysqli_query($connect,$sqlpro);
				//tăng số lượng mua
				$newpurcharse = $row["purcharse_number"] + $_SESSION['cart'][$row["product_id"]];
				$sqladd = "UPDATE product SET purcharse_number = $newpurcharse where product_id = '".$row['product_id']."'";
				$resultadd = mysqli_query($connect,$sqladd);
				//thêm vào bảng order_product quản lý các sản phẩm mua của khách hàng
				$sql_order = "INSERT into order_product (order_id,product_name,username,quantity) VALUES
				('".$order_id."','".$row["product_name"]."','".$name."','".$_SESSION['cart'][$row["product_id"]]."')";
				$result_order = mysqli_query($connect,$sql_order);
			}
			echo "<script language=\"javascript\">";
			echo "alert('Mua hàng thành công sản phẩm sẽ chuyển đến sau vài ngày');";
			echo "</script>";
			unset($_SESSION['cart']);
			$url="index.php";
			echo "<meta http-equiv='refresh' content='0;url=$url' />";
		}else {
			echo "<script language=\"javascript\">";
			echo "alert('Mua hàng không thành công lỗi kết nối đến server');";
			echo "</script>";
		}
	}
}
?>
<?php include "../includes/footer.php" ?>

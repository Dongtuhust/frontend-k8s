<?php include "../includes/header.php" ?>
<div class="hover-effect" style="height: 80px">
<h2 style="text-align: center;">Quản lý sản phẩm do người dùng đăng bán</h2>
</div>
<table class="table table-hover">
<thead>
<tr>
<th scope="col">Chủ đĩa</th>
<th scope="col">Ảnh</th>
<th scope="col">Tên sản phẩm</th>
<th scope="col">Giá mua</th>
<th scope="col">Miêu tả</th>
<th scope="col">Ngày mua</th>
<th scope="col">Tình trạng</th>
<th scope="col">Trạng thái</th>
<th scope="col">Chi tiết</th>
</tr>
</thead>
<tbody>
<?php 
include_once '../configs/api-config.php';
$callApi = new CallApi();
//call product api
$api = $callApi->getOldProductApi();
$api .= "product/read.php";

$products_data_api = file_get_contents($api);
$obj = json_decode($products_data_api,false);

// call user api
$users_api = $callApi->getUsersApi();
$users_api .= "users/read.php";

$users_data_api = file_get_contents($users_api);
$user_obj = json_decode($users_data_api,false);

if($obj!=""){
			// Sử dụng vòng lặp để duyệt kết quả truy vấn
	foreach ($obj->records as $key => $value) {
		foreach ($user_obj->records as $user_key => $data) {
			if ($user_obj->records[$user_key]->email == $obj->records[$key]->user_mail) {
				$username = $user_obj->records[$user_key]->username;
			}
		}	
		?>
		<tr valign="top">
			<th scope="row" style="text-align: center;"><?=$username?></td>
				<td><span><img style="width: 70px;height: 50px;" class="card-img-top" src="<?=$obj->records[$key]->product_image?>" alt="Card image"></span></td>
				<td><?=$obj->records[$key]->name?></td>
				<td ><?=$obj->records[$key]->price?></td>
				<td ><textarea class="form-control" rows="1"><?=$obj->records[$key]->description?></textarea></td>
				<td style="text-align: center;"><?=$obj->records[$key]->buy_time?></td>
				<td style="text-align: center;"><?=$obj->records[$key]->percent?></td>
				<td style="text-align: center;"><?=$obj->records[$key]->status?></td>
				<td ><button type="button" class="btn btn-light" data-toggle="modal" data-target="#product_user<?=$obj->records[$key]->id?>" name="<?=$obj->records[$key]->id?>">Mua hàng</button></td>
				<div class="modal fade" id="product_user<?=$obj->records[$key]->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Thông tin khách hàng</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<?php
							if ($obj->records[$key]->status!="Đã bán") {
								?>
								<form method="post">
									<div class="modal-body">
										<div class="form-block">
											<label style="color: orange;">Người bán</label>
											<input type="text"  class="form-control" id="" name="nameseller" readonly value="<?=$username?>">
										</div>
										<div class="form-block">
											<label style="color: orange;">Mặt hàng</label>
											<input type="text"  class="form-control" id="" name="product_name" readonly value="<?=$obj->records[$key]->name?>">
										</div>
										<div class="form-block">
											<label style="color: orange;">Giá</label>
											<input type="text"  class="form-control" id="price_buy" name="price_buy" readonly value="<?=$obj->records[$key]->price?>">
										</div>
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
										<span>
											<input type="radio" class="radio-ship" name="payment_method" value="COD" checked="checked" data-order_button_text="">
											<label>Thanh toán khi nhận hàng </label>
										</span>

										<span >
											<input  type="radio" class="radio-credit" name="payment_method" value="ATM" data-order_button_text="">
											<label >Chuyển khoản </label>
										</span>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" name="submited" class="btn btn-primary">Đặt mua</button>
									</div>
								</form>
								<?php
							}else{
								?>
								<div class="modal-body">
									<span style="color: orange;font-family: Rubik;">Sản phẩm này đã có người mua</span>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								<?php
							}
							?>

						</div>
					</div>
				</div>

			</tr>
			<?php
		}
	}else{
		?>
		<tr valign="top">
			<td >&nbsp;</td>
			<td ><b><font face="Arial" color="#FF0000">
			Khong tim thay thong tin !</font></b></td>
		</tr>
		<?php
	}
	?>
</tbody>
</table>

<?php include "../includes/footer.php" ?>
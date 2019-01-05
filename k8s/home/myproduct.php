<?php include "../includes/header.php" ?>
<?php
// session_start();
?>
<div class="container">
	<div class="hover-effect" style="height: 50px">
		<h2 style="text-align: center;">Danh mục sản phẫm đã đăng</h2>
	</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">Ảnh</th>
				<th scope="col">Tên sản phẩm</th>
				<th scope="col">Giá mua</th>
				<th scope="col">Miêu tả</th>
				<th scope="col">Tình trạng</th>
				<th scope="col">% Mới/cũ</th>
				<th scope="col">Thay đổi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			include_once '../configs/api-config.php';
			$callApi = new CallApi();

// call user api
			$product_user_api = $callApi->getApi();
			$product_user_api .= 'old-products';
			$product_user_data_api = file_get_contents($product_user_api);
			$product_user_obj = json_decode($product_user_data_api,false);
			$i=0;
			// Sử dụng vòng lặp để duyệt kết quả truy vấn
			foreach ($product_user_obj->records as $key => $values) {
				if ($product_user_obj->records[$key]->user_mail == $_SESSION["email"]) {
					$i+=1;
					?>
					<tr valign="top">
						<td><span><img style="width: 70px;height: 50px;" class="card-img-top" src="<?=$product_user_obj->records[$key]->product_image?>" alt="Card image"></span></td>
						<td><?=$product_user_obj->records[$key]->name?></td>
						<td ><?=$product_user_obj->records[$key]->price?></td>
						<td ><textarea class="form-control" rows="1"><?=$product_user_obj->records[$key]->description?></textarea></td>
						<td style="text-align: center;"><?=$product_user_obj->records[$key]->status?></td>
						<td style="text-align: center;"><?=$product_user_obj->records[$key]->percent?></td>
						<td ><button type="button" class="btn btn-light" data-toggle="modal" data-target="#product_user<?=$product_user_obj->records[$key]->id?>" name="<?=$product_user_obj->records[$key]->id?>">Sửa</button></td>
						<div class="modal fade" id="product_user<?=$product_user_obj->records[$key]->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Chi tiết sản phẩm</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form method="post">
										<div class="modal-body">
											<p>user_email : </p><input type="text" class="form-control" name="user_email" value="<?=$product_user_obj->records[$key]->user_mail?>" readonly>
											<p>product_name : </p><input type="text" class="form-control" name="product_name" value="<?=$product_user_obj->records[$key]->name?>" readonly>
											<p>price : </p><input type="text" class="form-control" name="price_buy" value="<?=$product_user_obj->records[$key]->price?>">
											<p>description : </p><input type="text" class="form-control" name="description" value="<?=$product_user_obj->records[$key]->description?>">
											<p>percent : </p><input type="text" class="form-control" name="percent" value="<?=$product_user_obj->records[$key]->percent?>">
											<p>status : </p><input type="text" class="form-control" name="status" value="<?=$product_user_obj->records[$key]->status?>">
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" name="submited" class="btn btn-primary">Save changes</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</tr>
					<?php
				}	
			}
			if ($i != 0) {
				return 1;
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
</div>
<?php include "../includes/footer.php" ?>
<?php include "../includes/header.php" ;?>
<div class="background-deep">
</div>
<div class = "head-title">
	<p>Welcome to PS4 shop</p>
	<div class="go">
		<a href="#p1" title=""><button type="button" class="btn btn-light">Rent</button></a>
		<a href="#p1" title=""><button type="button" class="btn btn-light">Buy</button></a>
	</div>
</div>
<div class="container" id="home-content" data-id="
										<?php
										if(isset($_SESSION['user_id'])){ echo 1;}else echo 0;
										?>" >
	<div class="col-sm-12">
		<!-- list đĩa mới xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
		<h2 class="chimuc">Đĩa mới cập nhật</h2>
		<div class="hover-effect">
			<div class="row">
				<div class="col-sm-12">
					<div class="card-view">
						<div class="avatar new_product">
						</div>
						<div class="introduction">
							<p class="img-title">The Devition</p>
							<p class="descripes">Bộ phận The DivisionTM của Tom Clancy là một trải nghiệm RPG thực tế khiến cho thể loại này trở thành một thiết lập quân sự hiện đại lần đầu tiên.</p>
						</div>
					</div>
				</div>
			</div>
			<div id="product-new">
			
			</div>

	</div> <!-- .hover-effect Đĩa mới-->

	<div class="space60">&nbsp;</div>
	<h2 class="chimuc">Đĩa đang hot</h2>
	<!-- list bán chạy xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
	<div class="hover-effect">
		<div class="row">
			<div class="col-sm-12">
				<div class="card-view-2">
					<div class="avatar hot_product">
					</div>
					<div class="introduction">
						<p class="img-title-hot">Resident Evil 7</p>
						<p class="descripes-hot">Tiếp theo Resident Evil 5 và Resident Evil 6 , Resident Evil 7 sẽ trở lại với rễ kinh dị sống còn của franchise, với sự nhấn mạnh về thăm dò</p>
					</div>
				</div>
			</div>
		</div>
		<div id="product-hot">
			
		</div>
	</div> <!-- .hover-effect Đĩa bán chạy-->

<div class="space60">&nbsp;</div>
<!-- list all xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="hover-effect" id="all-product">
	
</div> <!-- .hover-effect Tất cả-->
<div class="row">
    <div class="col-sm-5"></div>
	<div id="paging" class="col-sm-4">	
	</div>
</div>


</div> <!-- #container -->
</div>
<script src="../js/home/get_api.js"></script>
<script src="../js/home/template.js"></script>

<?php include "../includes/footer.php" ?>


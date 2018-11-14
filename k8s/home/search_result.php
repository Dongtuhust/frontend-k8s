<?php include "../includes/header.php" ?>
<?php
$search = $_GET["search"];
?>
<div class="container" style="margin-bottom: 250px;">
	<div class="row">
		<div class="col-sm-12">
			<div id="result_search" data-key="<?=$search?>">
				
			</div>
		</div>
	</div>
	<!-- <div class="col-sm-4" style="margin-top: 100px;">
		<img src="https://images-na.ssl-images-amazon.com/images/I/71Eoo0-UaCL._SX385_.jpg" alt="">
	</div> -->
</div>
<script src="../js/home/search.js"></script>
<?php include "../includes/footer.php" ?>
<?php include "../includes/header.php"; ?>
<?php
$category_id = $_GET["category_id"];
?>
<div class="background-deep">
</div>
<div class = "head-title" id="category-header">
	
</div>
<div class="container">
	<div class="hover-effect">
		<!-- <h2 class="chimuc">Tựa game đối kháng</h2> -->
		<div class="row" id="category" data-key="<?=$category_id?>">
			
		</div>
	</div>
</div> <!-- .hover-effect Tất cả-->
</div>
<script src="../js/home/category.js"></script>
<?php include "../includes/footer.php" ?>


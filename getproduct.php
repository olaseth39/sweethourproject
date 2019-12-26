<?php
include('config.php');
$limit = $_POST['limit'];
$offset = $_POST['offset'];
?>
<?php
		$sql = "SELECT * FROM product LIMIT $limit OFFSET $offset";
		if(!mysqli_query($con,$sql)){
			echo "Error: ". mysqli_error($con); 
		}
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_all($result, MYSQLI_BOTH);
		$numcol = 4;
		$bootstrapcolwidth = 12/$numcol;
		$arraychunk = array_chunk($row,$numcol);
		foreach($arraychunk as $products){
?>
		<div class="row"> 
			<?php
			foreach($products as $product){
			?>
			<div class="col-md-<?php echo $bootstrapcolwidth; ?> img-responsive">
				<img src="images/<?php echo $product['picture']?>">
				<h1><?php echo $product['productName']?> </h1>
				&#8358;<?php echo $product['unitPrice']?>
			</div>
			<?php } ?>			
		</div>	<!--fifth row ends -->
	<?php
	}
?>




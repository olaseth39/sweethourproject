<?php
include('config.php');
include('header2.php');
include('header3.php')
?>
<!-- Get the productcategoryid -->
<?php
	$productcategoryurlid = $_GET['id'];
	$productcategoryurlname = $_GET['name'];
	$ajaxpostid = $_POST['id']
?>

<?php
	if(!isset($ajaxpostid)){
		echo "Something is wrong";
	}
	$sql = "SELECT * FROM product 
		WHERE productcategoryId = $productcategoryurlid
		LIMIT 9";
		//var_dump($sql);
		if(!mysqli_query($con,$sql)){
			echo "Error: ". mysqli_error($con); 
		}
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_all($result, MYSQLI_BOTH);
		$numcol = 3;
		$bootstrapcolwidth = 9/$numcol;
		$arraychunk = array_chunk($row,$numcol);
		foreach($arraychunk as $products){
?>
    	
		<div class="col-md-<?php echo $bootstrapcolwidth; ?> img-responsive">
			<h2 style="text-align:center";><?php echo $productcategoryurlname ?></h2>
				<?php
				//iterate through each product in each chunk
					foreach($products as $product){
				?>
			<img src="images/<?php echo $product['picture']?>"  class="orderimage givmarginbetweenimage" style="margin:20px">
			<h4 style="margin:20px"><?php echo $product['productName']?> </h4><b>&#8358;
			<i><?php echo $product['unitPrice']?></i></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<!-- <button class="btn btn-danger"><a href="<?php //echo $product['href'] ?>">Add to Cart</a></button> -->
			<button class="btn btn-primary"><a href="addtocart.php?id=<?php echo $product['productId'] ;?>">Add</a></button>
			
				<?php 
						} 
				?>
			</div>
			<?php 
						} 
			?>
		</div>	<!--fifth row ends -->

				<br><br><br>
				
<?php include('footer.php');?>	
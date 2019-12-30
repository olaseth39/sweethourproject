<?php
include('config.php');
include('headerlinks.php');
session_start();
//include('header3.php')
?>
<!-- Get the productcategoryid -->
<?php
	//$productcategoryurlid = $_GET['id'];
	//$productcategoryurlname = $_GET['name'];
	$_SESSION['post_id'] = $_POST['id'];
	//echo $_SESSION['post_id']
	//echo $_POST['page'];
	//$starting_limit_number = $_POST['limit'];
	//$result_per_page = $_POST['offset'];
	//var_dump($ajaxpostid)
	//var_dump($starting_limit_number)
?>
	
<?php
	if(!isset($_POST['id'])){
		echo "Something is wrong";
		//$_POST['id'] = $page;
	};
	
	$sql = "SELECT * FROM product 
		WHERE productcategoryId = '".$_POST['id']."'
		LIMIT 6
		";
		//var_dump($sql);
		if(!mysqli_query($con,$sql)){
			echo "Error: ". mysqli_error($con); 
		}
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_all($result, MYSQLI_BOTH);

			//pagination starts here
			//pagination ends here
		$numcol = 3;
		$bootstrapcolwidth = 12/$numcol;
		$arraychunk = array_chunk($row,$numcol);
		//$output = '';
		//7.display the links to the pages
		
					foreach($arraychunk as $products){
?>	
		<!-- Not	e that the beginning of this row is in header3 -->
		<div class="col-md-<?php echo $bootstrapcolwidth; ?> img-responsive">
				<!-- <h2 style="text-align:center";>Products...</h2> -->
				<!-- <span id="page_details"></span> -->
				<?php
				//iterate through each product in each chunk
					foreach($products as $product){
				?>
				<img src="images/<?php echo $product['picture']?>"  class=" orderimage">
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
      
	

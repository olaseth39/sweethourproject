<?php
include('config.php');
include('headerlinks.php');
//include('header3.php')
?>
<!-- Get the productcategoryid -->
<?php
	//$productcategoryurlid = $_GET['id'];
	//$productcategoryurlname = $_GET['name'];
	$_POST['id'];
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

	//<!-- pagination -->
		//<!-- pagination	 -->
		//<?php
//the value of $limit and $result_per_page are below in the pagination section
	//1.define how many results you want per page
	$result_per_page = 6;

	//2.Find out the number of results stored in the db
	$query = "SELECT * FROM product 
			 WHERE productcategoryId = '".$_POST['id']."'
			 ";
	$result2 = mysqli_query($con,$query);
	$row2 = mysqli_num_rows($result2);
	echo $row2;
	//3.determine the number of total page available
	$total_page_available = ceil($row2 / $result_per_page);
	//echo $total_page_available;
	//4.determine which page number visitor is currently on
	if(!isset($_GET['page'])){
		$page = 1;
	}else{
		$page = $_GET['page'];
	}
	//5.determine the sql limit starting number for the results on the displaying pages
	//On page 1, we want 1 - 6 results
	//On page 2, we want 7 - 12 results
	//On page 3, we want 13 - 18 results
	//,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
	//page 1 = 6 results per page LIMIT 0,6
	//page 2 = 6 results per page LIMIT 6,12
	//page 3 = 6 results per page LIMIT 12,18
	//,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
	//Generally we have the formular below for nth number
	//the starting_limit_number = LIMIT for each page number
	$starting_limit_number = ($page - 1) * $result_per_page;
	//echo $starting_limit_number

	//6.retrieve the sql limit starting number for the results on the displaying page
	//already written up in the beginning
	//echo $starting_limit_number;
	//echo $result_per_page;
	

	
	$sql = "SELECT * FROM product 
		WHERE productcategoryId = '".$_POST['id']."'
		LIMIT $starting_limit_number,$result_per_page
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

	<div class="row">	
				<div class="col-md-3 img-responsive">	
					<?php
					   for($page = 1 ;$page <= $total_page_available; $page++){
					?>
						<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid black;' id="<?php echo $page ?>">
						<?php echo $page  ?></span>
					<?php	
						}
					?>
				</div>
	</div>
		
	</div>	<!--fifth row ends -->
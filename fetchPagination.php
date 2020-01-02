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
    //$_POST['id'];
    echo $_SESSION['post_id']
	//echo $_POST['page'];
	//$starting_limit_number = $_POST['limit'];
	//$result_per_page = $_POST['offset'];
	//var_dump($ajaxpostid)
	//var_dump($starting_limit_number)
?>

<?php
	//<!-- pagination -->
		//<!-- pagination	 -->
		//<?php
//the value of $limit and $result_per_page are below in the pagination section
	//1.define how many results you want per page
	$result_per_page = 9;
	//2.Find out the number of results stored in the db
	$query = "SELECT * FROM product 
			 WHERE productcategoryId = '".$_SESSION['post_id']."'
			 ";
	$result2 = mysqli_query($con,$query);
	$row2 = mysqli_num_rows($result2);
	echo $row2;
	//3.determine the number of total page available
	$total_page_available = ceil($row2 / $result_per_page);
	$_SESSION['total_page'] = $total_page_available;
	echo $_SESSION['total_page'];
	//4.determine which page number visitor is currently on
	if(!isset($_POST['page'])){
		$page = 1;
	}else{
		$page = $_POST['page'];
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

	$sql = "SELECT * FROM product 
		WHERE productcategoryId = '".$_SESSION['post_id']."'
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
				foreach($arraychunk as $products){
?>	
		<!-- Note that the beginning of this row is in header3 -->
		<div class="col-md-<?php echo $bootstrapcolwidth; ?> img-responsive">
				<!-- <h2 style="text-align:center";>Products...</h2> -->
				<?php
				//iterate through each product in each chunk
					foreach($products as $product){
				?>
				<img src="images/<?php echo $product['picture']?>"  class=" orderimage">
				<h4 style="margin:20px"><?php echo $product['productName']?> </h4>
				<h4><b>&#8358;<i><?php echo $product['unitPrice']?></i></b> &nbsp;
				<input type="text" name="amount" value="" placeholder="Enter Amount needed">
			   </h4>
			   <p>
			       <input type="submit" name="submit" value="Add <?php echo $counter ?> to cart" class="btn btn-success">
			   </p>
				<!-- <input type="text" name="quantity" class="form-control" value="1"> -->
				<input type="hidden" name="hidden_name" value="<?php echo $product['productName'] ?>">
				<input type="hidden" name="hidden_price" value="<?php echo $product['unitPrice']?>">
				
			     <br>
				<?php 
					} 			
				?>
				<br>
			</div>
			<?php 	
					}	
?>			
		
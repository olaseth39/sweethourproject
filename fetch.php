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
		LIMIT 9
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
		<form method="post" action="fetch.php?action=add&id=<?php echo $product['id'] ?>">
			<img src="images/<?php echo $product['picture']?>"  class=" orderimage">
			<h4 style="margin:20px"><?php echo $product['productName']?> </h4>
			<h4><b>&#8358;<i><?php echo $product['unitPrice']?></i></b> &nbsp;&nbsp;
			   <input type="text" name="amount" value="" placeholder="Enter Amount needed">
			</h4>
			<p>
			       <input type="submit" name="submit" value="Add <?php echo $counter ?> to cart" class="btn btn-success">
			</p>
			<!-- <input type="text" name="quantity" class="form-control" value="1"> -->
			<input type="hidden" name="hidden_name" value="<?php echo $product['productName'] ?>">
			<input type="hidden" name="hidden_price" value="<?php echo $product['unitPrice']?>">
			<!-- <input type="button" name="submit" value="Add to cart" class="btn btn-success"> -->
			 <br>
			<?php 
					} 
						
			?>
			<br>
		</form>	
		</div>
		<?php 	
					}
		
?>	

 <!-- Now it's time to add to cart -->
<?php
    //check if the add to cart button is clicked
	if(isset($_POST['add_to_cart'])){
		//put the values in session cart if not found ther
		if(!isset($_SESSION['cart'])){
            $items_array = array(
				'product_id'    => $_GET['id'],
				'item_name'     =>  $_POST['hidden_name'],
				'product_price' => $_POST['hidden_price'],
				'item_quantity' => $_POST['quantity']
			);
			//index the session cart to be the first initial value
			$_SESSION['cart'][0] = $items_array;
		}else{
			//find the id if element already exist in the cart
			$item_array_id = array_column($items_array, $_GET['id']);
			//check for some id not found 
            if(!in_array($_GET['id'], $item_array_id)){
				//create a new variable for the count of sessioncart
				$count = count($_SESSION['cart']);
				//create a new items_array variable
				//this is to enable us to get the array of the items to be created after the previous has been added
				$items_array = array(
				'product_id'    => $_GET['id'],
				'item_name'     =>  $_POST['hidden_name'],
				'product_price' => $_POST['hidden_price'],
				'item_quantity' => $_POST['quantity']
				);
				$_SESSION['cart'][$count] = $items_array; 
			}else {
				echo "<script>alert('Product already added')</script>";
			}
			
		}
       
	}else {
        echo 'Product id has not been set';
	}
?>

								
      
	

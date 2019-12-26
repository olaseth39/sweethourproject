<?php include('header2.php'); ?>
	
<?php
	// function to validate, trim and htmlspecialchars inputs
	function test_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);
		return $data;		
    }
    // get id fromthe url
	$productIdfromUrl = $_GET['id'];

	//get the data in the form
	$price = test_input($_POST['price']);
	$number = test_input($_POST['number']);
	$productname = test_input($_POST['productname']);
	$total = test_input($_POST['total']);

?>

 <!-- Put data into session -->
 <?php

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$_SESSION['num'] = $number;
		$_SESSION['tot'] = $total;
		$_SESSION['pname'] = $productname;
		header("Location: http://localhost/dashboard/sweethour/signup.php");
	}
?>

	<?php
	    $sql = "SELECT * FROM product WHERE productId = $productIdfromUrl ";
            if(!mysqli_query($con,$sql)){
                echo "Error: ". mysqli_error($con); 
               }
                $result = mysqli_query($con,$sql);
				$row = mysqli_fetch_assoc($result);
				// to get the product name variable
				$productname = $row['productName'];
	?>
<!-- <//?php include('jsfororder.php'); ?>  -->
	<form method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>">
		<h2 style="text-align: center; background-color: rgba(0,0,0,0.5); color: white">Add to Cart</h2>
	<div class = "row">			
		<div class="col-md-4">			
			<img src="images/<?php echo $row['picture'];?>" class="orderimage"><br>
			<h4><input type="text" name="productname" value="<?php echo $row['productName'] ;?>" style="background-color: orange"></h4>
		</div>
		<div class="col-md-4">			
			<h3>Price</h3> <br>&#8358;<?php echo $row['unitPrice'];?>			
		</div>
		<div class="col-md-4">
			<h4>Amount Required </h4><br>
			<input type="text" name="number" id="number" placeholder="enter the amount of item" onkeyup="gettotal();">			
		</div>
	</div>
	<!-- second row -->
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">			
			<label>Total &#8358;</label>
			<input type="text" name="total" id="total">			
		</div>
		<div class="col-md-4">		
		</div>
		</div>
		<div class="col-md-3">
		</div>
		<div class="col-md-6">			
			<input type="submit" name="submit" value="Checkout" class="btn btn-success">			
		</div>
		<div class="col-md-3">			
		</div>
	</form>
		<script type="text/javascript" src="bootstrap/js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>

	<script type="text/javascript">		
		function gettotal(){
			var total = document.getElementById('total');
			var amountofquantity = document.getElementById('number').value;
			var sum = parseFloat(amountofquantity) * parseFloat(<?php echo $row['unitPrice'] ?>);
			total.value = sum;
			return sum; 
		}
	</script>
	<?php include('footer.php') ?>
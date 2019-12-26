<?php
	$title = "| View Products";
	include('innerheader.php'); 

	$myproductid = $_GET['id'];

	if(isset($_POST['deleter']) && $_POST['deleter']=='Delete Product' && $_POST['deleteproduct'] =='yes'){

	$productid = $_POST['productid'];

	//delete users detail from database
	$sql = "DELETE FROM product WHERE productId = '$productid'";

	if(mysqli_query($con, $sql)){
		$output= "A record was deleted";
		header("location: http://localhost/dashboard/sweethour/viewproduct.php?success=$output");
	}

}else if(isset($_POST['deleter']) && $_POST['deleter']=='Delete Product' && $_POST['deleteproduct'] =='no') {
	header("location: http://localhost/dashboard/sweethour/viewproduct.php");
}

?>


<h4>Deleting Product's Record</h4>
<h5 class="alert alert-warning">Are you sure you want to delete this product?</h5>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="radio" name="deleteproduct" value="yes">YES<br>
	<input type="radio" name="deleteproduct" value="no">NO<br>
	<input type="hidden" name="productid" value="<?php echo $myproductid; ?>">
	<input type="submit" name="deleter" value="Delete Product" class="btn btn-danger">
	
</form>
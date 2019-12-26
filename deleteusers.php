<?php
	$title = "| View Users";
	include('innerheader.php'); 

	$myproductid = $_GET['id'];

	if(isset($_POST['deleter']) && $_POST['deleter']=='Delete User' && $_POST['deleteuser']=='yes'){


	$userid = $_POST['userid'];
	//delete users detail from database

	$sql = "DELETE FROM users WHERE userId = '$userid'";

	if(mysqli_query($con,$sql)){
		$output= "A user was deleted";
		header("location: http://localhost/sweethour/listusers.php?success=$output");
	}

}

?>


<h4>Deleting Product's Record</h4>
<h5 class="alert alert-warning">Are you sure you want to delete this product?</h5>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="radio" name="deleteuser" value="yes">YES<br>
	<input type="radio" name="deleteuser" value="no">NO<br>
	<input type="hidden" name="userid" value="<?php echo $myproductid; ?>">
	<input type="submit" name="deleter" value="Delete User" class="btn btn-danger">
	
</form>
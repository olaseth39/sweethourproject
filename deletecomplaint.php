<?php
	$title = "| View Products";
	include('innerheader.php'); 

	$mycomplaintid = $_GET['id'];

	if(isset($_POST['deleter']) && $_POST['deleter']=='Delete Complaint' && $_POST['deletecomplaint']=='yes'){


	$complaintid = $_POST['complaintid'];
	//delete users detail from database

	$sql = "DELETE FROM product WHERE complaintId = '$complaintid'";

	if(mysqli_query($con,$sql)){
		$output= "A record was deleted";
		header("location: http://localhost/sweethour/viewcomplaint.php?success=$output");
	}

}

?>


<h4>Deleting Product's Record</h4>
<h5 class="alert alert-warning">Are you sure you want to delete this product?</h5>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="radio" name="deletecomplaint" value="yes">YES<br>
	<input type="radio" name="deletecomplaint" value="no">NO<br>
	<input type="hidden" name="complaintid" value="<?php echo $mycomplaintid; ?>">
	<input type="submit" name="deleter" value="Delete Complaint" class="btn btn-danger">
	
</form>
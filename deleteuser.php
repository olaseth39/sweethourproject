<?php
	$title = "| View users";
	
	include('innerheader.php');

?>

<?php
	
	$myuserid = $_GET['id'];
	if(isset($_POST['deleter']) && $_POST['deleter'] == 'Delete' && $_POST['delete'] == 'yes'){
		
		
	$userid = $_POST['userid'];
	$lastname = $_POST['lastname'];
	$sql = "DELETE  FROM users WHERE userId = '$userid'";

	if(!mysqli_query($con,$sql)){

		echo "Error in connection: ".mysqli_error($con);
	}else{
		$output = "A profile has been  deleted";
		header("location: http://localhost/sweethour/listusers.php?success = $output");
		}

	}
?>

	<div class="container">
		<div class="row">
			<form method = "post" action ="<?php echo $_SERVER['PHP_SELF'];?>">
				<div class="col-md-12">
				<!-- 	get lastname from the users table -->

					<h4 class="alert alert-warning">Are you sure you want to delete this person?</h4>
				</div>
				<div class="col-md-1">
				</div>
				<div class="col-md-2" style="text-align: center;">
					<input type="radio" name="delete" value="yes">Yes
				</div>
				<div class="col-md-9">	
					<input type="radio" name="delete" value="no">No
				</div>
				
				<div class="col-md-8">
					<input type="hidden" name="userid" value="<?php echo $myuserid; ?>">	
				</div>
				<div class="col-md-8">
					<input type="hidden" name="lastname" value="<?php echo $lastname; ?>">	
				</div>
				
		<div class="row">
				<div class="col-md-3">
					
				</div>
				<div class="col-md-6">
				<input type="submit" name="deleter" value="Delete" class ="btn btn-danger">
				</div>
				<div class="col-md-3">
					
				</div>
		</div>
			</form>
		</div>
	</div>

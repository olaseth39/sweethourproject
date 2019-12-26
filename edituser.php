<?php 
include('innerheader.php'); 

	// function to validate, trim and htmlspecialchars inputs
	function test_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);

		return $data;		
	}

	// check if register button is clicked
	//if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['submit']) && $_POST['submit']=='Update'){

		$lastname = test_input($_POST['lastname']);
		$firstname = test_input($_POST['firstname']);
		$gender = test_input($_POST['gender']);
		$roleid = test_input($_POST['roleid']);
		$userid = test_input($_POST['userid']);

		// validate lastname
		if(empty($lastname)){
			$err1 = "lastname field cannot be empty";
		}

		// validate firstname
		if(empty($firstname)){
			$err2 = "firstname field cannot be empty";
		}

		// validate gender
		if(empty($gender)){
			$err3 = "gender field cannot be empty";
		}

		// validate roleid
		if(empty($roleid)){
			$err4 = "roleid field cannot be empty";
		}
		// validate password
		

		// check if there is no validation error and insert into database table

		if($err1=='' && $err2=='' && $err3=='' && $err4=='' && $err5==''){

		//update users data in users table

		$sql = "UPDATE users SET lastname= '$lastname', firstname='$firstname', gender='$gender', roleId='$roleid' WHERE userId = '$userid'";
			
			

			if(!mysqli_query($con,$sql)){
				echo("Error description: ".mysqli_error($con));
			}else{

				$update = "$lastname $firstname profile was successfully updated!";

				header("Location: http://localhost/sweethour/listusers.php?success = $update");
			}


		}

		

	}

	



?>


		<?php
			//get specific user data from users table based on the userid
			$myuserid = $_GET['id'];
			$query1 = "SELECT lastname, firstname, gender, roleId, userId FROM users WHERE userId = '$myuserid'";

			// check if the sql query is okay
			if(!mysqli_query($con, $query1)){
				echo "Error:".mysqli_error($con);
			}
			$result1 = mysqli_query($con, $query1);
			$userinfo = mysqli_fetch_array($result1);

		

		?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<h4>Edit Profile</h4>
				<!-- Bootstrap Form -->
				<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="form-group">
						<label for="lastname" class="control-label col-md-4" >Lastname</label>
						<div class="col-md-8">
							<input type="text" name="lastname" id="lastname" class="form-control" placeholder="lastname" value="<?php echo $_POST['lastname']; ?>">
							<span class="error"><?php echo $err1; ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="firstname" class="control-label col-md-4" >Firstname</label>
						<div class="col-md-8">
							<input type="text" name="firstname" id="firstname" class="form-control" placeholder="firstname" value="<?php echo $_POST['firstname']; ?>">
							<span class="error"><?php echo $err2; ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="gender" class="control-label col-md-4" >Gender</label>
						<div class="col-md-8">
							<input type="radio" name="gender" id="gender"  value="Male" <?php if($_POST['gender']=='Male'){ echo "checked"; } ?>> Male
							<input type="radio" name="gender" id="gender" value="Female" <?php if($_POST['gender']=='Female'){ echo "checked"; } ?>> Female
							<span class="error"><?php echo $err3; ?></span>
						</div>
					</div>

					<?php
					//read and fetch roles from roles table
					$query = "SELECT * FROM roles";
					$result = mysqli_query($con,$query);

					//check if the sql query is ok
					if(!mysqli_query($con,$query)){
						echo "Error: ".mysqli_error($con);
					}

					?>

					<div class="form-group">
						<label for="roleid" class="control-label col-md-4" >Roles</label>
						<div class="col-md-8">
							<select name="roleid">
								<option value="">Select Role</option>
								<?php
								//display options from row table using while statement
								while($row = mysqli_fetch_assoc($result)){   
								  ?>

								<option value="<?php echo $row['roleId']; ?>" <?php if($userinfo['roleId'] == $row['roleId']){echo "selected";} ?>>
									<?php echo $row['role_name']; ?>
								</option>

								<?php
									}
								?>
								
							</select>
							<span class="error"><?php echo $err4; ?></span>
						</div>
					</div>


					
					<div class="form-group">
						<div class="col-md-offset-6 col-md-6">
							<input type="hidden" name="userid" value="<?php echo $myuserid; ?>">
							<button type="reset" class="btn btn-default">Clear</button>
							<input type="submit" name="submit" Value="Update" class="btn btn-success" />
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-3"></div>
			
		</div>
		
	</div>

<?php include('innerfooter.php'); ?>
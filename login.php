<?php include('header2.php'); ?>	
<?php
	// function to validate, trim and htmlspecialchars inputs
	function test_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);
		return $data;		
	}
	if($_SERVER['REQUEST_METHOD']=="POST"){
		  // var_dump($_POST);
		// validate email. It used to be username but I changed it to email
		if(empty($_POST['email'])){
			$error1 = "<span class='error'> Email field cannot be empty</span>";
		}elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
			$error1 = "<span class='error'> Invalid Email Address</span>";
		}else{
			$email = test_input($_POST['email']);
			//var_dump($email);
		}

		// validate password
		if(empty($_POST['password'])){
			$error2 = "<span class='error'> password field cannot be empty</span>";
		}else{
			$password = test_input($_POST['password']);
			//var_dump($_password);
		}

		if($error1 =='' && $error2 ==''){
			//encrpt the password
			$mypassword = md5($password); //md5 is no more secure
			//$mypassword = password_hash($password, PASSWORD_BCRYPT);
			// var_dump($mypassword);

			// query users table to check if login credentials match
			$sql = "SELECT users.*, roles.role_name FROM users LEFT JOIN roles ON users.roleId = roles.roleId 
				WHERE users.username = '$email' AND users.password = '$mypassword' LIMIT 1";

			//var_dump($sql);
			 //die;
			if(!mysqli_query($con,$sql)){
				echo "Error: ".mysqli_error($con);
			}else{
				$result = mysqli_query($con, $sql);
				$row = mysqli_fetch_array($result);

				// echo "<pre>";
				// print_r($row);
				// echo "</pre>";
				// die;

				if(mysqli_num_rows($result) == 1){
					$_SESSION['lname'] 		= $row['lastname'];
					$_SESSION['fname'] 		= $row['firstname'];
					$_SESSION['emailadd'] 	= $row['username'];
					$_SESSION['rolename'] 	= $row['role_name'];
					$_SESSION['roleid'] 	= $row['roleId'];
					$_SESSION['gend'] 		= $row['gender'];
					$_SESSION['userid'] 	= $row['userId'];
					$_SESSION['profilepics']= $row['picture'];
					$_SESSION['giveway'] 	= "goahead";

					// var_dump($_SESSION);
					// die;
					//redirect home
				  header("Location: http://localhost/dashboard/sweethour/home.php");
				 //var_dump(header);
				}else {
					$error3 = "<span>Invalid username or password</span>";
				}
			}
		}

	}
	?>

	<!-- <h2 style="text-align: center; border: 1px solid black">Login</h2> -->
	
	<form method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>">
		
		<div class="row" style="background-color: rgba(195,195,195,0.1);">
			<br>
			<br>
			<br>
			<div class="col-md-3"></div>
			<div class="col-md-6">
					<p></p>
				
					<h2 style="text-align: center; border: 0px solid black; background-color: orange; color: white">Login</h2>
					<?php if(isset($error3)){ echo $error3; } ?>
				<!--bootstrap form-->
				<!-- <form class="formcolor"> -->
					<div class="form-group">
						<label>Email*</label>
						<p></p>
					<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></div>
						<input type="text" name="email" id="emailaddress" class="form-control" placeholder="enter a valid email" value="<?php echo $_POST['email']; ?>">
						
						<div class="input-group-addon">.com</div>
						
					</div>
					</div>
					<span class="error"><?php echo $error1 ; ?></span>
					<p></p>

					<p></p>
					<div class="form-group">
						<label for="Password">Password*</label>
						<p></p>
						<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
					
						<input type="password" name="password" id="password" class="form-control" placeholder="enter your password" value="<?php echo $_POST['password']; ?>">
						
					</div>
					</div>
					<span class="error"><?php echo $error2; ?></span>

					<br>
					<div class="row">
						
					<input type="submit" name="submit" class="btn btn-danger
					" value="Submit" style="display: block;" />
						
					</div>
					<br>
					<br>
				</div>
					<p></p>
					<div class="col-md-3">
				
					</div>

			</div>
					
	</form>

	<br>
	
	
<?php include('footer.php'); ?>




















































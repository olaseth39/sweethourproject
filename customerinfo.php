<?php include('header.php'); ?>

	<!-- // function to validate, trim and htmlspecialchars inputs -->
	

	<?php
	function test_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);

		return $data;
	} 

	//use the method below for more than one form
			if(isset($_POST['submit']) && $_POST['submit']=="Register"){

			$lastname = test_input($_POST['lastname']);
			$firstname = test_input($_POST['firstname']);
			$address = test_input($_POST['address']);
			$city = test_input($_POST['city']);
			$username = test_input($_POST['username']);
			$phoneno = test_input($_POST['phoneno']);
			$gender = test_input($_POST['gender']);
			$password = test_input($_POST['password']);
			$state = test_input($_POST['state']);

			// validate lastname
			if(empty($lastname)){
				$err1 = "lastname field cannot be empty";
				 // var_dump($err1);
			}

			//validate firstname
			if(empty($firstname)){
				$err2 = "firstname field cannot be empty";
			}

			//validate city
			if(empty($city)){
				$err6 = "city field cannot be empty";
			}

			//validate address

			if(empty($address)){
				$err7 = "address field cannot be empty";
			}

			//validate geender
			if(empty($gender)){
				$err3 = "gender field cannot be empty";
			}

			//validate username
			if(empty($username)){
				$err4 = "username field cannot be empty";
			}elseif(!filter_var($username,FILTER_VALIDATE_EMAIL)){
				$err4 = "Invalid Email Address Format";
			}

			//validate password
			if(empty($password)){
				$err5 = "password field cannot be empty";
			}elseif(strlen($password) < 6){
				$err5 = "The number of password xters must be more than than 5";


			}

			//validate phone no
			if(empty($phoneno)){
				$err8 = "firstname field cannot be empty";
			}

			//validate state
			if(empty($state)){
				$err9 = "firstname field cannot be empty";
			}

			//Insert to database if there are no errors

		if($err1 == " " && $err2 == " " && $err3 == " " && $err4 == " " && $err5 == " " && $err6 == " " && $err7 == " " && $err8 == " " && $err9 == " "){

			//encrypt password
			$mypassword = md5($password);


			$sql = "INSERT INTO customer(lastname, firstname, phoneno, address, city, state, username, gender, password) VALUES('$lastname', '$firstname', '$phoneno', '$address', '$city', '$state', '$username', '$gender', '$password')";

			var_dump($sql);

			mysqli_query($con,$sql);

			if(!mysqli_query($con,$sql)){
				echo "Error description: ".mysqli_error($con);
			}else{

				$result = "Dear ". $firstname ." ". $lastname. ", your registration was successful <br/> ";
				$result .= "<a href='login.php'> Click here to login </a> ";

				echo $result;
			}

		}
		}

		

	?>

		<!--second row-->
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
					<p></p>
					<h2>Sign up to create an account with us</h2>
				<!--bootstrap form-->
				<!-- <form class="formcolor"> -->
					<div class="form-group">
						<label for="lastname">Last Name</label>
						<p></p>
						<input type="text" name="lastname" id="lastname" class="form-control" placeholder="enter your name" value="<?php echo $_POST['lastname']; ?>">
						<span class="error"><?php echo $err1 ; ?></span>
					</div>
					<p></p>
					<div class="form-group">
						<label for="firstname">First Name</label>
						<p></p>
						<input type="text" name="firstname" id="firstname" class="form-control" placeholder="enter your name" value="<?php echo $_POST['firstname']; ?>">
						<span class="error"><?php echo $err2 ; ?></span>
					</div>
					<p></p>

					<div class="form-group">
						<label for="phoneno">Phoneno</label>
						<p></p>
						<input type="text" name="phoneno" id="phoneno" class="form-control" placeholder="enter your name" value="<?php echo $_POST['phoneno']; ?>">
						<span class="error"><?php echo $err8 ; ?></span>
					</div>
					<p></p>
					<div class="form-group">
						<label for="lastname">Address</label>
						<p></p>
						<input type="text" name="address" id="lastname" class="form-control" placeholder="enter your name" value="<?php echo $_POST['address']; ?>">
						<span class="error"><?php echo $err7 ; ?></span>
					</div>
					
					<p></p>
					<div class="form-group">
						<label for="lastname">City</label>
						<p></p>
						<input type="text" name="city" id="city" class="form-control" placeholder="enter your name" value="<?php echo $_POST['city']; ?>">
						<span class="error"><?php echo $err6 ; ?></span>
					</div>
					<p></p>
					<div class="form-group">
						<label for="lastname">State</label>
						<p></p>
						<input type="text" name="state" id="state" class="form-control" placeholder="enter your name" value="<?php echo $_POST['state']; ?>">
						<span class="error"><?php echo $err9 ; ?></span>
					</div>
					
					<p></p>
					
					<div class="form-group">
						<label>Username</label>
						<p></p>
					<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></div>
						<input type="email" name="username" id="emailaddress" class="form-control" placeholder="enter a valid email" value="<?php echo $_POST['username']; ?>">
						
						<div class="input-group-addon">.com</div>
						
					</div>
					</div>
					<span class="error"><?php echo $err3 ; ?></span>
					<p></p>
					<div class="form-group">
						<label for="gender">Gender</label>
						<div>
						<input type="radio" name="gender" id="male"  value="Male" <?php if($_POST['gender']=='Male'){echo "checked";} ?>>Male
						<input type="radio" name="gender" id="female"  value="Female"  <?php if($_POST['gender']=='Female'){echo "checked";} ?>>Female

						
					
						
						</div>
						<span class="error"><?php echo $err4; ?></span>

					</div>
					<p></p>
					<div class="form-group">
						<label for="Password">Password</label>
						<p></p>
						<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
					
						<input type="password" name="password" id="passwrd" class="form-control" placeholder="enter your password" value="<?php echo $_POST['password']; ?>">
						
					</div>
					</div>
					<span class="error"><?php echo $err5; ?></span>
					<p></p>
					<!-- <div class="form-group">
						<label for="Password">Confirm Password</label>
						<p></p>
						<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
					
						<input type="password" name="paswrd" id="pasrd2" class="form-control" placeholder="enter your passord">
					</div>
					</div> -->
					<p></p>
					<!-- <input  name="register" id="register" value="Register" class="form-control"> -->
				<div class="row">
					<input type="submit" name="submit" class="btn btn-success
					" value="Register"/>
					<!-- <input type="reset" name="submit" class="btn btn-default
					" value="Reset"/> -->
				</div>
					<!-- <button type="submit" class="btn btn-success">Send</button>
 -->				</form>
 				<hr>
 				<span class="glyphicon glyphicon-earphone gly-2"></span> 080000005677788<br>
 				<span class="glyphicon glyphicon-envelope gly-2"></span>olaseth9@gmail.com<br>
 			<span class="glyphicon glyphicon-map-marker gly-2"></span>2 Irewole Street, Opebi Lagos</br>
			</div>
			<div class="col-md-3">
				<!-- <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://youtube.com/embed/GWEUoPBaSx4"></iframe>
				</div> -->	
			</div>
		</div>
			
	</div>		
					
		<?php include('footer.php');?>			
			
		

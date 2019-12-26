<?php include('header.php'); ?>
	
<?php
	// function to validate, trim and htmlspecialchars inputs
	function test_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);

		return $data;		
	}


	if($_SERVER['REQUEST_METHOD']=="POST"){

		//var_dump($_POST);

		// validate username
		if(empty($_POST['emailaddress'])){
			$error1 = "<span class='error'> emailaddress field cannot be empty</span>";
		}elseif(!filter_var($_POST['emailaddress'],FILTER_VALIDATE_EMAIL)){
			$error1 = "<span class='error'> Invalid emailaddress Address</span>";
		}else{
			$emailaddress = test_input($_POST['emailaddress']);
		}

		// validate password
		if(empty($_POST['password'])){
			$error2 = "<span class='error'> password field cannot be empty</span>";
		}else{
			$password = test_input($_POST['password']);
		}

		if($error1=='' && $error2==''){

			$mypassword = md5($password);

			// query users table to check if login credentials match
			
			$sql = "SELECT user.*, role.rolename FROM user LEFT JOIN role ON user.roleId = role.roleId WHERE user.emailaddress='$emailaddress' AND password='$mypassword' LIMIT 1";

			
				if(!mysqli_query($con, $sql)){
					echo "Error: ". mysqli_eror($con);
			}else{

				$result = mysqli_query($con, $sql);
				$row = mysqli_fetch_array($result);


				// echo "<pre>";
				// print_r($row);
				// echo "</pre>";

				if(mysqli_num_rows($result)==1){
					// create session variables
					$_SESSION['lname'] = $row['lastname'];
					$_SESSION['fname'] = $row['firstname'];
					$_SESSION['emailaddress'] = $row['emailaddress'];
					$_SESSION['gend'] = $row['gender'];
					$_SESSION['roleid'] = $row['roleid'];
					$_SESSION['rolename'] = $row['rolename'];
					$_SESSION['yeahz'] = "go";

					//then,  redirect to home.php
					header("Location: http://localhost/marketsquare/home.php");
				}else{
					$error3 = "<span class='error'> Invalid emailaddress or password </span>";
				}
			}

			// // check if username and password is valid
			// if($username=='info@moatacademy.com' && $password=='mymoat'){
			// 	// redirect to welcome.php
			// 	header("Location: http://localhost/moat7/welcome.php?email=$username");
			// }else{
			// 	$error3 = "<span class='error'> Invalid username or password </span>";
			// }
		}
	}



?>
<div class="container-fluid">    
        <div class="row" id="sup1">  
        <div class="col-md-4"> </div>      
        <div class="col-md-4" id="sup2">
        <div>
          <a href="index.html"><img src="images/MSLog.png" class="img-responsive" width="50%"></a> 
          </div>

   <h2>Login Form</h2>
	<div>
	<?php if(isset($error3)){ echo $error3; } ?>
<form method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>">
           <label for="emailaddress" class="control-label col-md-4" >emailaddress</label>
            <div class="col-md-8">
              <div class="input-group">
                <div class="input-group-addon">
                 <i class="glyphicon glyphicon-envelope"></i> 
                </div>
              <input type="text" name="emailaddress" id="emailaddress" class="form-control"  value="<?php echo $_POST['emailaddress']; ?>" placeholder="emailaddress">
            </div>
            <span class="error"><?php echo $error1; ?></span>
          </div>
          </div><br>
          <br>

		<div class="form-group">
            <label for="password" class="control-label col-md-4" >password</label>
            <div class="col-md-8">
              <div class="input-group">
                <div class="input-group-addon">
                 <i class="glyphicon glyphicon-lock"></i> 
                </div>
              <input type="password" name="password" id="password" class="form-control"  value="<?php echo $_POST['password']; ?>" placeholder="password">
            </div>
            <span class="error"><?php echo $error2; ?></span>
          </div>
          </div><br> 
          <br>
	
		<div class="form-group">
            <div class="col-md-offset-4 col-md-6">
              <button type="reset" class="btn btn-default">Clear</button>
              <input type="submit" name="submit" Value="Register" class="btn btn-success" />
            </div>
          </div>
				
	</form> 
	</div>
	</div>
	</div>

	 <?php  include('footer.php'); ?>


      
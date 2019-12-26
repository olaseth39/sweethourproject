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

			$status = test_input($_POST['status']);
			$paymentstatus = test_input($_POST['paymentstatus']);
			
			// validate status
			if(empty($status)){
				$err1 = "status field cannot be empty";
				 // var_dump($err1);
			}

			//validate paymentstatus
			if(empty($paymentstatus)){
				$err2 = "paymentstatus field cannot be empty";
			}

			
			//Insert to database if there are no errors

		if($err1 == " " && $err2 == " "){

			//encrypt password
			// $mypassword = md5($password);

			//working on this for now
			$sql = "INSERT INTO transaction(payment, paymentstatus) VALUES('$payment', '$paymentstatus')";
			$sql .= "SELECT "


			var_dump($sql);

			mysqli_query($con,$sql);

			if(!mysqli_query($con,$sql)){
				echo "Error description: ".mysqli_error($con);
			}else{

				$result = "transaction updated successfully ";
				// $result .= "<a href='login.php'> Click here to login </a> ";

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
					<h2>Check Transaction</h2>
				<!--bootstrap form-->
				<!-- <form class="formcolor"> -->
					<div class="form-group">
						<label for="status">Status</label>
						<div>
						<input type="radio" name="status" id="check"  value="success" <?php if($_POST['status']=='success'){echo "checked";} ?>>Successful
						<input type="radio" name="status" id="check"  value="failure"  <?php if($_POST['status']=='failure'){echo "checked";} ?>>Failed

						
					
						
						</div>
						<span class="error"><?php echo $err1; ?></span>

					</div>
					<p></p>
					<div class="form-group">
						<label for="paymentstatus">Payment Status</label>
						<div>
						<input type="radio" name="paymentstatus" id="male"  value="paid" <?php if($_POST['paymentstatus']=='paid'){echo "checked";} ?>>Paid
						<input type="radio" name="paymentstatus" id="paymentstatus"  value="notpaid"  <?php if($_POST['paymentstatus']=='notpaid'){echo "checked";} ?>>Not Paid

						
					
						
						</div>
						<span class="error"><?php echo $err2; ?></span>

					</div>
					<

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
			
		

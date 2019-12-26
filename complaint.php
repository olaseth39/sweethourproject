<?php 
include('header2.php'); ?>

	<!-- // function to validate, trim and htmlspecialchars inputs -->
	

	<?php
	function test_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);

		return $data;
	} 

	//use the method below for more than one form
			if(isset($_POST['submit']) && $_POST['submit']=="Submit"){

			$complaintcategory = test_input($_POST['category']);
			$complaintmessage = test_input($_POST['message']);
			// $complaintstatus = test_input($_POST['complaintstatus']);
			

			// validate complaintcategory
			if(empty($complaintcategory)){
				$err1 = "complaintcategory field cannot be empty";
				 // var_dump($err1);
			}

			

			//Insert to database if there are no errors

		if($err1 == ""){

			$sql = "INSERT INTO complaints(complaintCategory, complaintMessage, lastname, firstname, complaintStatus) VALUES('$complaintcategory', '$complaintmessage', '$_SESSION[lname]', '$_SESSION[fname]', '0')";

			if(!mysqli_query($con,$sql)){
				echo "Error description: ".mysqli_error($con);
			}else{

				$result = "Dear ". $_SESSION['lname']." ".  $_SESSION['fname']." " . ", your complaint has been submitted successfully and would be attended to. We are sorry for any problem(s) we caused you. <br/> ";
				// $result .= "<a href='login.php'> Click here to login </a> ";

				
			}

		}
	}

		

	?>

		<!--second row-->
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<h4 style="color: red">Dear Customer we regret any fault commited by our team. Kindly fill the form below to serve you better. </h4>
		<div class="row">
			<!-- <//?php echo $result; ?> -->
			<div class="col-md-3"></div>
			<div class="col-md-6" style="background-color: orange">
					<p></p>
					<h2 style="text-align: center">Tell us your complain(s)</h2>
					<?php echo $result; ?>
				<!--bootstrap form-->
				<!-- <form class="formcolor"> -->
					<div class="form-group">
						<label for="complaint">Complain Category</label>
						<p></p>
						<select name="category">
							<option value="">Select Complain</option>
							<option value="Late delivery">Late delivery of food stuff</option>
							<option value="incomplete food items">Incomplete food items ordered</option>
							<option value="poor packaging">Poor packaging of food stuff</option>
							<option value="inadequate facilities for outdoor catering ">Inadequate facilities for outdoor catering</option>
						</select>
						
						<span class="error"><?php echo $err1 ; ?></span>
					</div>
					<p></p>
					
					<div class="form-group">
						<label>Any additional message?</label>
						<p></p>
					<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></div>
						<textarea name="message" id="message" placeholder="enter your complaint" value="<?php echo $_POST['message']; ?>"></textarea> <!-- type="textarea" name="message" id="message" class="form-control" placeholder="enter your complaint"> -->
						
						
						
					</div>
					</div>
					
					
				<div class="row">
					<input type="submit" name="submit" class="btn btn-success
					" value="Submit"/>
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
			
		

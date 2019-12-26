<?php 
//session_start();
include('innerheader.php');
//include('addtocart.php')
?>
	<?php
	function test_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);

		return $data;
	} 

	//use the method below for more than one form
			if(isset($_POST['submit']) && $_POST['submit']=="Submit"){

			// $lastname = test_input($_POST['lastname']);
			// $firstname = test_input($_POST['firstname']);
			$phoneno = test_input($_POST['phoneno']);
			$address = test_input($_POST['address']);
			$state = test_input($_POST['state']);
			$city = test_input($_POST['city']);
			$nearestbusstop = test_input($_POST['nearestbusstop']);
			$productname = test_input($_POST['productname']);
			$quantity = test_input($_POST['number']);
			$totalamount = test_input($_POST['totalprice']);
			$userid = test_input($_POST['userid']);
	
			//validate phoneno
			if(empty($phoneno)){
				$err1 = "phoneno field cannot be empty";
			}
			//validate address
			if(empty($address)){
				$err2 = "address field cannot be empty";			
			}
			//validate state
			if(empty($state)){
				$err3 = "state field cannot be empty";
			}
			//validate city
			if(empty($city)){
				$err4 = "city field cannot be empty";
			}
			//validate nearest busstop
			if(empty($nearestbusstop)){
				$err5 = "busstop field cannot be empty";
			}
			//Insert to database if there are no errors
		if($err1 == "" && $err2 == "" && $err3 == "" && $err4 == "" && $err5 == ""){
			$sql = "INSERT INTO ordereditems(userId,lastname,firstname, phoneno,address,state,city,nearestbusstop,productName, quantity,totalamount) 
					VALUES('$userid', '$_SESSION[lname]', '$_SESSION[fname]', '$phoneno', '$address', '$state', '$city', '$nearestbusstop', '$productname', '$quantity', '$totalamount')";
			// var_dump($sql);

			if(!mysqli_query($con,$sql)){
				echo "Error description: ".mysqli_error($con);
			}else{
				header("Location: http://localhost/dashboard/sweethour/successordermessage.php");
				
			}

		}
		}
	?>

		<!--second row-->
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">	     
		<div class="row">
			<div class="col-md-3"><img src="images/sweethourlogo.png" id="formatlogo"></div>
			<div class="col-md-6">
					<p></p>
					 
					<h2 style="text-align: center;">Order Now</h2>
					<p></p>
				<!--bootstrap form-->
				<!-- <form class="formcolor"> -->
					
				<div class="col-md-6">
						<label for="phoneno">Telephone no</label>
						<p></p>
						<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></div>
						<input type="text" name="phoneno" id="phoneno" class="form-control" placeholder="enter your phone no" value="<?php echo $_POST['phoneno']; ?>">
					</div>
						<span class="error"><?php echo $err1 ; ?></span>
				</div>
					<p></p>
				<div class="col-md-6">
						<label for="address">Address</label>
						<p></p>
						<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></div>
							<input type="text" name="address" id="address" class="form-control" placeholder="enter your address" value="<?php echo $_POST['address']; ?>">
						</div>
					<span class="error"><?php echo $err2 ; ?></span>
				</div>
					<p></p>
					<div class="col-md-6">
						<label>State</label>
						<p></p>
						<select name="state">
							<option value="0">Select State</option>
							<option value="Abia">Abia</option>
							<option value="Adamawa">Adamawa</option>
							<option value="AkwaIbom">AkwaIbom</option>
							<option value="Anambra">Anambra</option>
							<option value="Bauchi">Bauchi</option>
							<option value="Bayelsa">Bayelsa</option>
							<option value="Benue">Benue</option>
							<option value="CrossRiver">Cross River</option>
							<option value="Delta">Delta</option>
							<option value="Ebonyi">Ebonyi</option>
							<option value="Edo">Edo</option>
							<option value="Ekiti">Ekiti</option>
							<option value="Enugu">Enugu</option>
							<option value="Gombe">Gombe</option>
							<option value="Imo">Imo</option>
							<option value="Jigawa">Jigawa</option>
							<option value="Kaduna">Kaduna</option>
							<option value="Kano">Kano</option>
							<option value="Katsina">Katsina</option>
							<option value="Kebbi">Kebbi</option>
							<option value="Kogi">Kogi</option>
							<option value="Kwara">Kwara</option>
							<option value="Lagos">Lagos</option>
							<option value="Nassarawa">Nassarawa</option>
							<option value="Niger">Niger</option>
							<option value="Ogun">Ogun</option>
							<option value="Ondo">Ondo</option>
							<option value="Osun">Osun</option>
							<option value="Oyo">Oyo</option>
							<option value="Plateau">Plateau</option>
							<option value="Rivers">Rivers</option>
							<option value="Abuja">Abuja</option>
						
						<!--  <//?php if(value == true){echo "selected" }?> --> 
						</select>
					
					<span class="error"><?php echo $err3 ; ?></span>
					</div>
					<p></p>
					<div class="col-md-6">
						<label for="city">City</label>
						<p></p>
						<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></div>
						<input type="text" name="city" id="city" placeholder="enter your city" value= "<?php echo $_POST['city'] ?>">
						</div>
						<span class="error"><?php echo $err4; ?></span>

					
				</div>
					<p></p>


					<div class="col-md-12">
						<label for="nearestbusstop">Nearest Bus stop</label>
						<p></p>
						<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-stop"></i></div>
					
						<input type="text" name="nearestbusstop" id="nearestbusstop" class="form-control" placeholder="enter your nearestbusstop" value="<?php echo $_POST['nearestbusstop']; ?>">
						
					</div>
					
					<span class="error"><?php echo $err5; ?></span>
					</div>
					<p></p>

					<!-- //fetch data from product table -->
					<div class="col-md-4">
						<label for="productname">Product Name</label>
						<p></p>
						<input type="text" name="productname" id="productname" value="<?php echo $_SESSION['pname'];?>">
					</div>
								
					<div class="col-md-3">
						<label for="quantity">Quantity</label>
						<p></p>
						<!-- <div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-cart"></i></div> -->
						<input type="text" name="number" id="number" value= "<?php echo $_SESSION['num'] ?>">
						<!-- </div> -->
					</div>
					<!-- display the price automatically -->
					<div class="col-md-5">
						<label for="totalprice">Total Price, &#8358;</label>
						<p></p>
						<!-- <div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-money"></i></div> -->
							<input type="text" name="totalprice" id="totalprice" placeholder="" value= "<?php echo $_SESSION['tot']; ?>">
						<!-- </div> -->
						<!-- Get the userid and hide it -->
						<div>
							<!-- include $phoneno later to the query below	 -->
							<?php
								$query_for_userid = "SELECT users.*, ordereditems.orderedItemsId 
													FROM users LEFT JOIN ordereditems
													ON users.userId = ordereditems.orderedItemsId
													WHERE users.username = '$_SESSION[emailadd]'";
											
								$output = mysqli_query($con, $query_for_userid);
								// var_dump($output);
								if(!mysqli_query($con, $query_for_userid)){
									echo "Error in connection".mysqli_error($con);
								}
								while ($row_of_userid = mysqli_fetch_assoc($output)){
							?>
							<input type="hidden" name="userid" value="<?php echo $row_of_userid['userId'];?>">
							<?php }; ?>
						</div>
					</div>
	
					<div class="col-md-4">
												
					</div>
					<div "col-md-4">
						<input type="reset" name="reset" value="Reset">
						<input type="submit" name="submit" value="Submit">
					</div>
					<div class="col-md-4">
												
					</div>				
				</form>
			</div>
 			<!-- 	<hr>
 			<div>
 				<span class="glyphicon glyphicon-earphone gly-2"></span> 080000005677788<br>
 				<span class="glyphicon glyphicon-envelope gly-2"></span>olaseth9@gmail.com<br>
 			<span class="glyphicon glyphicon-map-marker gly-2"></span>2 Irewole Street, Opebi Lagos</br>
			</div> -->
			<div class="col-md-3">
				<!-- <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://youtube.com/embed/GWEUoPBaSx4"></iframe>
				</div> -->	
			</div>
		</div>
			
	</div>		
					
		<?php include('footer.php');?>			
			
		

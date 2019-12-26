<?php include('innerheader.php'); ?>

	<!-- // function to validate, trim and htmlspecialchars inputs -->
	

	<?php
	function test_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);

		return $data;
	} 

	//use the method below for more than one form
			if(isset($_POST['submit']) && $_POST['submit']=="Submit"){

			$productcategoryname = test_input($_POST['productcategoryname']);
			 $productcategorydescription = test_input($_POST['productcategorydescription']);
			
			// validate productname
			if(empty($productcategoryname)){
				$err1 = "productcategoryname field cannot be empty";
				 // var_dump($err1);
			}

			//validate productcategorydescription
			if(empty($productcategorydescription)){
				$err2 = "productcategorydescription field cannot be empty";
			}

			

			
			//picture validation is not needed for no
			// validate picture
			// if(empty($picture)){
			// 	$err4 = "picture field cannot be empty";
			// }elseif(strlen($password) < 6){
			// 	$err5 = "The number of password xters must be more than than 5";


			// }

			//Insert to database if there are no errors

		if($err1 == "" && $err2 == ""){ 

			


			$sql = "INSERT INTO productcategory(productcategoryname, description) VALUES('$productcategoryname', '$productcategorydescription')";

			// var_dump($sql);

			

			if(!mysqli_query($con,$sql)){
				echo "Error description: ".mysqli_error($con);
			}else{

				$result = "Your input was successfully added <br/> ";
				// $result .= "<a href='login.php'> Click here to login </a> ";

				
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
					<h2>Input For Product Category</h2>
					<span class="alert alert-danger"><?php echo $result;?></span>
				<!--bootstrap form-->
				<!-- <form class="formcolor"> -->
					<div class="form-group">
						<label for="productname">Product Category Name</label>
						<p></p>
						<input type="text" name="productcategoryname" id="productcategoryname" class="form-control" placeholder="enter the productcategory name" value="<?php echo $_POST['productcategoryname']; ?>">
						<span class="error"><?php echo $err1 ; ?></span>
					</div>
					<p></p>
					<div class="form-group">
						<label for="productcategorydescription">Category Description</label>
						<p></p>
						<input type="text" name="productcategorydescription" id="productcategorydescription" class="form-control" placeholder="enter the description" value="<?php echo $_POST['productcategorydescription']; ?>">
						<span class="error"><?php echo $err2 ; ?></span>
					</div>
					
					<!-- <input  name="register" id="register" value="Register" class="form-control"> -->
					<div class=col-md-3>
					<input type="submit" name="submit" class="btn btn-success
					" value="Reset"/>
					</div>
					<div>
					 <input type="submit" name="submit" class="btn btn-danger
					" value="Submit"/>
					</div>
				</div>
			</div>
				
					<!-- <button type="submit" class="btn btn-success">Send</button>
 -->				</form>
 				<div class="form-group">
 				<span class="glyphicon glyphicon-earphone gly-2"></span> 080000005677788<br>
 				<span class="glyphicon glyphicon-envelope gly-2"></span>olaseth9@gmail.com<br>
 			<span class="glyphicon glyphicon-map-marker gly-2"></span>2 Irewole Street, Opebi Lagos</br>
			</div>
			<div class="col-md-3">
				<!-- <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://youtube.com/embed/GWEUoPBaSx4"></iframe>
				</div> -->	
			</div>
		
			
			

			 <hr>
					
		<?php include('innerfooter.php');?>			
			
		

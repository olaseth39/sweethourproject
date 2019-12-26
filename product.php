<?php include('innerheader.php'); ?>
	<!-- // function to validate, trim and htmlspecialchars inputs -->
	<?php
		function test_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);
		return $data;
	} 
	//use the method below for more than one form
			if(isset($_POST['submit']) && $_POST['submit']=="Add Product"){
			$productname = test_input($_POST['productname']);
			$productdescription = test_input($_POST['productdescription']);
			$picture = test_input($_POST['picture']);
			$unitprice = test_input($_POST['unitprice']);
			$productcategoryId = test_input($_POST['productcategoryId']);
			// $password = test_input($_POST['password']);
			// validate productname
			if(empty($productname)){
				$err1 = "Productname field cannot be empty";
				 // var_dump($err1);
			}
			//validate productdescription
			if(empty($productdescription)){
				$err2 = "Productdescription field cannot be empty";
			}

			//validate unitprice
			if(empty($unitprice)){
				$err3 = "Unitprice field cannot be empty";
			}

			// validate picture
			if(empty($picture)){
			 	$err4 = "Picture field cannot be empty";
			}

			if(empty($productcategoryId)){
				$err5 = "Product category cannot be empty";
		   }
			//elseif(strlen($password) < 6){
			// 	$err5 = "The number of password xters must be more than than 5";

			// }

			//Insert to database if there are no errors

		if($err1 == "" && $err2 == "" && $err3 == "" && $err4 == "" && $err5 == ""){ 
				//check if global variable files has a value
			if(!$_FILES['profilephoto']['error'] > 0){		

			//assign which folder to upload the file
			$folder = "uploads/";   //a directory
			$filename = $_FILES['picture']['name']; //multiarray
			$filesize = $_FILES['picture']['size'];
			$filetype = $_FILES['picture']['type'];
			$tempfolder = $_FILES['picture']['tmp_name'];

			$file_ext = strtolower(end(explode('.',$filename))); //u can break the expression by assigning to a variable

			// specify extensions allowed

			$extensions = array('png','jpg','jpeg','gif','PNG');

			// check for valid extension
			//in_array() function checks if the value exists in an array
			if(in_array($file_ext, $extensions) == false){
				// $error[] signifies an empty array
				$error[] = "extension not allowed. Please upload profile photo in png, jpg, jpeg, gif, PNG file format";
			}

			//check the file size
			if($filesize > 2097152){
				$error[] = "File size must be exactly or less than 2MB";
			}

			$filename = $filename; //time(); appending time to it
			$destination = $folder.$filename; //".$file_ext";

			// check if their is no file upload error

			if(empty($error) == true){

			//to move to the final destination
				move_uploaded_file($tempfolder, $destination);
			
			$sql = "INSERT INTO product(productName, productDescription, unitPrice, picture, productcategoryId)
					 VALUES('$productname', '$productdescription', '$unitprice', '$filename', '$productcategoryId')";

			// var_dump($sql);

			if(!mysqli_query($con,$sql)){
				echo "Error description: ".mysqli_error($con);
			}else{
				$result = "<div class='alert alert-success alert-dismissible'>
								<span class='close' data-dismiss='alert' aria-label='close'>&times;</span>
								Product added successfully!!!
							</div>";
				// $result .= "<a href='login.php'> Click here to login </a> ";				
			}
		}else{
					// var_dump($error);
				}
				}else{
					echo "You've not uploaded a profile photo";
				}
				};
			}
		?>

		<?php
  //get specific user data from users table based on the userid. This is not needed here
			//$myuserId = $_GET['id'];
			//$query1 = "SELECT lastname, firstname, gender, roleId, userId FROM users WHERE userId='$myuserId'";

			  //check if the sql query is okay
			    //  if(!mysqli_query($con, $query1)){
			    //     echo "Error: ". mysqli_error($con);
			    //        } 
			    //     $result1 = mysqli_query($con, $query1);
			    //     $userinfo = mysqli_fetch_array($result1);
			         // var_dump($userinfo);

?>
		<!--second row-->
		<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
					<p></p>
					<h2>Add a product</h2>
						<?php echo $result ?>
					<!-- <div class="alert alert-success alert-dismissible">
   						 <span class="close" data-dismiss="alert" aria-label="close">&times;</span>
						
  					</div> -->
				<!--bootstrap form-->
				<!-- <form class="formcolor"> -->

					<!-- first row for product category dropdown -->

				<?php
                     //read and fetch productcategorynames from productcategory table
                     $query = "SELECT * FROM productcategory";
                     $result2 = mysqli_query($con, $query);
                     
                     //check if the sql query is okay 
                     if(!mysqli_query($con, $query)){
                     	echo "Error: ". mysqli_error($con);
                     }
                ?>  
                     
					<div class="form-group">
						<label for="productcategory">Product Category</label>
						<div>
							<select name="productcategoryId">
								<option value="">Select ProductCategory</option>
								<?php
                                 //display options for roles table using while(){
								while($row = mysqli_fetch_assoc($result2)){
								?>
								<option value="<?php echo $row['productcategoryId']; ?>">
									<!-- The immediate php tag below is not needed, its for reference purpose -->
									 <?php if($user['productcategoryId'] == $row['productcategoryId']){
										echo "selected"; } ?>
									<?php echo $row['productCategoryName']; ?>
								</option>
								<?php
                                   }    
								?>
							</select>
							<span class="error"><?php echo $err5 ; ?></span>
						</div>
					</div>

					<div class="form-group">
						<label for="productname">Product Name</label>
						<p></p>
						<input type="text" name="productname" id="productname" class="form-control" 
							placeholder="enter the product name" value="<?php echo $_POST['productname']; ?>">
						<span class="error"><?php echo $err1 ; ?></span>
					</div>
					<p></p>
					<div class="form-group">
						<label for="productdescription">Product Description</label>
						<p></p>
						<input type="text" name="productdescription" id="productdescription" class="form-control" 
							placeholder="enter the product's description" value="<?php echo $_POST['productdescription']; ?>">
						<span class="error"><?php echo $err2 ; ?></span>
					</div>
					
					<p></p>

					<div class="form-group">
						<label for="productname">Unit Price,&#8358;</label>
						<p></p>
						<input type="text" name="unitprice" id="unitprice" class="form-control" 
							placeholder="enter the price" value="<?php echo $_POST['unitprice']; ?>">
						<span class="error"><?php echo $err3 ; ?></span>
					</div>
					<p></p>

					<div class="form-group">
						<label for="picture">Product Photo</label>
							<input type="file" name="picture" id="picture" class="form-control"> 
							<span class="error"><?php echo $err4 ; ?></span>
					</div>
					<p></p>
				
				<div class="row">
					<div class="col-md-6">
					<input type="reset" name="reset" class="btn btn-primary btn btn-sm
					" value="Reset"/>
					</div>
					<div class="col-md-6">
					 <input type="submit" name="submit" class="btn btn-success btn btn-sm
					" value="Add Product"/>
					</div>
				</div>
					
 				</form>
 		
					<p></p>
					
 				<div class="col-md-3"></div>
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
					
		<?php include('innerfooter.php');?>			
			
		

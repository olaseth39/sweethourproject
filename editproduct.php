<?php include('innerheader.php'); ?>
	<!-- // function to validate, trim and htmlspecialchars inputs -->
<?php
	function test_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);

		return $data;
	} 

	//use the method below for more than one form
			if(isset($_POST['submit']) && $_POST['submit']=="Update"){
			$productname = test_input($_POST['productname']);
			$productdescription = test_input($_POST['productdescription']);
			$picture = test_input($_POST['picture']);
			$unitprice = test_input($_POST['unitprice']);
			$productcategoryId = test_input($_POST['productcategoryId']);
			$productId = test_input($_POST['productid']);
			// $password = test_input($_POST['password']);

			// validate productname
			if(empty($productname)){
				$err1 = "productname field cannot be empty";
				 // var_dump($err1);
			}

			//validate productdescription
			if(empty($productdescription)){
				$err2 = "productdescription field cannot be empty";
			}

			//validate unitprice
			if(empty($unitprice)){
				$err3 = "unitprice field cannot be empty";
			}	
			//picture validation is not needed for no
			// validate picture
			 // if(empty($picture)){
			 // 	$err4 = "picture field cannot be empty";
			//  }
			// 	$err5 = "The number of password xters must be more than than 5";


			// }

			//Insert to database if there are no errors

		if($err1 == "" && $err2 == "" && $err3 == ""){ 
				//check if global variable files has a value
			if(!$_FILES['picture']['error'] > 0){		

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
		
			$sql = "UPDATE product SET productName= '$productname', productcategoryId='$productcategoryId', 
					productDescription='$productdescription', unitPrice='$unitprice', picture ='$filename' 
					WHERE productId = '$productId'";

			 // var_dump($sql);

			if(!mysqli_query($con,$sql)){
				echo "Error description: ".mysqli_error($con);
			}else{

				$update = " Product was successfully updated!";
				
				header("Location:http://localhost/dashboard/sweethour/viewproduct.php?success=$update");
				}
			
			}

		}

	}

}
?>
<?php
  //get specific product data from product table based on the productid
			$myproductId = $_GET['id'];
			$query1 = "SELECT  productName, productDescription, unitPrice, picture, productId, productcategoryId 
						FROM product WHERE productId='$myproductId'";

			  //check if the sql query is okay
			     if(!mysqli_query($con, $query1)){
			        echo "Error: ". mysqli_error($con);
			    } 			        
			        $result1 = mysqli_query($con, $query1);
					$productinfo = mysqli_fetch_array($result1);
					//print_r($productinfo);
					// Get the datails from the product table
					$productname 			= 	$productinfo['productName'];
					$unitprice 	 			= 	$productinfo['unitPrice'];
					$productdescription		=	$productinfo['productDescription'];
					$picture 				= 	$productinfo['picture'];
			        
?>
		<!--second row-->
		<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
					<p></p>
					<h2>Edit a product</h2>
					<span style="color: red"><?php echo $result;?></span>
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
						<label for="productcategory" class="control-label col-md-4" >Product Category</label>
						<div class="col-md-8">
							<select name="productcategoryId">
								<option value="">Select ProductCategory</option>
								<?php
                                 //display options for roles table using while(){
								while($row = mysqli_fetch_assoc($result2)){
								?>
								<option value="<?php echo $row['productcategoryId'];?>"
									<?php if($productinfo['productcategoryId'] == $row['productcategoryId']){
										echo "selected"; } ?>>
									<?php echo $row['productCategoryName']; ?>
								</option>
								<?php
                                   }    
								?>
							</select>							
						</div>
					</div>

					<div class="form-group">
						<label for="productname">Product Name</label>
						<p></p>
						<input type="text" name="productname" id="productname" class="form-control" 
							placeholder="" value="<?php echo $productname; ?>">
						<span class="error"><?php echo $err1 ; ?></span>
					</div>
					<p></p>
					<div class="form-group">
						<label for="productdescription">Product Description</label>
						<p></p>
						<input type="text" name="productdescription" id="productdescription" class="form-control" 
							placeholder="" value="<?php echo $productdescription; ?>">
						<span class="error"><?php echo $err2 ; ?></span>
					</div>
					
					<p></p>

					<div class="form-group">
						<label for="productname">Unit Price,&#8358;</label>
						<p></p>
						<input type="text" name="unitprice" id="unitprice" class="form-control" 
							placeholder="" value="<?php echo $unitprice; ?>">
						<span class="error"><?php echo $err3 ; ?></span>
					</div>
					<p></p>

					<div class="form-group">
						<label for="picture">Product Photo</label>
						<div class='form-group'>
							<input type="file" name="picture" id="picture" class="form-control" 
								value="<?php echo $picture;?>">
						</div>
						
					</div>
					<p></p>
				
				<div class="row">
					<div class="col-md-3">
					<input type="hidden" name="productid" value="<?php echo $myproductId; ?>">
					<input type="reset" name="reset" class="btn btn-primary btn btn-sm
					" value="Reset"/>
					</div>
					<div class="col-md-3">
					 <input type="submit" name="submit" class="btn btn-success btn btn-sm
					" value="Update"/>
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
			
		



					
					<!-- <div class="form-group"> -->
					<!-- 	<div class="col-md-offset-6 col-md-6">
							<input type="hidden" name="productId" value="<//?php echo $productid; ?>">
							<button type="reset" class="btn btn-default">Clear</button>
							<input type="submit" name="submit" Value="Update" class="btn btn-success" />
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-3"></div>
			
		</div>
		
	</div>

<//?php include('innerfooter.php'); ?> -->
<?php include('innerheader.php'); ?>

	<!-- // function to validate, trim and htmlspecialchars inputs -->
	

	<?php
	function test_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);

		return $data;
	} 

	//use the method below for more than one form
			if(isset($_POST['submit']) && $_POST['submit']=='AddSection'){

			$title = test_input($_POST['title']);
			$body = test_input($_POST['body']);
			$image = test_input($_POST['image']);
			$subtitle = test_input($_POST['subtitle']);
			$subbody = test_input($_POST['subbody']);
			$page = test_input($_POST['pageid']);
			

			// validate title
			if(empty($title)){
				$err1 = "title field cannot be empty";
				 // var_dump($err1);
			}

			// validate body
			if(empty($body)){
				$err2 = "body field cannot be empty";
				 
			}

			// validate image
			if(empty($image)){
				$err3 = "image field cannot be empty";
				 
			}

			// validate subtitle
			if(empty($subtitle)){
				$err4 = "title field cannot be empty";
				
			}

			// validate subbody
			if(empty($subbody)){
				$err5 = "subbody field cannot be empty";
				
			}

			// validate subbody
			if(empty($page)){
				$err6 = "pageid field cannot be empty";
				
			}


		if($err1 == "" && $err2 == "" && $err3 == "" && $err4 == "" && $err5 == ""  && $err6 == ""){
				//check if global variable files has a value
	
			$sql = "INSERT INTO section(pageid, title, body, image, subtitle, subbody ) VALUES('$page','$title', '$body', '$image', '$subtitle', '$subbody')";

			

			if(!mysqli_query($con,$sql)){
				echo "Error description: ".mysqli_error($con);
			}else{

				$result = "The section was successfully added";
				 

				// echo $result;
			}
		


				}

				

			}

		?>

		<?php
  //get specific user data from users table based on the userid
$myuserId = $_GET['id'];
$query1 = "SELECT lastname, firstname, gender, roleId, userId FROM users WHERE userId='$myuserId'";

  //check if the sql query is okay
     if(!mysqli_query($con, $query1)){
        echo "Error: ". mysqli_error($con);

           } 
        
        $result1 = mysqli_query($con, $query1);
        $userinfo = mysqli_fetch_array($result1);

         // var_dump($userinfo);

?>

		<!--second row-->
		<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
					<p></p>
					<h4>Add Section</h4>
					<span><?php echo $result ?></span>
				<!--bootstrap form-->
				<!-- <form class="formcolor"> -->

					 <?php
                     //read and fetch pagename from pages table
                     $query = "SELECT * FROM pages";
                     $result2 = mysqli_query($con, $query);
                     
                     //check if the sql query is okay 
                     if(!mysqli_query($con, $query)){
                     	echo "Error: ". mysqli_error($con);
                     }
                     ?>  
                     
					<div class="form-group">
						<label for="pageid" class="control-label col-md-2" >Pages</label>
						<div class="col-md-8">
							<select name="pageid">
								<option value="">Select Page</option>
								<?php
                                 //display options for roles table using while(){
								while($row = mysqli_fetch_assoc($result2)){
								?>
								<option value="<?php echo $row['pageid']; ?>"

									<?php if($userinfo['pageid'] == $row['pageid']){
										echo "selected"; } ?>>
									<?php echo $row['pagename']; ?>
								</option>
								<?php
                                   }    
								?>
							</select>
							
						</div>
					</div>

					<div class="form-group">
						<label for="pagename">Title</label>
						<p></p>
						<input type="text" name="title" id="title" class="form-control" placeholder="enter the page name" value="<?php echo $_POST['title']; ?>">
						<span class="error"><?php echo $err1 ; ?></span>
					</div>
					<p></p>
					<div class="form-group">
						<label for="pagename">Body</label>
						<p></p>
						<textarea name="body" id="body" class="form-control" placeholder="enter the page name" value="<?php echo $_POST['body']; ?>">
						</textarea>
						<span class="error"><?php echo $err2 ; ?></span>
					</div>
					<p></p>
					<div class="form-group">
						<label for="image">Images</label>
						<p></p>
						<input type="file" name="image" id="image" class="form-control" value="<?php echo $_POST['image']; ?>"> 
						
						<span class="error"><?php echo $err3 ; ?></span>
					</div>
					<p></p>
					<div class="form-group">
						<label for="pagename">Sub title</label>
						<p></p>
						<input type="text" name="subtitle" id="subtext" class="form-control" placeholder="enter the subtitle name" value="<?php echo $_POST['subtitle']; ?>">
						<span class="error"><?php echo $err4 ; ?></span>
					</div>
					<p></p>
					<div class="form-group">
						<label for="pagename">Sub body</label>
						<p></p>
						<input type="text" name="subbody" id="subbody" class="form-control" placeholder="enter the subbody name" value="<?php echo $_POST['subbody']; ?>">
						<span class="error"><?php echo $err5 ; ?></span>
					</div>888
				
				<div class="row">
					<!-- <div class="col-md-3">
					<input type="reset" name="submit" class="btn btn-primary btn btn-sm
					" value="Reset"/>
					</div> -->
					<div class="col-md-3">
					 <input type="submit" name="submit" class="btn btn-success btn btn-sm
					" value="AddSection"/>
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
			
		

<?php include('innerheader.php'); ?>

	<!-- // function to validate, trim and htmlspecialchars inputs -->
	

	<?php
	function test_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);

		return $data;
	} 

	//use the method below for more than one form
			if(isset($_POST['submit']) && $_POST['submit']=='Add Page'){

			$pagename = test_input($_POST['pagename']);
			

			// validate productname
			if(empty($pagename)){
				$err1 = "pagename field cannot be empty";
				 // var_dump($err1);
			}


		if($err1 == ''){ 
				//check if global variable files has a value
	
			$sql = "INSERT INTO pages(pagename) VALUES('$pagename')";

			

			if(!mysqli_query($con,$sql)){
				echo "Error description: ".mysqli_error($con);
			}else{

				$result = "The page was successfully added";
				 

				// echo $result;
			}
		


				}

				

			}

		?>

		<!--second row-->
		<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
					<p></p>
					<h4>Add Pages</h4>
					<span><?php echo $result ?></span>
				<!--bootstrap form-->
				<!-- <form class="formcolor"> -->
					<div class="form-group">
						<label for="pagename">Page Name</label>
						<p></p>
						<input type="text" name="pagename" id="pagename" class="form-control" placeholder="enter the page name" value="<?php echo $_POST['pagename']; ?>">
						<span class="error"><?php echo $err1 ; ?></span>
					</div>
					<p></p>
					
				
				<div class="row">
					<!-- <div class="col-md-3">
					<input type="reset" name="submit" class="btn btn-primary btn btn-sm
					" value="Reset"/>
					</div> -->
					<div class="col-md-3">
					 <input type="submit" name="submit" class="btn btn-success btn btn-sm
					" value="Add Page"/>
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
					
		<?php include('footer.php');?>			
			
		

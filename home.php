<?php  

$title = "| view Users";
include ('innerheader.php'); ?>

	<div class= "container-fluid">

		<div class="row">

			<div class="col-md-2">

				<?php if(!empty($_SESSION['profilepics'])){ ?>

					<img src="uploads/<?php echo $_SESSION['profilepics']; ?> " alt="profilepics" style =" width:100px"/>

					<?php }else{ 
					
						?>

						<?php if($_SESSION['gend'] == 'Female'){ ?>
							<img src="images/female.png" alt="Female" style =" width:100px">
						<?php }else{ ?>
							<img src="images/male.png" alt="Male" style =" width:100px">
							<?php 
						} 
					}

				?> 
				<br>
				<!-- I might still cancel this cos we may not need a picture in this app -->
				<a href="uploadprofileimage.php">Upload Profile Image</a>
				<input type="file" name="profilepics" id="profilepics" value="Upload Profile Image">
			</div>

			<div class="col-md-6">

				<!-- profile info -->

				<h4>Profile info</h4>

				<table class="table table-bothered table-hover">

					<tr>
						<th>Last Name</th>
						<td> <?php echo $_SESSION['lname']; ?></td>
					</tr>
					<tr>
						<th>First Name</th>
						<td> <?php echo $_SESSION['fname']; ?></td>
					</tr>
					<tr>
						<th>Email Address</th>
						<td> <?php echo $_SESSION['emailadd']; ?></td>
					</tr>
					<tr>
						<th>Gender</th>
						<td> <?php echo $_SESSION['gend']; ?></td>
					</tr>
										
				</table>

			</div>

			<div class="col-md-2">

			</div>
		</div>

	</div>

<?php include('innerfooter.php');
?>
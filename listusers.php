<?php
$title ="|View Users";
 include('innerheader.php'); ?>

<div class="container-fluid">
	<!--display all users-->
	<div class="row">
		<div class="col-md-12">
			<h4 style="text-align: center;">Users details</h4>
			<?php 
			if(isset($_GET['success'])){ 
				echo "<div class='alert alert-success'>".$_GET['success']."</div>"; 
			} 
			?>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>S/No</th>
						<th>Lastname</th>
						<th>Firstname</th>
						<th>Username</th>
						<th>Gender</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
                       //read and fetch info from users table
					$query = "SELECT * FROM users";
					$result = mysqli_query($con, $query);


					if(!mysqli_query($con, $query)){
						echo "Error:". mysqli_error($con);
					}
					  //display the result in table row
					while($row = mysqli_fetch_assoc($result)){
						
					
    
					?>
					<tr>
						<td><?php echo $row['userId'] ?></td>
						<td><?php echo $row['lastname']?></td>
						<td><?php echo $row['firstname']?></td>
						<td><?php echo $row['username']?></td>
						<td><?php echo $row['gender']?></td>
						<td>
							<a href="edituser.php?id=<?php echo $row['userId']; ?>
							">Edit |</a>
							<a href="deleteuser.php?id=<?php echo $row['userId']; ?>
							">Delete</a>
						</td>
					</tr>	
					<?php } ?>				
				</tbody>
				<tfoot>
						<tr>
						<th>S/No</th>
						<th>Lastname</th>
						<th>Firstname</th>
						<th>Username</th>
						<th>Gender</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
			
		</div>
	</div>
</div>
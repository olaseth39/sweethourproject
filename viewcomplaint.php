<?php
$title ="|View Complaints";
 include('innerheader.php'); ?>

<div class="container-fluid">
	<h3 style="text-align: center">View complaints</h3>
	<!--display all users-->
	<div class="row">
		<div class="col-md-12">
			<?php 
			if(isset($_GET['success'])){ 
				echo "<div class='alert alert-success'>" .$_GET['success'] . "</div>"; 
			} 
			?>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>S/No</th>
						<th>Lastname</th>
						<th>Firstname</th>
						<th>Complaint Category</th>
						<th>Message</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
                       //read and fetch info from users table
					$query = "SELECT * FROM complaints";
					$result = mysqli_query($con, $query);


					if(!mysqli_query($con, $query)){
						echo "Error:". mysqli_error($con);
					}
					  //display the result in table row
					while($row = mysqli_fetch_assoc($result)){
						
					
    
					?>
					<tr>
						<td><?php echo $row['complaintId'] ?></td>
						<td><?php echo $row['complaintCategory']?></td>
						<td><?php echo $row['lastname']?></td>
						<td><?php echo $row['firstname']?></td>
						<td><?php echo $row['complaintMessage']?></td>
						<td><?php echo $row['complaintStatus']?></td>
						<td>
							
							<a href="deletecomplaint.php?id=<?php echo $row['productId']; ?>
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
						<th>Complaint Category</th>
						<th>Message</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
			
		</div>
	</div>
</div>
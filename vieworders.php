<?php
$title ="|View Orders";
 include('innerheader.php'); ?>

<div class="container-fluid">
	<!--display all users-->
	<div class="row">
		<div class="col-md-12">
			<h2 style="text-align: center;">Orders made</h2>
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
						<th>firstname</th>
						<th>Phone no.</th>
						<th>Address</th>
						<th>State</th>
						<th>City</th>
						<th>Nearest Busstop</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Total Amount &#8358;</th>

						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
                       //read and fetch info from users table
					$query = "SELECT * FROM ordereditems";
					$result = mysqli_query($con, $query);


					if(!mysqli_query($con, $query)){
						echo "Error:". mysqli_error($con);
					}
					  //display the result in table row
					
					while($row = mysqli_fetch_assoc($result)){
						
					
    
					?>
					<tr>
							
						<td><?php echo $row['orderedItemsId']?></td>
						<td><?php echo $row['lastname']?></td>
						<td><?php echo $row['firstname']?></td>
						<td><?php echo $row['phoneno']?></td>
						<td><?php echo $row['address']?></td>
						<td><?php echo $row['state']?></td>
						<td><?php echo $row['city']?></td>
						<td><?php echo $row['nearestbusstop']?></td>
						<td><?php echo $row['productName']?></td>
						<td><?php echo $row['quantity']?></td>
						<td><?php echo $row['totalamount']?></td>
						<td>
							<input type="checkbox" name="checkbox">
							<label>Delivered</label>
						</td>
						
					</tr>	
					<?php } ?>				
				</tbody>
				<tfoot>
						<th>S/No</th>
						<th>Lastname</th>
						<th>firstname</th>
						<th>Phone no.</th>
						<th>Address</th>
						<th>State</th>
						<th>City</th>
						<th>Nearest Busstop</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Total Amount &#8358;</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
			
		</div>
	</div>
</div>
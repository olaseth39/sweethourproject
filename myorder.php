<?php
$title ="|View Orders";
 include('innerheader.php'); ?>

<div class="container-fluid">
	<!--display all users-->
	<div class="row">
		<div class="col-md-12">
			<h2 style="text-align: center;">My Orders</h2>
			<?php 
			//This is not needed for now
			// if(isset($_GET['success'])){ 
			// 	echo "<div class='alert alert-success'>" .$_GET['success'] . "</div>"; 
			// } 
			?>
			<?php
				//read and fetch info from table
				$query = "SELECT * FROM sweethour.ordereditems 
				-- it is better to use id when filtering so I might change this next time
						WHERE firstname = '$_SESSION[fname]' AND lastname = '$_SESSION[lname]'";
				$result = mysqli_query($con, $query);
				if(!mysqli_query($con, $query)){
					echo "Error:". mysqli_error($con);
				};
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
					</tr>
				</thead>
			<?php	
				if(!empty($result)){								  
						//display the result in table row				
					while($row = mysqli_fetch_assoc($result)){    
			?>
				<tbody>
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
					</tr>											
				</tbody>
			<?php
				}
			?>
			<tfoot>
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
						
					</tr>
			</tfoot>
			<?php
				var_dump($result);
				if(empty($query)){
					echo "You have not made any order";
				}
			}
			?>
		</table>		
		</div>
	</div>
</div>
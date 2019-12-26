<?php
$title ="|View Products";
 include('innerheader.php'); ?>

<div class="container-fluid">
	<h3 style="text-align: center">Product details</h3>
	<!--display all products-->
	<div class="row">
		<div class="col-md-12">
			<?php 
			if(isset($_GET['success'])){ 
				//echo "<div class='alert alert-success'>" .$_GET['success'] . "</div>"; 
				$result = "<div class='alert alert-success alert-dismissible'>
								<span class='close' data-dismiss='alert' aria-label='close'>&times;</span>"
								.$_GET['success'].
						  "</div>";
				echo $result;
			} 
			?>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>S/No</th>
						<th>Productname</th>
						<th>Product description</th>
						<th>Picture</th>
						<th>Unitprice</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
                       //read and fetch info from users table
					$query = "SELECT * FROM product";
					$result = mysqli_query($con, $query);


					if(!mysqli_query($con, $query)){
						echo "Error:". mysqli_error($con);
					}
					  //display the result in table row
					while($row = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td><?php echo $row['productId'] ?></td>
						<td><?php echo $row['productName']?></td>
						<td><?php echo $row['productDescription']?></td>
						<td><?php echo $row['picture']?></td>
						<td><?php echo $row['unitPrice']?></td>			
						<td>
							<a href="editproduct.php?id=<?php echo $row['productId']; ?>
							">Edit |</a>
							<a href="deleteproduct.php?id=<?php echo $row['productId']; ?>
							">Delete</a>
						</td>
					</tr>	
					<?php } ?>				
				</tbody>
				<tfoot>
						<tr>
						<th>S/No</th>
						<th>Productname</th>
						<th>Product description</th>
						<th>Picture</th>
						<th>Unitprice</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
			
		</div>
	</div>
</div>
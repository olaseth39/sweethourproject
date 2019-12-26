<?php 
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order Online</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" initial-scale=1">
	<!-- Bootstrap.css -->
	<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.css">
	<!--  <link rel="stylesheet" type="text/css" href="design3.css"> -->
	 <link rel="stylesheet" type="text/css" href="design3part2.css">
	<!--  <script type="text/javascript" src="finalproject.js"></script> -->
	 <link rel="stylesheet" type="text/css" href="w3.css">
</head>
<body>
		<div class="container-fluid">
			<div class="row rowcolor">
				<div class="col-md-2 fontcolor1">
					Opening<br> Hours
				</div>
				<div class="col-md-2 ">
					7:00 - 8:00pm weekdays<br>8:00 - 6:00pm Saturday and Sundays
				</div>
				<div class="col-md-2 fontcolor1">
					Delivery<br>hours
				</div>
				<div class="col-md-2">
					8:00 - 6:00pm weekdays<br>9:00 - 5:00pm Satudays and Sundays
				</div>
				<div class="col-md-4 alignback">
					<a href="index.php">Home</a>
				</div>
			</div> <!-- first row ends -->
			<br>
			<div class="row">
				<div class="col-md-5">
					<img src="images/sweethourlogo.png" id="formatlogo">
				</div>
				<div class="col-md-1">
					<span class="givcolor"><a href="#snacks">Snacks</a></span>
				</div>
				<div class="col-md-1">
					<span class="givcolor"><a href="#trad">Trad</a></span>
				</div>
				<div class="col-md-1">
					<span class="givcolor"><a href="#salad">Salads</a></span>
				</div>
				<div class="col-md-1">
					<span class="givcolor"><a href="#meal">Meals</a></span>
				</div>
				<div class="col-md-2">
					<span class="givcolor"><a href="#chicken">Chicken,Fish,Beef & Snail</a></span>
				</div>
				<div class="col-md-1">
					<span class="givcolor"><a href="#drink">Drinks</a></span>
				</div>
			</div><!--  2nd row ends -->
			<br>
			<div class="row">
				<div class="col-md-12" style="color: yellow">
					Please Note that any Item(s) ordered, would be delivered within 24 hours of delivery hours.
				</div>
			</div>
			<div class="row givmargin">
				<div class="col-md-0">
				</div>
				<div class="col-md-8 w3-display-container w3-text-white">
					<!-- <img src="images/shawama.png"  class="mySlides">
					<div class="w3-display-middle w3-large">
						<h1 class="orderfont">Shawama</h1>
					</div> -->
					<img src="images/shaki.png"  class="mySlides">
					<div class="w3-display-middle w3-large">
						<h1 class="orderfont">Yummy</h1>
					</div>
					<div class="col-md-12 snacksbgcolor">
						<span class="givpad" id="snacks">Snacks</span>
					</div>
				</div>
				<div class="col-md-3 givmarginleft">
					<div id="givcolor">Your Order&nbsp;&nbsp;<span id="alignback7">0</span>&nbsp;Selected<br></div>
					<p id="givbgcolor">Your order is empty.<br>Select from the menu box to get started</p>
				</div>
			</div> <!-- 3rd row ends -->
				
				<!-- forth row starts -->

		<div class="row givmargin">

		<?php
			$sql = "SELECT * FROM product WHERE productcategoryId = 1 LIMIT 9";
			//var_dump($sql);
			if(!mysqli_query($con,$sql)){
				echo "Error: ". mysqli_error($con); 
			}
				$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_all($result, MYSQLI_BOTH);
				$numcol = 3;
				$bootstrapcolwidth = 9/$numcol;
				// The array_chunk function splits the array into the number of chunks we have given
				$arraychunk = array_chunk($row,$numcol);
				//iterate through each chunk
				foreach($arraychunk as $products){
		?>

		<div class="row"> 
			<?php
			//iterate through each product in each chunk
			foreach($products as $product){
			?>
			<div class="col-md-<?php echo $bootstrapcolwidth; ?> img-responsive">
				<img src="images/<?php echo $product['picture']?>"  class="orderimage givmarginbetweenimage" style="margin:20px">
				<h4 style="margin:20px"><?php echo $product['productName']?> </h4><b>&#8358;
				<i><?php echo $product['unitPrice']?></i></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- <button class="btn btn-danger"><a href="<?php //echo $product['href'] ?>">Add to Cart</a></button> -->
				<button class="btn btn-primary"><a href="addtocart.php?id=<?php echo $product['productId'] ;?>">Add</a></button>
			</div>

		<?php } ?>

		</div>	<!--fifth row ends -->
	<?php } ?>

	</div>
				<br><br><br>

				<!-- 8th row -->
				<div class="row givmargin">
					<div class="col-md-8 snacksbgcolor">
						<span class="givpad" id="trad">Trad</span>
					</div>
					<div class="col-md-3">
						<span></span>
					</div>
				</div> <!-- closing row --> 

				<br><br>
				<!-- 9th row -->

		<div class="row givmargin">
<?php

	$sql = "SELECT * FROM product WHERE productcategoryId = 2 LIMIT 9";

		//var_dump($sql);
		if(!mysqli_query($con,$sql)){

			echo "Error: ". mysqli_error($con); 
		}

			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_all($result, MYSQLI_BOTH);
		$numcol = 3;
		$bootstrapcolwidth = 9/$numcol;

		$arraychunk = array_chunk($row,$numcol);

		foreach($arraychunk as $products){
?>

		<div class="row"> 
			<?php
			foreach($products as $product){
			?>
			<div class="col-md-<?php echo $bootstrapcolwidth; ?> img-responsive">
				<img src="images/<?php echo $product['picture']?>"  class="orderimage givmarginbetweenimage" style="margin:20px">
				<h4 style="margin:20px"><?php echo $product['productName']?> </h4><b>&#8358;
				<i><?php echo $product['unitPrice']?></i></b>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button class="btn btn-primary"><a href="addtocart.php?id=<?php echo $product['productId'] ;?>">Add</a></button>
			</div>
			<?php } ?>

		</div>	<!--fifth row ends -->
	<?php
		}
	?>

</div>				
				
		<br><br><br>
		<!-- 12th row -->
		<div class="row givmargin">
			<div class="col-md-8 snacksbgcolor">
				<span class="givpad" id="meal">Meals</span>
			</div>
			<div class="col-md-3">
				<span></span>
			</div>
		</div> <!-- closing row -->

		<br><br>
				<!-- 13th row -->

		<div class="row givmargin">

			<?php
				$sql = "SELECT * FROM product WHERE productcategoryId = 3";
		//var_dump($sql);
				if(!mysqli_query($con,$sql)){

					echo "Error: ". mysqli_error($con); 
				}

					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_all($result, MYSQLI_BOTH);
				$numcol = 3;
				$bootstrapcolwidth = 9/$numcol;

				$arraychunk = array_chunk($row,$numcol);

				foreach($arraychunk as $products){
			?>

		<div class="row"> 
			<?php
			foreach($products as $product){
			?>
			<div class="col-md-<?php echo $bootstrapcolwidth; ?> img-responsive">
				<img src="images/<?php echo $product['picture']?>"  class="orderimage givmarginbetweenimage" style="margin:20px">
				<h4 style="margin:20px"><?php echo $product['productName']?> </h4><b>&#8358;
				<i><?php echo $product['unitPrice']?></i></b>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button class="btn btn-primary"><a href="addtocart.php?id=<?php echo $product['productId'] ;?>">Add</a></button>
			</div>
			<?php } ?>
		
		</div>	<!--fifth row ends -->
			<?php
				}
			?>
		</div>
			<br><br><br>
			<div class="row givmargin">
				<div class="col-md-8 snacksbgcolor">
					<span class="givpad" id="salad">Salads</span>
				</div>
				<div class="col-md-3">
					<span></span>
				</div>
			</div> <!-- closing row -->
			<br><br>
		<div class="row givmargin">

<?php

	$sql = "SELECT * FROM product WHERE productcategoryId = 6 LIMIT 9";

		//var_dump($sql);
		if(!mysqli_query($con,$sql)){

			echo "Error: ". mysqli_error($con); 
		}

			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_all($result, MYSQLI_BOTH);
		$numcol = 3;
		$bootstrapcolwidth = 9/$numcol;

		$arraychunk = array_chunk($row,$numcol);

		foreach($arraychunk as $products){
?>

		<div class="row"> 
			<?php
			foreach($products as $product){
			?>
			<div class="col-md-<?php echo $bootstrapcolwidth; ?> img-responsive">
				<img src="images/<?php echo $product['picture']?>"  class="orderimage givmarginbetweenimage" style="margin:20px">
				<h4 style="margin:20px"><?php echo $product['productName']?> </h4><b>&#8358;
				<i><?php echo $product['unitPrice']?></i></b>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button class="btn btn-primary"><a href="addtocart.php?id=<?php echo $product['productId'] ;?>">Add</a></button>
			</div>
			<?php } ?>
			
		</div>	<!--fifth row ends -->
	<?php
			}
		?>

		</div>
				<br><br><br>
				<!-- 14thth row -->
				<div class="row givmargin">
					<div class="col-md-8 snacksbgcolor">
						<span class="givpad" id="chicken">Chicken,Fish,Beef & Snail</span>
					</div>
					<div class="col-md-3">
						<span></span>
					</div>
				</div> <!-- closing row -->

				<br><br>
				<!-- 15thth row -->

			<div class="row givmargin">  

		<?php

			$sql = "SELECT * FROM product WHERE productcategoryId = 4 LIMIT 9";

			//var_dump($sql);
			if(!mysqli_query($con,$sql)){

				echo "Error: ". mysqli_error($con); 
			}

				$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_all($result, MYSQLI_BOTH);
			$numcol = 3;
			$bootstrapcolwidth = 9/$numcol;

			$arraychunk = array_chunk($row,$numcol);

			foreach($arraychunk as $products){
?>

		<div class="row"> 
			<?php
			foreach($products as $product){
			?>
			<div class="col-md-<?php echo $bootstrapcolwidth; ?> img-responsive">
				<img src="images/<?php echo $product['picture']?>"  class="orderimage givmarginbetweenimage" style="margin:20px">
				<h4 style="margin:20px"><?php echo $product['productName']?> </h4><b>&#8358;
				<i><?php echo $product['unitPrice']?></i></b>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button class="btn btn-primary"><a href="addtocart.php?id=<?php echo $product['productId'] ;?>">Add</a></button>
			</div>
			<?php } ?>
	
		</div>	<!--fifth row ends -->
	<?php

	}
?>
		</div>	
				<br><br><br>
				<!-- 16th row -->
				<div class="row givmargin">
					<div class="col-md-8 snacksbgcolor">
						<span class="givpad " id="drink">Drinks</span>
					</div>
					<div class="col-md-3">
						<span></span>
					</div>
				</div> <!-- closing row -->
				<br><br>
				<div class="row givmargin">
	
	<?php
		$sql = "SELECT * FROM product WHERE productcategoryId = 5 LIMIT 9";
			//var_dump($sql);
			if(!mysqli_query($con,$sql)){
				echo "Error: ". mysqli_error($con); 
			}
				$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_all($result, MYSQLI_BOTH);
			$numcol = 3;
			$bootstrapcolwidth = 9/$numcol;

			$arraychunk = array_chunk($row,$numcol);

			foreach($arraychunk as $products){
	?>

		<div class="row">

			<?php
				foreach($products as $product){
			?>

			<div class="col-md-<?php echo $bootstrapcolwidth; ?> img-responsive">
				<img src="images/<?php echo $product['picture']?>"  class="orderimage givmarginbetweenimage" style="margin:20px">
				<h4 style="margin:20px"><?php echo $product['productName']?> </h4><b>&#8358;
				<i><?php echo $product['unitPrice']?></i></b>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button class="btn btn-primary"><a href="addtocart.php?id=<?php echo $product['productId'] ;?>">Add</a></button>
			</div>

			<?php } ?>
	
		</div>	<!--fifth row ends -->
	<?php
		}
	?>
					
		</div> <!-- closing row -->

				<br><br>
		</div> <!-- for the closing container -->
<?php include('footer.php');?>	

		
		




	
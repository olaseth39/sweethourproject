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

	 <style type="text/css">
	 	.error{
	 		color: red;
	 		font-size: 11px;
	 	}
	 </style>


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

			<div class="row">
			<br>
				<div class="col-md-7">
					<img src="images/sweethourlogo.png" id="formatlogo">
			       <div class="col-md-12" style="background-color: yellow;line-height:35px">
                       Please Note that any Item(s) ordered, would be delivered within 24 hours of delivery hours.
                   </div>
				</div>
				<div class="col-md-2">							
				</div>
				<div class="col-md-3 givmarginleftremove">
                   <div id="givcolor">Your Order&nbsp;&nbsp;<span id="alignback7">0</span>&nbsp;Selected<br></div>
                   <p id="givbgcolor">Your order is empty.<br>Select from the menu box to get started</p>
                </div>
            </div> <!-- 3rd row ends -->
        </div>
				<!-- <div class="col-md-1">
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
				</div> -->
			</div>

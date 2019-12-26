<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SweetHour Restaurant</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" initial-scale=1">
	<!-- Bootstrap.css -->
	<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="design3.css">
	<link rel="stylesheet" type="text/css" href="design3part2.css">
	 <link rel="stylesheet" type="text/css" href="w3.css">
	 <style type="text/css">
	 	.bgcolo{
				background-color: rgba(0,255,0,0.5);
				height:90px;
				width: 100%;				
				/*position: fixed;*/
				padding-top: 10px;
				margin: 10px;
				/*top:0;*/
				/*width:100%;*/
	}
		li a{
		 	text-decoration: none;
 	}
	 </style>
</head>
<body>
	<div class="container-fluid img-responsive">
	<!--First Row Starts --> 
		<div class="row bgcolo">
			<div class="col-md-12">
				<ul>
				<li style='margin: 17px;border-right: 15px'><a href="index.php" class="round " style="text-decoration: none;font-size: 15px; ">HOME</a></li>
				<li style='margin: 17px'><a href="aboutus.php" class="round" style="text-decoration: none;font-size: 15px; ">ABOUT US</a></li>
				<li style='margin: 17px'><a href="contact.php" class="round" style="text-decoration: none;font-size: 15px;  margin: 1px">CONTACT</a></li>
				<li style='margin: 17px'><a href="outdoorcatering.php" class="round" style="text-decoration: none;font-size: 15px;  margin: 1px">OUTDOOR CATERING</a></li>
				<!-- Note when checking the second time take the complaint button to the innerheader -->
				<li style='margin: 17px'><a href="login.php" class="round" style="text-decoration: none;font-size: 15px; margin: 10px">COMPLAINT</a></li>
				<li style='margin:150px'><a href="login.php" style="text-decoration: none;font-size: 15px"><span class="glyphicon glyphicon-log-in"></span>LogIn</a></li>
				</ul>
			</div>
		</div> <!--ending of first row -->
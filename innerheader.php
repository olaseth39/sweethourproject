<?php 
session_start();
include('config.php');

 // check if session not check to give access to backend functionality.
 // otherwise, redirect the user to home page or login page.

  // var_dump($_SESSION);
  // die;
 if (!isset($_SESSION['giveway'])){
      header("Location: http://localhost/sweethour/login.php"); 
 }
  include('privileges.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title> Sweet Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="sweethour.css">
    <!-- <link rel="stylesheet" href="w3.css"> -->
  <style>
  	
  	li{
  		display:inline;
  		padding:10px;
  		background-color:rgba(255,255,255,0.5);
  		color:white;
  	}

   li:hover{
   	 background-color:red;
   	 color:white;
   }

   a:hover{
     color:white;
     text-decoration:none;
   }
   ul{
    margin: 15px;
   }

  </style>
</head>
<body>

  <div class="container-fluid">
      
     <div class="row">
      <div class="col-md-12">

      <h1 style="display: inline;">Sweet Users</h1><!-- </div> -->
      <input type="text" name="search" class="search" id="search" placeholder="search user" style="padding:5px; width: 250px;">
      <div id="searchresult" style="display:none;position: absolute; top: 38px; left: 257px; border: 1px solid #333; z-index: 30; width:250px; background-color: white">
          display result
      </div>
      <span class="text-info">Welcome! <?php echo $_SESSION['fname']. " " .$_SESSION['lname']; ?> &nbsp;  
          You logged in as <?php echo $_SESSION['rolename']; ?>  </span>
    </div>
    <div class="row" style="background-color: orange">
      <div class="col-md-12">
        <ul>
            <li><a href="home.php">Dashboard</a></li>
            <?php
            // var_dump($userpriv);
                foreach ($userpriv as $key => $value){
                  //print only the items for menu
                  if($value[2] == 1){
                  ?>
                  <li>
                      <a href="<?php echo $value[1]; ?>">
                        <?php echo $value[0] ?>
                      </a>
                    </li>
            <?php
                }     
              }
            ?>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
      <!--!display who log in-->
      <div class="row">
        <div class="col-md-4">
          <!--!profile pics--->
        </div>
        <div class="col-md-8">
          <!--profile information-->
        </div>
      </div>
      <span>
         Today's Date is <?php date_default_timezone_set('Africa/Lagos');echo date('dS : h:i:s a'); ?>
      </span>
  </div>
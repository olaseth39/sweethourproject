<?php

$con = mysqli_connect("localhost", "root", "", "sweethour" );

// check connection
	if(mysqli_connect_errno()){

		echo "Failed to connect to MySQL ". mysqli_connect_error();
	}
		error_reporting(0);//to turn off all errors
	// ini_set('error_reporting', E_ALL); //to see all errors

	// ini_set('error_reporting()', 0); //to see all errors
	// close connection to database
	//mysqli_close($con)
?>
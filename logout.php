<?php

session_start();
session_destroy(); //destroy all session variables

//redirect to index.php to login page

header("location: http://localhost/dashboard/sweethour/login.php");





?>
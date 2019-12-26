<?php

//create array variables for privileges/menu

switch ($_SESSION['roleid']){

	case 1:
	//super administrator
	$userpriv = array(
		array("View Profile","editprofile.php","0"), // 1 means showin menu
		array("View transaction","transaction.php","0"),
		array("View Users","listusers.php","1"),
		array("Edit Product","editproduct.php","0"),//0 not in menu
		array("View order","vieworders.php","1"),
		array("View Product", "viewproduct.php", "1"),
		array("View Complaint", "viewcomplaint.php", "1"),
	    array("Delete Product", "deleteproduct.php", "0"), 
		array("Add Product","product.php","1"),
		array("Add Productcategory","productcategory.php","1"),		
	);

	break;

	case 2:

	//moderator
	$userpriv = array(
		array("View Profile","viewprofile.php","1"), // 1 means showin menu
		array("View transaction","transaction.php","1"),
		array("View Users","listusers.php","0"),
		array("View complaint","complaint.php","1"),//0 not in menu
		array("View order","vieworders.php","1"),
		array("View Product", "product.php", "0"),
	    array("Delete Product", "deleteproduct.php", "0"), 
	    array("Add Product", "addproduct.php", "0"),
	     array("Add Section", "section.php", "1"),
	);

	break;

	default:
	// customer
	$userpriv = array(
		array("View Profile","home.php","1"), // 1 means showin menu
		array("View transaction","transaction.php","0"),
		array("View Users","listusers.php","0"),
		array("My complaint","complaint.php","1"),//0 not in menu
		array("View order","myorder.php","1"),
		array("View Product", "product.php", "0"),
	    array("Delete Product", "deleteproduct.php", "0"), 
		array("Add to cart","orderonline.php","1"),
		 array("Book order", "ordereditems.php", "1"),
		
	);

	break;
};

	// var_dump($userpriv);

?>















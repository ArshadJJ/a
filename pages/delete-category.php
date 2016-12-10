<?php
include "../functions/db.php";
	if(isset($_GET['categoryID'])){
		$categoryID = $_GET['categoryID'];
	}
	if(empty($categoryID)){
		header("location:index.php");
	}

	$run = mysqli_query($con,"DELETE FROM tblcategories WHERE categoryID = '$categoryID'")
	or die(mysqli_error());  	

	header("Location:category.php");
	
?>
<?php
include "../functions/db.php";
	if(isset($_GET['userID'])){
		$id = $_GET['userID'];
	}
	if(empty($id)){
		header("location:index.php");
	}

	$run = mysqli_query($con,"DELETE FROM tbluser WHERE userID = '$id'")
	or die(mysqli_error());  	

	header("Location:user.php");
	
?>
<?php
include "functions.php";
$action = $_POST['action'];
switch($action)
{
	case "deleteuser":
	$userID= $_POST['userID'];
	deleteuser($userID);
	echo "success";
	break;
}
?>
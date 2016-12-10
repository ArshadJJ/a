<?php
//session_start();
include ('../functions/db.php');

if(isset($_POST['searchid'])){
 $searchid = $_POST['searchid'];


$sql = "SELECT * FROM tbluser WHERE userID='$searchid'";
$result1 = mysqli_query($conn, $sql);
$num_rows1=mysqli_num_rows($result1);
}else{
	$searchid=NULL;
	$num_rows1=0;
}

?>
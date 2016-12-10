<?php
include "../functions/db.php";

extract($_POST);

$userID=$_POST['staffno'];
$username=$_POST['username'];
$usergender=$_POST['usergender'];
$usernoic=$_POST['usernoic'];
$staffno=$_POST['staffno'];
$position=$_POST['position'];
$faculty=$_POST['faculty'];
$address=$_POST['address'];
$useremail=$_POST['useremail'];
$userHousetelno=$_POST['userHousetelno'];
$userOfficeno=$_POST['userOfficeno'];
$userhandphoneno=$_POST['userhandphoneno'];
$password=$_POST['password'];
$roleid=$_POST['roleid'];

$sql = "INSERT INTO `tbluser`(`userID`,`userName`, `userGender`, `usericNo` , `userstaffNo` , `userpositionorGrade` , `userFaculty` , `userAddress` , `userEmail`, `userhousetelNo` , `userofficetelNo` , `userhandphoneNo`, `userPassword`, `roleID`) VALUES ('$staffno','$username','$usergender', '$usernoic' , '$staffno' , '$position' , '$faculty' , '$address' ,'$useremail', '$userHousetelno' , '$userOfficeno','$userhandphoneno','$password','$roleid')";

$result = mysqli_query($con,$sql);

if($result==true)
{
	echo '<script language="javascript">';
	echo 'alert("Successfully Registered")';
	echo '</script>';
	echo '<meta http-equiv="refresh" content="0;url=../pages/registernewuser.php" />';
	//echo '<meta http-equiv="refresh" content="0;url=../index.php" />';
}

?>
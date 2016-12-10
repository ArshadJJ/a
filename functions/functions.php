<?php

function dbclose(){
	include ('db.php');  
	mysqli_close($con);
}

function deleteuser($userID){
	include ('db.php');  
	$sel = mysqli_query($con,"DELETE from tbluser where userID='$userID'");
}

function category(){
	include ('db.php');  
	$sel = mysqli_query($con,"SELECT * from tblcategories");

	if($sel==true){
		while($row=mysqli_fetch_assoc($sel)){
			extract($row);
			echo '<option value='.$categoryID.'>'.$categoryName.'</option>';
		}
	}
	dbclose();
}

// function userprofile()
// {
// 	$query="SELECT * FROM  tbluser WHERE userID = '$userID'";
//              $result=mysqli_query($conn,$query);
//              $num_rows=mysqli_num_rows($result);
//                 if($num_rows>0)
//                 {
//                   while($row = mysqli_fetch_assoc($result)) 
//               }
//           dbclose();
// }

?>
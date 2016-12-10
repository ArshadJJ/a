<?php
include "../functions/db.php";
 				
extract($_POST);

$sql = "INSERT INTO `tblcategories`(`categoryName`, `categoryDescription`) VALUES ('$categoryName','$categoryDescription')";

//INSERT INTO `tblcategories`(`categoryID`, `categoryName`, `categoryDescription`) VALUES ([value-1],[value-2],[value-3])

//$sql = "INSERT INTO `table name`(column name) VALUES ('id from php')";

//$sql = "INSERT INTO `category`(category) VALUES ('$category')";

$res = mysqli_query($con,$sql);

header("Location:category.php");


?>
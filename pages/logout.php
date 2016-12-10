<?php
session_start();
if(isset($_SESSION['userName'])){
session_destroy();
header("Location:../index.php");}
?>
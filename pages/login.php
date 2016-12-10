<?php
    session_start();
    
    include '../functions/db.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    //$password = md5($password);

   
    $username = mysqli_real_escape_string($con,$username);
    $password = mysqli_real_escape_string($con,$password);

    $query = "SELECT * FROM tbluser WHERE userID = '$username' AND userPassword = '$password'";
    $result = mysqli_query($con,$query) or die ("Verification error");
    $array = mysqli_fetch_array($result);
    
    if ($array['userID'] == $username){
         $_SESSION['userName'] = $array['userName'];
         $_SESSION['userID'] = $array['userID'];
        header("Location: home.php");
    }
    
    else{
        echo '<script language="javascript">';
        echo 'alert("Incorrect username or password")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=../index.php" />';
    }

?>
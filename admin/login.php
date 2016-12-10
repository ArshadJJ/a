<?php
    session_start();
	
	include '../functions/db.php';

	$username = $_POST['username'];
    $password = $_POST['password'];
	//$password = md5($password);

	$username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);

    // $options = [
    //     'cost' => 11,
    //     'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    // ];

    // $hash = password_hash($password,PASSWORD_BCRYPT,$options);
    // echo $hash;
    // die();
    $query = "SELECT * FROM tbluser WHERE userName = '$username' AND userPassword = '$password'";
    $result = mysql_query($query) or die ("Verification error");
    $array = mysql_fetch_array($result);
    
    if ($array['userName'] == $username){
        $_SESSION['userName'] = $username;
        header("Location: home.php");
    }
    
    else{
    	echo '<script language="javascript">';
        echo 'alert("Incorrect username or password")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=index.php" />';
    }


?>

<?php
date_default_timezone_set("Asia/Kuala_Lumpur"); 
include "db.php";

$target_dir = "picture/";
$name =  $_FILES["fileToUpload"]["name"];
$location="picture/".$name;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, the file have already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, the file size is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "png" ) 
{
    echo "Sorry, only JPG, JPEG, GIF & PNG files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
}
// if everything is ok, try to upload file
    else 
    {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
        {
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $query="INSERT into `thread`(`user_id`,`location`) values ('B031410004','$location')";
                 $result=mysqli_query($conn,$query);
                //$num_rows=mysqli_num_rows($result);
                echo "<script language='javascript'>alert('Post already send to admin');</script>
                      <script language='javascript'>window.location.href='mainpage.php'</script>";
        }
        else 
        {
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>
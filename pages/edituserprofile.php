<?php
  session_start();
  if (isset($_SESSION['userName'])&&$_SESSION['userName']!=""){
  }
  else
  {
    header("Location:../index.php");
  }
include "../functions/db.php";
 $username=$_SESSION['userName'];
 $userid = $_SESSION['userID'];

$sel = mysqli_query($con,"SELECT * from tbluser where userID='$userid'");
$row=mysqli_fetch_assoc($sel);
extract($row);
?>
<html>
<head>
	<title></title>

	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="home.php"></a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php">UTeMASA FORUM</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="home.php"> Dashboard</a></li>
                    <!-- <li><a href="content.php"> Content Post </a></li> -->
                    <li><a href="user.php"> User List</a></li>
                    <li class="active"><a href="userprofile.php"> User Profile</a></li>
                    <li><a href="registernewuser.php"> Register New User</a></li>
                    <!-- <li><a href="category.php"> Category</a></li> -->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" ><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a></li>
                    <li ><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


     <div class="container" style="margin:8% auto;width:900px;">
           
           <h2>Update Profiling</h2>

           <hr>
         <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit </h3>

                </div> 
                 <div class="panel-body">
                   <form method="POST" action="add-topic-function.php">

                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="username" id= "username" placeholder="User Name" value="<?php echo $userName;?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="usergender" id="usergender" required>
                                <option value="<?php echo $userGender;?>"><?php echo $userGender;?></option>
                                <?php
                                if($userGender!="Male")
                                    {
                                echo"<option value='Male'>Male</option>";
                                    }
                                if($userGender!="Female")
                                    {
                                echo"<option value='Female'>Female</option>";
                                    }?>
                            </select>
                        <div class="form-group">
                            <label>User ICNO</label>
                            <input type="text" name="usernoic" id= "usernoic" placeholder="User ICNO" value="<?php echo $usericNo;?>"  class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Staff No</label>
                            <input type="text" name="staffno" id= "staffno" placeholder= "STAFF NO" disabled value="<?php echo $userstaffNo;?>" class = "form-control" required>
                        </div>
                        <div class="form-group">
                            <label>User Position</label>
                            <input type="text" name="position" id= "position" placeholder= "POSITION/GRED" value="<?php echo $userpositionorGrade;?>" class= "form-control" required>
                        </div>
                        <div class="form-group">
                            <label>User Faculty</label>
                            <input type="text" name="faculty" id= "faculty" placeholder= "OFFICE/FACULTY" value="<?php echo $userFaculty;?>" class= "form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea type="text" name="address" id= "address" placeholder= "ADDRESS" class= "form-control" required><?php echo $userAddress;?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" name="useremail" id="useremail" placeholder="User Email" value="<?php echo $userEmail;?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>House Tel No</label>
                            <input type="text" name="userHousetelno" id="userHousetelno" placeholder="Telephone No" value="<?php echo $userhousetelNo;?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Office Tel No</label>
                            <input type="text" name="userOfficeno" id="userOfficeno" placeholder="Office No" value="<?php echo $userofficetelNo;?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Handphone No</label>
                            <input type="text" name="userhandphoneno" id="userhandphoneno" placeholder="Hand Phone No" value="<?php echo $userhandphoneNo;?>" class="form-control" required>
                        </div>                 
                        <button type="update" name="btnuserprofile" id="btnuserprofile" class="btn btn-success"><span class="fa fa-envelope" aria-hidden="true"></span> Update</button> 
                        <button type="reset" name="btnreset" id="btnreset" class="btn btn-warning"><span class="fa fa-trash-o" aria-hidden="true"></span> Reset</button>
                   </form>
                </div>
    </div>


    <div class="container" style="margin:8% auto;width:900px;">
           
           <h2>Update Users Profiling</h2>

           <hr>
         <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Users Profile</h3>

                </div> 
                 <div class="panel-body">
                  <?php
                  include "../functions/db.php";
                 if(isset($_GET['userID'])){
                 $id = $_GET['userID'];
                   }
                  if(empty($id)){
                    header("location:post.php");
                     }
                                      
                  $sql = "SELECT * FROM tblpost as tp join category as c on tp.cat_id=c.cat_id WHERE tp.post_Id='$id'";
                            $run = mysql_query($sql);

                            while($row=mysql_fetch_array($run))
                            {
                                $id = $row['userID'];
                       
                                $title = $row['title'];
                               $content = $row['content'];
                                $category= $row['category'];
                               $datetime =$row['datetime'];
                 
                            }
                             extract($_POST);
                               date_default_timezone_set("Asia/Taipei");
                             $datetime=date("Y-m-d h:i:sa");

                             if(isset($edit))
                             {
                                $sql = "UPDATE `tblpost` SET `title`='$title',`content`='$content',`category`='$category',`datetime`='$datetime' WHERE `post_Id`='$id'";
                               $run = mysql_query($sql);
                             
                            if($run==true)
                            {
                                     echo '<script language="javascript">';
                                      echo 'alert("Updated")';
                                      echo '</script>';
                                      echo '<meta http-equiv="refresh" content="0;url=post.php" />';
                            }
                          }
                            ?>

                            <form method="POST">
              
                        <input type="text" name="title" class="form-control" value="<?php echo $title;?>"><br>
                        <textarea name="content"class="form-control">
                          <?php echo $content;?>
                        </textarea><br>
                        <select name="category" class="form-control">
                            <option><?php echo $category;?></option>
                            <option value="Programming">Programming</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="Computer Networking">Computer Networking</option>
                        </select><br>
                        <input type="text" class="form-control" value="<?php echo $datetime;?>"><br>
                        <input type="submit" name="edit" class="btn btn-success pull-right" value="Update">
                        
                   </form>

                </div>
    </div>





</body>
</html>
<?php
  session_start();
  if (isset($_SESSION['userName'])&&$_SESSION['userName']!=""){
  }
  else
  {
    header("Location:../index.php");
  }
$username=$_SESSION['userName'];
// $userid = $_SESSION['userID'];

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
                <!-- <a class="navbar-brand" href="home.php">Administrator</a> -->
                <a class="navbar-brand" href="home.php">UTeMASA FORUM</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="home.php"> Dashboard</a></li>
                    <li><a href="content.php"> Content Post </a></li>
                    <li><a href="user.php"> User Profile</a></li>
                    <li class="active"><a href="category.php"> Category</a></li>
                </ul>
                </ul>
              <ul class="nav navbar-nav navbar-right">
                    <li><a href="userprofile.php" ><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a></li>
                <li ><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
               
        </ul>

                
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
     <div class="container" style="margin:8% auto;width:900px;">
           
           <h2>Category</h2>

           <hr>
         <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Category</h3>

                </div> 
                 <div class="panel-body">
                   <form method="POST">
                   
                        <label>Category</label>
                        <?php include "../functions/db.php";
                        $categoryID = $_GET['categoryID'];
                        $sel = mysqli_query($con,"SELECT * from tblcategories where categoryID='$categoryID' ");
                        //SELECT * FROM `tblcategories` WHERE 1
                        //SELECT `categoryID`, `categoryName`, `categoryDescription` FROM `tblcategories` WHERE 1
                        while($row=mysqli_fetch_assoc($sel)){
                          extract($row);
                         echo  '<input type="text" class="form-control" name="categoryName" required style="width:50%" value='.$categoryName.'>';
                         echo  "<input type='text' class='form-control' name='categoryDescription' required style='width:50%' value='$categoryDescription'>";
                         
                        }

                        

                        ?>
                        
        
                        <input type="submit" name="submit"class="btn btn-success pull-right" value="Edit">
                   </form>
                </div>
    </div>


    <?php 
    if(isset($_POST['submit'])){
      $categoryName = $_POST['categoryName'];
      $categoryDescription = $_POST['categoryDescription'];
      $categoryID = $_GET['categoryID'];
      $update = mysqli_query($con,"UPDATE tblcategories set categoryName='$categoryName',categoryDescription='$categoryDescription' where categoryID='$categoryID' ");
      header("Location:category.php");
    }




    ?>
	</body>
</htmls
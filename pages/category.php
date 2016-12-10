<?php

  session_start();
  if (isset($_SESSION['userName'])&&$_SESSION['userName']!=""){
  }
  else
  {
    header("Location:../index.php");
  }
$username=$_SESSION['userName'];
//$userid = $_SESSION['userID'];

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
                    <li><a href="user.php">Manage User</a></li>
                    <li class="active"><a href="category.php"> Category</a></li>
                </ul>
            	
                <!-- <ul class="nav navbar-nav navbar-left">
                   <li><a href="home.php"> Dashboard</a></li>
                    <li><a href="post.php"> Topics</a></li>
                    <li><a href="user.php"> Users</a></li>
                    <li class="active"><a href="category.php">Category</a></li> -->


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
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Category</h3>
                </div> 
                 <div class="panel-body">
                     <a href="add-category.php" class="pull-right btn btn-success">Add New</a><br><br>
            <table class="table table-stripped">
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Actions</th>
                            <?php
                            
                            include "../functions/db.php";

                            $sql = "SELECT * from tblcategories";
                            $run = mysqli_query($con,$sql);

                            while($row=mysqli_fetch_array($run))
                            {
                                extract($row);
                                echo "<tr>";
                                echo "<td>".$categoryName."</td>";
                                echo "<td>".$categoryDescription."</td>";
                                echo '<td><a href="edit-category.php?categoryID='.$categoryID.'"><button class="btn btn-default">Edit</button> <a href="delete-category.php?categoryID='.$categoryID.'"><button class="btn btn-danger">Delete</button></a></td>';
                                // echo '<td>
                                //         <a href="edit-category.php?categoryID='.$categoryID.'">
                                //         <button class="btn btn-default">Edit</button> 
                                //         <a href="delete-category.php?categoryID='.$categoryID.'">
                                //         <button class="btn btn-danger">Delete</button></a>
                                //         </td>';
                                echo "</tr>";
                            }
                           

                            ?>
                            </table>
                     </div>
                </div>

            </div>
            <script type="text/javascript">

           

            </script>
	</body>
</html>
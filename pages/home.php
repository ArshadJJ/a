<?php
  session_start();
  if (isset($_SESSION['userName'])&&$_SESSION['userName']!=""){
  }
  else
  {
    header("Location:../index.php");
  }
include ('../functions/db.php');
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
                    <li class="active"><a href="home.php"> Dashboard</a></li>
                    <li><a href="content.php"> Manage Post </a></li>
                    <li><a href="user.php"> Manage User</a></li>
                    <li><a href="category.php"> Category</a></li>
                    <li><a href="meeting.php"> Manage Meeting</a></li>
                    <li><a href="attendentformeeting.php"> Manage Attendent</a></li>
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

    <div class="tab-content">
        <div class="container" style="margin:7% auto;">
        <h4>Latest Discussion</h4>
        <hr>
            <?php  include "../functions/db.php";
            $sel = mysqli_query($con,"SELECT * from tblcategories");
            while($row=mysqli_fetch_assoc($sel))
            {
                extract($row);
                echo '<div class="panel panel-success">
                    <div class="panel-heading">
                    <h3 class="panel-title">'.$categoryName.'</h3>
                    </div> 
                    <div class="panel-body">
                    <table class="table table-stripped">
                    <tr>
                    <th>Topic title</th>
                    <th>Category</th>
                    <th>Action</th>
                    </tr>';
                    $sel1 = mysqli_query($con,"SELECT * from tblpost where categoryID='$categoryID'");
                    while($row1=mysqli_fetch_assoc($sel1))
                    {
                        extract($row1);
                        echo '<tr>';
                        echo '<td>'.$postTitle.'</td>';
                        echo '<td>'.$categoryName.'</td>';
                        echo '<td><a href="content.php?post_id='.$postID.'"><button class="btn btn-success">View</button></td>';
                        echo '</tr>';
                    }
                        echo '</table>
                        </div>
                    </div>';
            }
            ?>
        <div class="my-quest" id="quest">
            <div> 
                <form method="POST" action="question-function.php">
                <label>Category</label>
                <select name="category" class="form-control">
                <option></option>
                <?php $sel = mysqli_query($con,"SELECT * from tblcategories");
                    if($sel==true)
                    {
                        while($row=mysqli_fetch_assoc($sel))
                        {
                            extract($row);
                            echo '<option value='.$categoryID.'>'.$categoryName.'</option>';
                        }
                    }
                ?>
                </select>
                <label>Topic Title</label>
                <input type="text" class="form-control" name="title"required>
                <label>Content</label>
                <textarea name="content"class="form-control">
                </textarea>
                <br>
                <p align="left">Select image to upload:</p>
                <input type="file" name="fileToUpload" id="fileToUpload ">   
                <br>

                <!-- <p align="left">Type :   
                </t></t>
                <input required type="radio" name="type" value="article" onclick="attach(this)"> Article
                <input required type="radio" name="type" value="announcement" onclick="attach(this)"> Announcement</p>
                 -->
                <span id="pdf" style="display: none;">
                <p align="left">Select article to upload:</p>
                <input type="file" name="fileToAttach" id="fileToAttach">
                </span>
                <input type="hidden" name="userid" value=<?php echo $userID; ?>>
                <input type="submit" class="btn btn-success pull-right" value="Post">
                </form><br>
                <hr>
                  <a href="" class="pull-right">Close</a>
              </div>
        </div>
        </div>
    </div>

</body>
</html>
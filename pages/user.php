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
                    <li class="active"><a href="user.php"> User List</a></li>
                    <li><a href="userprofile.php"> User Profile</a></li>
                    <li><a href="registernewuser.php"> Register New User</a></li>
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

    <div class="container" style="margin:8% auto;width:1200px;">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Users</h3>
                </div> 
                 <div class="panel-body">
                            <table class="table table-stripped">
                                <th>#</th>
                                <th>User Name</th>
                                <th>User ICNO</th>
                                <th>User Staff No</th>
                                <th>Gender</th>
                                <th>Faculty</th>
                                <th>Email Address</th>
                                <th>Role</th>
                                <th>Actions</th>
                            <?php
                            
                            include "../functions/db.php";

                            $sql = "SELECT * from tblrole as tr join tbluser as tu on tr.roleID=tu.roleID";
                            $run = mysqli_query($con,$sql);

                            $i = 1;
                            //while($row=mysqli_fetch_array($run))
                            // {
                            //     extract($row);
                            //     echo "<tr>";
                            //     echo "<td>".$userName."</td>";
                            //     echo "<td>".$usericNo."</td>";
                            //     echo "<td>".$userstaffNo."</td>";
                            //     echo "<td>".$userGender."</td>";
                            //     echo "<td>".$userFaculty."</td>";
                            //     echo "<td>".$userEmail."</td>";
                            //     echo "<td>".$roleName."</td>";
                            //     echo '<td><button class="btn btn-danger" onclick="deleteuser('.$userID.')">Delete</button>';
                            //     echo "</tr>";
                            // }

                            while($row=mysqli_fetch_array($run))
                            {
                                $id = $row['userID'];
                                echo "<tr>";
                                echo '<th scope="row">'.$i.'</th>';
                                echo "<td>".$row['userName']."</td>";
                                echo "<td>".$row['usericNo']."</td>";
                                echo "<td>".$row['userstaffNo']."</td>";
                                echo "<td>".$row['userGender']."</td>";
                                echo "<td>".$row['userFaculty']."</td>";
                                echo "<td>".$row['userEmail']."</td>";
                                echo "<td>".$row['roleID']."</td>";
                                 echo "<td>".
                                    "<a href='topic-details.php?userID=$id' class='btn btn-info'>Details</a>"." ".
                                    "<a href='edit-topic.php?userID=$id' class='btn btn-warning'>Edit</a>"." ".
                                    "<a href='delete-user.php?userID=$id' class='btn btn-danger'>Delete</a>"
                                    ."</td>";
                                echo "</tr>";
                                $i++;
                            }
                            ?>
                            </table>
                     </div>
                </div>

            </div>
            <script type="text/javascript">

            function deleteuser(userID){
                var datastring = 'action=deleteuser&userID='+userID;
                var con = confirm("Are you sure you want to delete?");
                if(con==true){
                    $.ajax({
                    type: "POST",
                    url: "../functions/functionsdeleteuser.php",
                    data: datastring,
                    success: function(result){
                        console.log(result);
                        if(result=="success"){
                            window.location.href="user.php";
                        }
                        else{
                            alert("Failed to delete");  
                        }
                    }
                });
                }
                
                return false;
            }

            </script>
    </body>
</html>
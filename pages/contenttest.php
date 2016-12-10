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
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</head>
<body>
	<!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
        <div role="tabpanel">
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
                    <li class="active"><a href="#dashboard" role="tab" data-toggle="tab"> Dashboard</a></li>
                    <li><a href="#quest"> Post a Question</a></li>
                    <li><a href="user.php"> User Profile</a></li>
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
        <div class="tab-content">


    <div class="tab-pane fade in active" id="dashboard" style="margin-left:25%;padding:1px 16px;height:1000px;" id="dashboard">
                     
                            <?php
                            $sql3 = "SELECT * from tblpost p,tbluser u where t.userID=u.userID and t.statusPost='SATISFIED'  order by t.datetimeCreated DESC";
                              $result3 = mysqli_query($conn, $sql3);
                              $num_rows3=mysqli_num_rows($result3);
                         if(mysqli_num_rows($result3)>0){
                                         $index=0;
                                         while($row3 = mysqli_fetch_assoc($result3)) {
                                           // date_default_timezone_set("Asia/Kuala_Lumpur"); 
                                            $date = date_create($row3["date_created"]);
                                             $type=$row3["type"];
                                             $index++;
                                         ?>

               <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">

                                                 <a data-toggle="collapse" href="<?php echo '#collapse'.$index;?>">
                                                <?php 
                                                if($type=="announcement"){?>
                                                   <span class="fa fa-bullhorn" aria-hidden="true"> </span>      
                                                <?php
                                                }
                                                elseif ($type=="article"){?>
                                                     <span class="fa fa-file-pdf-o" aria-hidden="true"> </span>
                                                     <?php
                                                } ?>
                                                
                                                <?php echo $row3["title"];?></a></h3>
                                            </div>

                                            <div id="<?php echo 'collapse'.$index;?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="col-md-6">

                                                    <p><?=$row3["subject"];?></p>
                                                
                                                   <?php 
                                                   if ($row3['location']!=""){?>
                                                    <img align="center" src="<?php echo $row3['location'];?>" alt="HTML5 Icon" >
                                                    <?php }else{echo "No image attachment";}?>
                                                     <br>
                                                      <?php   if ($row3['attach']!=""){?>
                                                    <a href="<?=$row3['attach'];?>" download>
                                                      <img border="0" src="picture/pdf.png" alt="pdf" width="300" height="100">
                                                    </a>
                                                    <?php }else{echo "No file attachment";}?>
                                                    <br>
                                                     <p><b><?php echo"   From " .$row3["name"]." ".date_format($date, '\o\n l jS F Y  \a\t g:ia ');?></b></p>
                                                     </br>
                                                      <div class="row">
                                                          
                                                       <form action="mainpage.php" method="POST" enctype="multipart/form-data">
                                                       <input type="hidden" name="thread_id" id="thread_id"  value="<?=$row3['thread_id'];?>">
                                                       <div class="input-group">
                                                       <div class="col-sm-6">
                                                        <input class="form-control" type="text" name="comment" id="comment"  placeholder="Comment" size="100">
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <button type="submit" name="bcomment" id="bcomment" class="btn btn-success"><span class="fa fa-envelope" aria-hidden="true"></span> Submit</button> </div></div>
                                                        </div>
                                                     </form>
                                                     <br>
                                                     <?php 
                                                     $thread_id=$row3['thread_id'];
                      $query="SELECT * from thread t,post p,user_account u where p.user_id=u.user_id and t.thread_id='$thread_id' and t.thread_id=p.thread_id order by p.created DESC";
                      $result=mysqli_query($conn,$query);
                      $num_rows=mysqli_num_rows($result);

                      if(mysqli_num_rows($result)>0){
                                         while($row = mysqli_fetch_assoc($result)) {
                                          // date_default_timezone_set("Asia/Kuala_Lumpur"); 
                                          // $date = date_create($row["created"]);?>
                                            <p><b><?=$row['name'];?></b><?="  ".$row['content'];?></p>
                                            <?php  }} ?>
                                                </div>

                                            </div>
                                        </div>
                                        </div>
                                            <?php }}else{echo "No result";} ?>
          </div>
    </div>


		<div class="my-quest" id="quest">
            <div> 
                     <form action="mainpage.php" method="POST" enctype="multipart/form-data">
                            <div class="input-group">
                                <input class="form-control" type="text" name="title" id="title"  placeholder="Title">
                                <br>
                                <br>
                                <br>
                                <textarea class="form-control" name="post" rows="4" cols="50" placeholder="Subject..."></textarea>
                                  <p align="left">Select image to upload:</p>
                                 <input type="file" name="fileToUpload" id="fileToUpload ">   
                                 <br>
                                <p align="left">Type :   
                                </t></t><input required type="radio" name="type" value="article" onclick="attach(this)"> Article
                                            <input required type="radio" name="type" value="announcement" onclick="attach(this)"> Announcement</p>

                              <span id="pdf" style="display: none;">
                                <p align="left">Select article to upload:</p>
                                 <input type="file" name="fileToAttach" id="fileToAttach">
                              </span>

                                
                                        <!-- Button and dropdown menu -->
                                <br>
                                 <div align="right">       
                                <button type="submit" name="insert" id="insert" class="btn btn-success"><span class="fa fa-envelope" aria-hidden="true"></span> Submit</button> </div>
                            </div>
                        </form><br>
                <hr>
                  <a href="" class="pull-right">Close</a>
              </div>
    </div>
    </div>
    </div>

</body>
</html>
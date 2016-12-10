<html>
<head>
	<title></title>

	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
                <a class="navbar-brand" href="index.php">UTeMASA FORUM</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            	<!--
                <ul class="nav navbar-nav navbar-left">
                    <li><a href=""><span class="glyphicon glyphicon-list"></span> Topics</a></li>
                </ul>
            -->
                <div>
					<form class="navbar-form navbar-right" method="POST" role="search" action="pages/login.php">
					<div class="form-group">
					<input type="text" class="form-control" name="username" id="username" placeholder="User name" required>
					<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
					</div>
					<button type="submit" class="btn btn-success">Login</button>
					</form>
				</div>

				
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
			<!-- <div class="container" style="margin:8% auto;"> -->
				<!-- <div class="col-sm-4 col-md-3">
					<h2>Discuss with your friends</h2>
					<p>This system will help to post your share message and importance file for this group member.Moreover there is more can be done using this system with selected role.</p>
				</div> -->

				<!-- <div class="col-sm-5 col-md-4 pull-right">
                   <div class="row"> -->
                   
						<!-- <form method="POST" class="form-signin" action="functions/register.php">
								<h3 class="text-center">Signup Here!</h3>

							<input type="text" name="username" id= "username" placeholder="User Name" class="form-control" required>
							<select class="form-control" name="usergender" id="usergender" required>
								<option value="">Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
							<input type="text" name="useremail" id="useremail" placeholder="User Email" class="form-control" required>
							<input type="text" name="userhandphoneno" id="userhandphoneno" placeholder="Hand Phone No" class="form-control" required>
							<input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
							<input type="text" name="usernoic" id="usernoic" placeholder="User ICNO" class="form-control" required>
							<select class="form-control" name="roleid" id="roleid" required>
								<option value="">Role</option>
								<option value="1">Admin</option>
								<option value="2">Finance</option>
								<option value="3">Staff</option>
							</select>
							<input type="submit" value="Signup" class="btn btn-success" style="width:100%;">
						</form> -->

						<!-- <form method="POST" class="form-signin" action="functions/register.php">
								<h3 class="text-center">Signup Here!</h3>

							<input type="text" name="username" id= "username" placeholder="User Name" class="form-control" required>
							<select class="form-control" name="usergender" id="usergender" required>
								<option value="">Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
							<input type="text" name="usernoic" id= "usernoic" placeholder="User ICNO" class="form-control" required>
							<input type="text" name="staffno" id= "staffno" placeholder= "STAFF NO" class = "form-control" required>
							<input type="text" name="position" id= "position" placeholder= "POSITION/GRED" class= "form-control" required>
							<input type="text" name="faculty" id= "faculty" placeholder= "OFFICE/FACULTY" class= "form-control" required>
							<textarea type="text" name="address" id= "address" placeholder= "ADDRESS" class= "form-control" required></textarea>
							<input type="text" name="useremail" id="useremail" placeholder="User Email" class="form-control" required>
							<input type="text" name="usertelphoneno" id="usertelphoneno" placeholder="Telephone No" class="form-control" required>
							<input type="text" name="userhandphoneno" id="userhandphoneno" placeholder="Hand Phone No" class="form-control" required>
							<input type="text" name="userOfficeno" id="userOfficeno" placeholder="Office No" class="form-control" required>
							<input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
							<select class="form-control" name="roleid" id="roleid" required>
								<option value="">Role</option>
								<option value="1">Admin</option>
								<option value="2">Finance</option>
								<option value="3">Staff</option>
							</select>

							<input type="submit" value="Signup" class="btn btn-success" style="width:100%;">
						</form> -->
<!-- 
					</div>
				</div>
			</div> -->
<!-- <hr> -->
    <!-- <div class="footer">
		<nav align="center">
			<ul class="nav navbar-nav">
				<li><a href="">About</a></li>
				<li><a href="">Developers</a></li>
				<li><a href="">Terms and Conditions</a></li>
			</ul>
		</nav>
	</div> -->

</body>
</html>
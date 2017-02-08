<?php
session_start();

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));
	
	$uname = trim($uname);
	$email = trim($email);
	$upass = trim($upass);
	
	// email exist or not
	$query = "SELECT user_email FROM users WHERE user_email='$email'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	
	if($count == 0){
		
		if(mysql_query("INSERT INTO users(user_name,user_email,user_pass) VALUES('$uname','$email','$upass')"))
		{
			header("Location: users.php");
		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('Sorry Email ID already taken ...');</script>
			<?php
	}
	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - News365</title>
<link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>
<body>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">


        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php">News365</a>
        </div>


        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="home.php">News</a></li>
            <li ><a href="categories.php">Categories</a></li>
            <li class="active"><a href="users.php">Users</a></li>

          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            <li ><a href="logout.php?logout">Sign Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
        
      </div>
    </div>




<div class="container">
<div class="panel-body">
              <div class="row">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="col-md-7">

                  

                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" class="form-control" placeholder="User Name" name="uname" required>
                      </div>

                      <br />
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="email" class="form-control" placeholder="User E-Mail" name="email" required>
                      </div>


                      <br />
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="password" class="form-control" placeholder="Password" name="pass" required>
                      </div>               

					  
                </div>
                <div class="col-md-5">

                  
                      <p>
                          <button type="submit" name="btn-signup" class="btn btn-info" role="button">Save</button> 
                          <a class="btn btn-info" href="users.php" role="button">Cancel</a>
                      </p>

                  

               </div>

               </form>
        </div>
      </div>
   
</div> <!-- /container -->

</body>
</html>
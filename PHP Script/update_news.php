<?php

	session_start();

	if(!isset($_SESSION['user']))
	{
	header("Location: index.php");
	}
	include_once 'dbconnect.php';
   
    $id =$_GET['id'];

    // sending query
    $sql = mysql_query("SELECT * FROM news WHERE news_id = '$id'") or die(mysql_error());
	$rows=mysql_fetch_array($sql);	
	
	$query = "SELECT * FROM categories";
	$result = mysql_query($query);
	
	
	if(isset($_POST['btn-signup']))
{
	$title   = mysql_real_escape_string($_POST['title']);
	$img_url = mysql_real_escape_string($_POST['img_url']);
	$desc    = mysql_real_escape_string($_POST['desc']);
	$date    = mysql_real_escape_string($_POST['date']);
	$category= mysql_real_escape_string($_POST['category']);
	
	
	$title    = trim($title);
	$img_url  = trim($img_url);
	$desc     = trim($desc);
	$date     = trim($date);
	$category = trim($category);
	
	mysql_query("UPDATE news SET news_title='$title', news_img_url='$img_url', news_category='$category', news_description='$desc', news_date='$date' WHERE news_id='$id'");
	header("Location: home.php");
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
            <li class="active"><a href="home.php">News</a></li>
            <li ><a href="categories.php">Categories</a></li>
            <li ><a href="users.php">Users</a></li>

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
                        <input type="text" class="form-control" placeholder="News Title" name="title" required value="<?php echo $rows[1]; ?>" required>
                      </div>

                      <br />
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" class="form-control" placeholder="Image URL" name="img_url" required value="<?php echo $rows[2]; ?>" required>
                      </div>
					  
					  <br />
                      <div class="input-group" style="width:100%;">
                        <select required class="form-control" style="width:100%;" name="category">
                          <option value="">Select Category</option>
                          <?php
                              while($row = mysql_fetch_row($result)){
							  
							  if ( $rows[3] == $row[0]) {
									echo "<option value='$row[0]' selected>$row[1]</option>";
									}
									else {
									echo "<option value='$row[0]'>$row[1]</option>";
									}
                              }
                          ?>
                          
                        </select>
                      </div>

                      <br />
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="date" class="form-control" placeholder="Date" name="date" value="<?php echo $rows[5]; ?>"required>
                      </div>

                      <br />
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <textarea type="text" class="form-control" placeholder="News Description" rows="10" name="desc" required ><?php echo $rows[4]; ?></textarea>
                      </div>

                   
                  


                </div>
                <div class="col-md-5">

                  
                      <p>
                          <button type="submit" name="btn-signup" class="btn btn-info" role="button">UPDATE</button> 
                          <a class="btn btn-info" href="home.php" role="button">Cancel</a>
                      </p>

                  

               </div>

               </form>
        </div>
      </div>
   
</div> <!-- /container -->

</body>
</html>
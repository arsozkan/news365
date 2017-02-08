<?php
session_start();

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
include_once 'dbconnect.php';
$query = "SELECT * FROM news ORDER BY news_id DESC";
$result = mysql_query($query);


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

    <div class="panel panel-default">
    <!-- Default panel contents -->
        <div class="panel-heading clearfix">
            <h4 class="panel-title pull-left" style="padding-top:7px;padding-bottom:6px;">News Table</h4>
            <div class="btn-group pull-right">
              
                  
                  <a href="insert_news.php" class="btn btn-default btn-sm"><span class='glyphicon glyphicon-plus'></span></a>
            </div>
        </div>

        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>News Title</th>
                    <th>Image Url</th>
					<th>Category</th>
					<th>Description</th>
					<th>Date</th>
					<th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
				while($row = mysql_fetch_row($result)){
				echo "<tr>";
                echo "<th>$row[0]</th>" ;
				echo "<th>$row[1]</th>";
				echo "<th>$row[2]</th>";
				echo "<th>$row[3]</th>";
				echo "<th>$row[4]</th>";
				echo "<th>$row[5]</th>";
				echo "<td>
                                    <a class='btn btn-primary btn-xs' href=\"update_news.php?id=$row[0]\">Edit</a>
									<a class='btn btn-primary btn-xs' href=\"delete_news.php?id=$row[0]\">Delete</a>
                                    
                                </td>";
				echo "</tr>\n";
				}
                ?>
            </tbody>
        </table>
	</div>
</div> <!-- /container -->

</body>
</html>
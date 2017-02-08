<?php

	session_start();

	if(!isset($_SESSION['user']))
	{
	header("Location: index.php");
	}
	include_once 'dbconnect.php';
   
    $id =$_REQUEST['id'];

    // sending query
    mysql_query("DELETE FROM categories WHERE category_id ='$id'")
    or die(mysql_error());     
	header("Location: categories.php");	

    ?>
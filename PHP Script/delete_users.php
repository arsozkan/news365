<?php

	session_start();

	if(!isset($_SESSION['user']))
	{
	header("Location: index.php");
	}
	include_once 'dbconnect.php';
   
    $id =$_REQUEST['id'];

    // sending query
    mysql_query("DELETE FROM users WHERE user_id = '$id'")
    or die(mysql_error());     
	header("Location: users.php");	

    ?>
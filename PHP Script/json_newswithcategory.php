<?php
    
	include_once 'dbconnect.php';
	$id =$_GET['id'];
	
    //fetch table rows from mysql db
    $query = "SELECT * FROM news WHERE news_category = '$id' ";
	$result = mysql_query($query);

    //create an array
    $emparray = array();
    while($row =mysql_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);

?>
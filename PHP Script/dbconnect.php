<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
if(!mysql_connect("188.121.44.184:3306","user","29082908"))
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("db_news365"))
{
	die('oops database selection problem ! --> '.mysql_error());
}

?>
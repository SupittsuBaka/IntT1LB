<?php
	$db_driver="mysql";
	$host="localhost";
	$database="lb1";
	$dsn="$db_driver:host=$host;dbname=$database";
	$username="root";
	$password="";
	try 
	{
		$dbh = new PDO($dsn, $username, $password);
	} 
	catch (PDOException $e)
	{
		echo $e->getMessage();
		die();
	}
?>
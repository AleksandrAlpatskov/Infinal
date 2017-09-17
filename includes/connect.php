<?php
	$mysqlhost	= "localhost";
	$mysqluser	= "infinal";
	$mysqlpwd 	= "9moi.tuM3Urc";
	$mysqldb	= "infinal";

	try{
		$con = new PDO("mysql:host={$mysqlhost};dbname={$mysqldb}",$mysqluser,$mysqlpwd);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e)
	{
		echo "Connection error  : " .$e->getMessage();
	}
?>
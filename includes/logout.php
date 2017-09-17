<?php
	require_once('session.php');
	session_destroy();
	unset($_SESSION['username']);
	header("Location:http://infinal-online.de"); 
?>
<?php

	require_once("../includes/session.php");
	require_once("../includes/class.user.php");
	$auth_user = new USER();

	$username = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE username=:username");
	$stmt->execute(array(":username"=>$username));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	
?>
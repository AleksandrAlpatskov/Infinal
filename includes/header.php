<?php 
	include('connect.php');
	require_once('session.php');
	
	$companyName = "Infinal";
	if(isset($_POST['Login'])){
		$uname = $_POST['loginuser'];
		$umail = $_POST['loginuser'];
		$upass = $_POST['loginpass'];
		
		$pass_hash = hash("SHA512", $upass);
		
		try
		{
			$stmt = $con->prepare("SELECT username, password, email FROM users WHERE username=:uname OR email=:umail ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if($row['password'] == $pass_hash)
				{
					$_SESSION['username'] = $row["username"];
				}
				else {
					echo $row['password'] ;
					echo "Error password not match";
				}
			}
			else{
				echo "Error no rows";	
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link rel="shortcut icon" href="/favicon.png">
<title><?php echo TITLE; ?></title>
<link href="http://infinal.de/assets/reset.css" rel="stylesheet">
<link href="http://infinal.de/assets/main.css" rel="stylesheet">
<link href="http://infinal.de/assets/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="http://infinal.de/js/jquery.min.js"></script>
<script>
	var updateDiv = function ()
	{
	  $('#news').load('http://infinal.de/includes/news.php', function () {
		deinTimer = window.setTimeout(updateDiv, 10000);
	  });
	}
	var deinTimer = window.setTimeout(updateDiv, 10000); 
	
    var serverUpdate = function ()
	{
	  $('#server').load('http://infinal.de/includes/server.php', function () {
		serverTimer = window.setTimeout(serverUpdate, 10000);
	  });
	}
	var serverTimer = window.setTimeout(serverUpdate, 10000); 

	function myFunction() {
		document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
		var clientHeight = document.getElementById('nav').clientHeight;
		if(clientHeight == 50)
		{
			document.getElementById("nav").style.height='250px';
		} 
		else 
		{
			document.getElementById("nav").style.height='50px';
		}
	}
	function Login() {
		document.getElementsByClassName("login").style.display='block';
	}
	function Login() { 
		if(document.getElementById) { 
			var mydiv = document.getElementById("login"); 
			mydiv.style.display = (mydiv.style.display=='block'?'none':'block');
		} 
	} 
	function Cancel() {
		if(document.getElementById) { 
			var mydiv = document.getElementById("login"); 
			mydiv.style.display = (mydiv.style.display=='block'?'none':'block');
		} 
	}
</script>
</head>

<body id="final-example">
 	<div id="login" style="display: none;">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>Benutzernname</label><br />
            <input type="text" name="loginuser" class="loginuser"><br />
            <label>Passwort</label><br />
            <input type="password" name="loginpass" class="loginpass"><br />
            <input type="button" name="cancel" class="cbtn" onclick='Cancel()' id="cbtn" value="Abbrechen">
            <input type="submit" name="Login" class="lbtn" value="Login">
        </form>
       <?php if(isset($error))
            {
            	echo '<div class="err">'.$error."</div>"; 
			}
		?>
    </div> 
	<div class="wrapper">
    	<?php 
			if(isset($_SESSION['username'])){
    			echo "<a href='http://infinal.de/includes/logout.php' class='logout_btn'>Not ".$_SESSION['username']."?</a>";	
			}
			else {
				echo "<a class='login_btn' href='javascript:void(0);' onclick='Login()'>Login</a>";	
			}
			
		?>
    	<div class="banner"><h1>INFINAL Community</h1></div>
    <nav class="nav" id="nav"><?php include("nav.php"); ?></nav>
    <?php echo $_SESSION['username']; ?>
        <main class="content">
        <section class="news" id="news"><?php include("news.php"); ?></section>
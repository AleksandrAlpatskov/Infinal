<?php
	define("TITLE", "Infinal-Online - Server");
	include('../includes/header.php');
?>
<section class="inhalt">
	<?php 
		if (isset($_SESSION['username'])) {
	?>
		<section>
		
		</section>	
	<?php
	} else {
		echo'<div class="downerror">
		<h2>ERROR</h2><br /><br />
		<p>Du bist dich erst einloggen!</p><br />
		<p><a href="http://infinal-online.de/pages/register.php">Noch kein Account?</a></p>
		</div>';
	}
	?>
</section>
</main>
<footer class="footer">
<?php
	include('../includes/footer.php');
?>
<?php
	define("TITLE", "Infinal-Online");
	include('includes/header.php');
?>
<section class="welcome">
	<h1>Willkommen zum Infinalversum</h1>
</section>
<section class="left">
	<h2>Usere Geschichte:</h2>
	Wir sind eine kleine Gemeinde, die mehrere Gameserver hostet. Wir wollen unseren Spielern eine breite auswahl an Spielen bieten. <br /><br />
	Unsere Gemeinschaft wurde am 25.05.2016 gegründet. <br />
	Unsere Entwickler bestehen hauptsächlich nur aus Spielern, somit wird unsere persönliches Spiel ein besonderes!
	<br /><br />
	<h2>Unser Ziel</h2>
	Unser Ziel ist es viele Spieler zusammen zu bringen und unser Spiel, welches noch in der Entwicklung ist, unter unsere Spieler-Community zu bringen. <br />
	Wir hoffen sehr das euch unser Spiel gefallen wird, denn es ist nicht wie jedes andere MMORPG sondern es wird etwas besonderes.         
</section>
<section  class="middle">
	<h2>Kurze Server Information</h2>
	<ul>
		<li>Freundliche Spieler</li>
	   <li> Freundliches Team</li>
		<li>Starker Home Server</li>
	   <li>Großes Forum</li>
		<li>Und die besten Server-Plugins</li>
		<li>uvm.</li>
	</ul>
	<a href="http://infinal-online.de/pages/server.php">Für mehr Information hier klicken</a>
</section>
<section  class="right">
	<h2>Server IP</h2>
	<li>SuvivalServer (mine.infinal-online.de:25565)</li>
	<li>CreativServer (mine.infinal-online.de:25566)</li>
	<li>ARK Server (ark.infinal-online.de:27015)</li>
	<br>
	SuvivalServer Infinal-Craft ist 
	<?php 
		if (!@$fp = fsockopen("mine.infinal-online.de",25565, $errno, $errstr, 1)){ 
		echo "<font color='#FF0000' style='font-weight:bold;'>Offline</font>"; 
		} 
		else { 
		echo "<font color='#2eb82e' style='font-weight:bold;'>Online</font>"; 
		} 
	?>
	</br>
	 CreativServer Infinal-Craft ist 
	<?php 
		if (!@$fp = fsockopen("mine.infinal-online.de",25566, $errno, $errstr, 1)){ 
		echo "<font color='#FF0000' style='font-weight:bold;'>Offline</font>"; 
		} 
		else { 
		echo "<font color='#2eb82e' style='font-weight:bold;'>Online</font>"; 
		} 
	?>
	</br>
	ARK Server Infinal-ARK ist 
	<?php 
		if (!@$fp = fsockopen('udp://'."ark.infinal-online.de", 27015, $errno, $errstr, 1)){ 
		echo "<font color='#FF0000' style='font-weight:bold;'>Offline</font>"; 
		} 
		else { 
		echo "<font color='#2eb82e' style='font-weight:bold;'>Online</font>"; 
		} 
	?>
</section>
</main>
<footer class="footer index">
<?php
	include('includes/footer.php');
?>
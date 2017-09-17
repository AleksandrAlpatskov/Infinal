<?php
	define("TITLE", "Infinal-Online - Server");
	include('../includes/header.php');
?>
<section class="inhalt">
	<table class="ARK">
	<th colspan="2"><h2>Server Informationen</h2></th>
		<tr>
			<td class="subject">HostName</td>
			<td class="object"><?php print_r($ARK_Info['HostName']); ?></td>
		</tr>
		<tr>
			<td class="subject">Map</td>
			<td class="object"><?php print_r($ARK_Info['Map']); ?></td>
		</tr>
		<tr>
			<td class="subject">Password</td>
			<td class="object"><?php if($ARK_Info['Password'] == 1) { $pass = "true";} print_r($pass); ?></td>
		</tr>
		<tr>
			<td class="subject" rowspan="4">Mods</td>
			<td class="object"><?php $mod = substr($ARK_Rules['MOD0_s'],0,9);?> <a href="http://steamcommunity.com/sharedfiles/filedetails/?id=<?php print_r($mod);?>"><?php print_r($mod); ?></a></td>
		</tr>
		<?php for($i = 1;$i <= 5;$i++) { ?>
			<tr>
				<td class='object'><?php $mod = substr($ARK_Rules['MOD'.$i.'_s'],0,9); ?> <a href="http://steamcommunity.com/sharedfiles/filedetails/?id=<?php print_r($mod);?>"><?php print_r($mod); ?></td>
			</tr>
		<?php 
		} ?>
		
		<script>
		var updatePlayer = function ()
		{
		  $('.players').load('http://infinal-online.de/includes/arkquery.php', function () {
			TimerPlayer = window.setTimeout(updateDiv, 1000);
		  });
		}
		var TimerPlayer = window.setTimeout(updateDiv, 1000);
		</script>
		<?php for ($j = 0; $j <= 40; $j++) {
			if($j = 0) { ?>
				<tr>
					<td class='subject'>Player</td>
					<td class="object players"><?php $mod = $ARK_Players['Name']; print_r($mod); ?></td>
				</tr>
			<?php } else { ?>
			<tr>
				<td class='object'><?php $mod = $ARK_Players['Name']; print_r($mod); ?></td>
			</tr>
		<?php } 
		} ?>
	</table>
</section>
<?php
	include('../includes/footer.php');
?>
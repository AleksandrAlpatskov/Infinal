<?php
	define("TITLE", "Infinal-Online - Server");
	include('../includes/header.php');

	use xPaw\MinecraftQuery;
	use xPaw\MinecraftQueryException;
	define( 'MQ_SERVER_ADDR', 'infinal-online.de' );
	define( 'MQ_SERVER_PORT', 25565 );
	define( 'MQ_TIMEOUT', 1 );
	// Display everything in browser, because some people can't look in logs for errors
	//Error_Reporting( E_ALL | E_STRICT );
	//Ini_Set( 'display_errors', true );
	require __DIR__ . '/src/MinecraftQuery.php';
	require __DIR__ . '/src/MinecraftQueryException.php';
	$Timer = MicroTime( true );
	$Query = new MinecraftQuery( );
	try
	{
		$Query->Connect( MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT );
	}
	catch( MinecraftQueryException $e )
	{
		$Exception = $e;
	}
	$Timer = Number_Format( MicroTime( true ) - $Timer, 4, '.', '' );
	$Info = $Query->GetInfo( );
	
	$ip = 'ark.infinal-online.de';
	$queryport = 27015;
	
	$socket = @fsockopen("udp://".$ip, $queryport , $errno, $errstr, 1);
	
	stream_set_timeout($socket, 1);
	stream_set_blocking($socket, TRUE);
	fwrite($socket, "\xFF\xFF\xFF\xFF\x54Source Engine Query\x00");
	$response = fread($socket, 4096);
	@fclose($socket);
	
	$packet = explode("\x00", substr($response, 6), 5);
	$server = array();
	
	$server['name'] = $packet[0];
	$server['map'] = $packet[1];
	$server['game'] = $packet[2];
	$server['description'] = $packet[3];
	$inner = $packet[4];
	$server['players'] = ord(substr($inner, 2, 1));
	$server['playersmax'] = ord(substr($inner, 3, 1));
	$server['password'] = ord(substr($inner, 7, 1));
	$server['vac'] = ord(substr($inner, 8, 1));
	
	//var_dump( $server )
	?>
	 <section id="server" class='inhalt'>
		<table  class='ARK'>
        	<th colspan='2'><h2><?php echo $server['name']?> Informationen</h2></th>
            <tr>
            	<td class='desc'>Spiel</td><td class='info'><?php echo $server['description']?></td>
            </tr>
			<tr>
            	<td class='desc'>Server Map</td><td class='info'><?php echo $server['map']?></td>
            </tr>
			<tr>
            	<td class='desc'>Spieler</td><td class='info'>
					<?php 
						if($server['players'] < 15)
						{ 
							echo "<a class='green'>".$server['players']."</a> / ";echo $server['playersmax'];
						}
						elseif($server['players'] < 30)
						{ 
							echo "<a class='yellow'>".$server['players']."</a> / ";echo $server['playersmax'];
						}
						else
						{ 
							echo "<a class='red'>".$server['players']."</a> / "; echo $server['playersmax'];
						} 
                    ?>
                </td>
            </tr>
			<tr>
            	<td class='desc'>Passwort</td><td class='info'><?php if($server['password'] == 1){echo "Ja";}else{echo "nein";}?></td>
            </tr>
			<tr>
            	<td rowspan='18' class='desc'>Mods</td><td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=510590313'>510590313 Metal with Glass Set</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=519998112'>519998112 Small Dragons</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=534838287'>534838287 Industrial Grinder</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=536214294'>536214294 Corrected Structures</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=538827119'>538827119 Improved Spyglass</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=543828831'>543828831 Item Sorting System</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=558079412'>558079412 Admin Command Menu</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=558651608'>558651608 Bridge</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=604581285'>604581285 Compound Bow Plus</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=609380111'>609380111 Stargate Atlantis</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=612270173'>612270173 GlassMetal Creative</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=613864333'>613864333 Progressive Weapons & Tools</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=630601751'>630601751 Resource Stacks</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=647457163'>647457163 NaturalWildlife</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=655261420'>655261420 Homing Pigeon</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=656525905'>656525905 Extra ARK 2.0</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=703724165'>703724165 Versatile Raft Mod</a></td>
            </tr>
			<tr>
            	<td class='mods'><a href='https://steamcommunity.com/sharedfiles/filedetails/?id=707081776'>707081776 Raft Extender</a></td>
            </tr>			
        </table>
        <table class='minecraft'>
        	<?php $Info = $Query->GetInfo( );  ?>
            <th colspan='2'><h2><?php echo $Info['HostName']?> Informationen</h2></th>
            <tr>
                <td class='desc'>Spiel</td><td class='info'>Minecraft <?php echo $Info['Version']?></td>
            </tr>
            <tr>
                <td class='desc'>Spieler</td><td class='info'>
                    <?php 
						$players_online = $Info['MapPlayers'];
						$players_max = $Info['MaxPlayers'];
						if ($players_online == ""){$players_online = 0;}
                            if($players_online < 15)
                            { 
                                echo "<a class='green'>".$players_online."</a> / ";echo $players_max;
                            }
                            elseif($players_online < 30)
                            { 
                                echo "<a class='yellow'>".$players_online."</a> / ";echo $players_max;
                            }
                            else
                            { 
                                echo "<a class='red'>".$players_online."</a> / "; echo $players_max;
                            } 
                    ?>
                </td>
            </tr>
            <tr>
                <td class='desc'>Software</td><td class='info'><?php echo $Info['Software'];?></td>
            </tr>
            <tr>
                <td class='desc'>GameType</td>
                <td class='info'>
				<?php 
					if ($Info['GameType'] == 0)
						echo "Suvival";
					else if ($Info['GameType'] == 1)
						echo "Creative";
					else
						echo "Adventure";
				?>
                </td>
            </tr>
            <tr>
                <td class='desc'>HostPort</td><td class='info'><?php echo $Info['HostPort'];?></td>
            </tr>
		</table>
 	</section>
</main>
<footer class="footer">
<?php
	include('../includes/footer.php');
?>

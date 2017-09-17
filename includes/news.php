<?php
	include_once ("connect.php");
	
	$sql_news = "SELECT * from news ORDER BY id DESC LIMIT 0,25";
	
	$result_news = $con->query($sql_news);
	$rows = $result_news->fetchAll(PDO::FETCH_ASSOC);
	
	foreach($rows as $row){
		$wichtig = $row['important'];
		$date = date_create($row['datum']);
		if ($wichtig >= 1){
			echo "<li class='wichtig'>".$row['info']."<div class='date'>".date_format($date, 'd.m.Y - H:i')."</div></li>";
		}
		else {
			echo "<li>".$row['info']."<div class='date'>".date_format($date, 'd.m.Y - H:i')."</div></li>";
		}
	}
?>
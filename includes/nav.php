<?php
	include('connect.php');
	try { 
		$sql_menu = "SELECT * FROM menu";
		
		$result_menu = $con->query($sql_menu);
		$row_count = $result_menu->rowCount();
		if($row_count){
		$rows = $result_menu->fetchAll(PDO::FETCH_ASSOC);
	}
	}catch(PDOException $e) { 
		echo $e->getMessage(); 
	} 
	
	$items = $rows;
	$id = '';
	echo "<ul class='topnav'>";
	foreach($items as $item){
	if($item['parent'] == 0){
		echo "<li>
			<a href='".$item['link']."'>".$item['name']."</a>";
			$id = $item['id'];
			sub($items, $id);
		echo "</li>";
	}
	}
	echo "<li class='icon'><a href='javascript:void(0);' onclick='myFunction()'>&#9776;</a></li></ul>";
	
	function sub($items, $id){
		echo "<ul>";
		foreach($items as $item){
			if($item['parent'] == $id){
				echo "<li>
					<a href='".$item['link']."'>".$item['name']."</a>";
					sub($items, $item['id']);
				echo "</li>";
			}
		}
		echo "</ul>";
	}
?>
<?php
	$img = "Resource/Images/Flag/de.png";
	$im = imagecreatefrompng($img);

	header('Content-Type: image/png');

	imagepng($im);
	imagedestroy($im);	
?>
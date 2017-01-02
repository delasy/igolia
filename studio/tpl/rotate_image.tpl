<?php
$mime_type = (isset($_GET['mime_type'])) ? $_GET['mime_type'] : '';

$add_to_name = (isset($_GET['add_to_name'])&&defined($_GET['add_to_name'])) ? constant($_GET['add_to_name']) : '';


if(!isset($_GET['image'])||!$_GET['image']||!file_exists($filename = IMG.$_GET['image'].$add_to_name.'.'.$mime_type))refuse();
	
if($mime_type==='png'){
	$degrees = (isset($_GET['degree'])&&ctype_digit($_GET['degree'])) ? $_GET['degree'] : 180;

	$source = imagecreatefrompng($filename);
	imagealphablending($source, false);
	imagesavealpha($source, true);

	$rotation = imagerotate($source, $degrees, imageColorAllocateAlpha($source, 0, 0, 0, 127));
	imagealphablending($rotation, false);
	imagesavealpha($rotation, true);

	header('Content-type: image/png');
	imagepng($rotation);
	imagedestroy($source);
	imagedestroy($rotation);
	
	die();
}else if($mime_type==='jpg'){
	$degrees = (isset($_GET['degree'])&&ctype_digit($_GET['degree'])) ? $_GET['degree'] : 180;
	
	header('Content-type: image/jpeg');
	
	$source = imagecreatefromjpeg($filename);
	$rotate = ($degrees&&$degrees!==270)?imagerotate($source, $degrees, 0):$source;

	imagejpeg($rotate);
	imagedestroy($source);
	imagedestroy($rotate);
	
	die();
}

refuse();
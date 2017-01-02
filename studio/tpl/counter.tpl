<?php
$i = imagecreatetruecolor(120, 40);
$bda180 = array(189,161,128);

$background = $bda180;

$total = pdo('SELECT COUNT(*) FROM'.TB_COUNTER,0,1,'COUNT(*)');
$today = pdo('SELECT COUNT(*) FROM'.TB_COUNTER.'WHERE `year` = ? AND `month` = ? AND `day` = ?',array(date('Y'),date('m'),date('d')),1,'COUNT(*)');
$users = pdo('SELECT COUNT(*) FROM'.TB_COUNTER.'WHERE `is_unique` = "1"',0,1,'COUNT(*)');

$strings = array($total,$today,$users);
$strings_color = array('255','255','255');
$font_size = 3;
$left_padding = 3;

$margin_top = array(2,12,24);


imagefill($i,0,0,imagecolorallocate($i,$background[0],$background[1],$background[2]));

imagestring($i,$font_size,$left_padding,$margin_top[0],$strings[0],imagecolorallocate($i,$strings_color[0],$strings_color[1],$strings_color[2]));
imagestring($i,$font_size,$left_padding,$margin_top[1],$strings[1],imagecolorallocate($i,$strings_color[0],$strings_color[1],$strings_color[2]));
imagestring($i,$font_size,$left_padding,$margin_top[2],$strings[2],imagecolorallocate($i,$strings_color[0],$strings_color[1],$strings_color[2]));

$logo = imagecreatefrompng(IMG.'short-logo.png');
$marge_right = 3;
$marge_top = 3;
$gabarite_new_logo = 34;

imagecopyresized($i, $logo, imagesx($i) - $gabarite_new_logo - $marge_right, $marge_top, 0, 0,$gabarite_new_logo,$gabarite_new_logo,imagesx($logo), imagesy($logo));


header('Content-Type: image/jpeg');

imagejpeg($i);
imagedestroy($i);
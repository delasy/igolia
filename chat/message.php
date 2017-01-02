<?
if(isset($_POST["message"]) && isset($_POST["update"]) && isset($_POST["mesid"])&& isset($_POST["submit"]) ){
	include "func.php";
	db()->query("UPDATE `". MES ."` SET `message` = '". $_POST["message"] ."' WHERE `id` = '". $_POST["mesid"] ."'");
	die("success");
}
if( isset($_GET["delete"]) && isset($_GET["mesid"]) ){
	include "func.php";
	db()->query("DELETE FROM `". MES ."` WHERE `id` = '". $_GET["mesid"] ."' LIMIT 1");
	die("success");
}
if(isset($_POST["message"]) && isset($_COOKIE["data"]) && isset($_COOKIE["data2"]) && isset($_COOKIE["data3"]) && isset($_POST["submit"]) ){
	include "func.php";
	$time = date("Ymd").( date("H")-7 ).date("is");
	if( db()->query("INSERT INTO `". MES ."` (`id`,`message`,`user_id`,`time`) VALUES (null,'". htmlspecialchars($_POST["message"],ENT_QUOTES) ."','". $_COOKIE["data3"] ."','". $time ."')") ){
		db()->query("UPDATE `". USERS ."` SET `ipv4` = '". $_SERVER["REMOTE_ADDR"] ."' WHERE `id` = '". $_COOKIE["data3"] ."'");
		die("success");
	}
}
die("Неизвестная ошибка");
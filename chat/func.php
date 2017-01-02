<?php
/* define("DB_SERVER", "mysql.hostinger.com.ua"); */
define("DBHOST","localhost");
define("DBNAME","u533043863_viy");
define("DBUSER","u533043863_viy");
define("DBPASS","secret");
define('SECURE_AUTH_KEY','1eij1ioej10ije0idj1ij)!$^%&*(%$DFBUHYVYTI%^@YIVTUPIJB*^T@*HB@P(*&YHYTD$^*%@');

define("WDIR","/chat/");
define("USERS","viy_users");
define("MES","viy_messages");

function db(){
    $db = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME,DBUSER,DBPASS);
    $db->exec("set names utf8");
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    	return $db;
}
function set_cookie($name,$value,$expires){

	if($expires){
		$expires=time()+($expires*86400);
	}else{
		$expires=time();
	}

	if(PHP_VERSION < 5.2){
		setcookie($name,$value,$expires,"/",";HttpOnly");
	}else{
		setcookie($name,$value,$expires,"/","",NULL,TRUE);
	}
}
function pdo($pdo,$query,$callback=0){
	$a=$pdo->prepare($query);
	if($callback!=0){
		foreach($callback as$arr){
			$val[].=htmlspecialchars($arr,ENT_QUOTES);
		}
		$a->execute($val);
	}else{
		$a->execute();
	}
	$data=$a->fetchAll();
	return$data;
}

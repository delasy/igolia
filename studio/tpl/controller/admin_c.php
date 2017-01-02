<?php
function admin_page(){
	set_cookie('alogin','',0);
	set_cookie('apass','',0);
	set_cookie('atoken','',0);
	
	$tpls = array('admin_');
	autoload(array('head'=>array('title.Admin Panel','no_main_styles'=>true,$tpls),'body'=>$tpls));
	
	exit;
}
if( isset($_GET['IJ']) ){
	admin_page();
}
if( isset($_POST['l']) && $_POST['l'] && isset($_POST['p']) && $_POST['p'] && !isset($_COOKIE['token']) ){
	$login = pdo('SELECT * FROM'.TB_SETTINGS.'WHERE `prop`="admin_login" LIMIT 1',0,1,'value');
	$pass = pdo('SELECT * FROM'.TB_SETTINGS.'WHERE `prop`="admin_pass" LIMIT 1',0,1,'value');
	
	if( $_POST['l'] === $login && $_POST['p'] === $pass ){
		$token = md5( $login . $pass . time() );
		
		pdo('UPDATE'.TB_SETTINGS.'SET `value` = ? WHERE `prop`="admin_token" LIMIT 1',array($token));
		set_cookie('alogin',$login,365);
		set_cookie('apass',$pass,365);
		set_cookie('atoken',$token,365);
		
		refuse(_ADMIN);
	}else{
		refuse(_ADMIN_N);
	}
}
$access = 0;
if( isset($_COOKIE['alogin']) && $_COOKIE['alogin'] && isset($_COOKIE['apass']) && $_COOKIE['apass'] && isset($_COOKIE['atoken']) && $_COOKIE['atoken']  ){
	$login = pdo('SELECT * FROM'.TB_SETTINGS.'WHERE `prop`="admin_login" LIMIT 1',0,1,'value');
	$pass = pdo('SELECT * FROM'.TB_SETTINGS.'WHERE `prop`="admin_pass" LIMIT 1',0,1,'value');
	$token = pdo('SELECT * FROM'.TB_SETTINGS.'WHERE `prop`="admin_token" LIMIT 1',0,1,'value');
	
	if( $_COOKIE['alogin'] !== $login || $_COOKIE['apass'] !== $pass || $_COOKIE['atoken'] !== $token )refuse();
}else{
	refuse();
}
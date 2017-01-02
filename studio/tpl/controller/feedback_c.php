<?php
if(
	isset($_POST['im']) &&
	isset($_POST['postcode']) &&
	$_POST['im'] &&
	$_POST['postcode'] &&
	!empty( pdo('SELECT * FROM'.TB_FB_USERS.'WHERE `postcode` = ? LIMIT 1',array($_POST['postcode'])) ) &&
	empty( pdo('SELECT * FROM'.TB_FB.'WHERE `postcode` = ? LIMIT 1',array($_POST['postcode'])) )
){
	pdo( 'INSERT INTO'.TB_FB.'(`postcode`,`im`,`ip`,`time`) VALUES (?,?,?,?)',array($_POST['postcode'],$_POST['im'],$_SERVER['REMOTE_ADDR'],time()) );
	
	refuse(_AFTERFEEDBACK);
}
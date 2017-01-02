<?php
if(isset($_GET['language']) && $_GET['language']){
	$pdo = pdo('SELECT * FROM'.TB_LANG.'WHERE `shortname`=? LIMIT 1',array($_GET['language']));
	
	if(!empty($pdo)){
		set_cookie('lang',$_GET['language'],365);refuse(_REFERER);
	}
}else if(isset($_GET['currency']) && $_GET['currency']){
	$pdo = pdo('SELECT * FROM'.TB_CURR.'WHERE `shortname`=? LIMIT 1',array($_GET['currency']));
	
	if(!empty($pdo)){
		set_cookie('curr',$_GET['currency'],365);refuse(_REFERER);
	}
}
refuse();
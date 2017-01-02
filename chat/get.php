<?php
if( isset( $_GET["id"] ) ){
	include "func.php";
	
	$content=db()->query("SELECT * FROM `". MES ."` WHERE (`id` > '". $_GET["id"] ."') ORDER BY `id` DESC");
	$content=$content->fetchAll();
	/* echo "<pre>";
	print_r($content);
	echo "</pre>"; */
	foreach( $content as $a=>$_ ){
		$image = db()->query("SELECT * FROM `". USERS ."` WHERE `id` = '". $_["user_id"] ."' LIMIT 1");
		$image = $image->fetchAll();
		$image = $image[0]["image"];
		
		if($_["user_id"] == $_COOKIE["data3"]){
?><div class="messages_wrap" id="<?=$_['id']?>"><div class="author"><p oncontextmenu="return menu(this)"><?=$_["message"]?></p><span><?=substr(substr(substr($_["time"],-6),0,4),0,2).":".substr(substr(substr($_["time"],-6),0,4),2);?></span><img src="<?=$image?>" /></div></div><?
		}else{
?><div class="messages_wrap" id="<?=$_['id']?>"><div class="not_author"><img src="<?=$image?>" /><span><?=substr(substr(substr($_["time"],-6),0,4),0,2).":".substr(substr(substr($_["time"],-6),0,4),2);?></span><p><?=$_["message"]?></p></div></div><?
		}
	}
}
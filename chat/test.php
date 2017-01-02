<?php include "func.php";
$time = "1468083191";

$this_id=db()->query("SELECT * FROM `". MES ."` WHERE `time` = '$time' LIMIT 1");$this_id=$this_id->fetchAll();
$this_id = $this_id[0]["id"];
$last_id=db()->query("SELECT * FROM `". MES ."` ORDER BY `id` DESC  LIMIT 1");$last_id=$last_id->fetchAll();
$last_id = $last_id[0]["id"];
if($this_id < $last_id){
	?><div></div><?
}
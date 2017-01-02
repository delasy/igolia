<? include "func.php";
if( isset($_GET["userid"]) && isset($_GET["type"]) && isset($_GET["val"]) ){
	db()->query("UPDATE `". USERS ."` SET `". $_GET["type"] ."` = '". $_GET["val"] ."' WHERE `id` = '". $_GET["userid"] ."'");
	die();
}?>
<script>location.href = "<?=WDIR?>";</script>
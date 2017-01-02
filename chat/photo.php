<? include "func.php";

if( isset($_FILES["fileToUpload"]["name"]) ){
	$target_dir = $_SERVER["DOCUMENT_ROOT"].WDIR."tmp/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	function random($length){$characters='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';$charactersLength=strlen($characters);$randomString='';for($i=0;$i<$length;$i++){$randomString.=$characters[rand(0,$charactersLength-1)];}return $randomString;}
	$random = random(14);
	
	db()->query("UPDATE `". USERS ."` SET `image` = '". "tmp/".$random.".".$imageFileType ."' WHERE `id` = '". $_COOKIE["data3"] ."' LIMIT 1");

	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$random.".".$imageFileType);
}

echo "<script>location.href='".WDIR."';</script>";
<?php
if(isset($_POST['submit_order_site_button'])){
	unset($_POST['submit_order_site_button']);
	
	if(substr($_SERVER['HTTP_REFERER'],0,DOMAIN_FNL)!==DOMAIN_FN)refuse();
	
	
	$test = (isset($_GET['test'])) ? true : false;
	
	$array = array('to_make','budget','time','tp');
	foreach($array as $value){
		if(!isset($_POST[$value])||!$_POST[$value])exit($value);
	}
	
	$array = array('good1','bad1');
	foreach($array as $value){
		if(!isset($_POST[$value])||!$_POST[$value])exit('examples');
	}
	
	if($test)exit('OK');
	
	if(isset($_POST['necessary'])){
		$_POST['necessary'] = implode(',',$_POST['necessary']);
	}
	
	
	if($_FILES['tp_file_target']['size'] > 0 && $_FILES['tp_file_target']['error'] === 0){
		$fileType = pathinfo('/'.basename($_FILES['tp_file_target']['name']),PATHINFO_EXTENSION);
		$target_file = TZ . rand_str(12) .'.'. $fileType;
		
		$max_file_size = (int)pdo('SELECT `value` FROM'.TB_SETTINGS.'WHERE `prop` = "maximum_tz_upload_size" LIMIT 1',0,1,'value');
	
		if($_FILES['tp_file_target']['size'] < $max_file_size){
			move_uploaded_file($_FILES['tp_file_target']['tmp_name'],$target_file);
			
			$_POST['uploaded_file'] = $target_file;
		}
	}
	
	pdo('INSERT INTO'.TB_ORDERS.'(`json`) VALUES (?)',array(json_encode($_POST)));
	
	include(CLASSES.'swift.php');
	$info = array('subject' => 'New site order!','u_to' => 'Info Igolia','e_to' =>email,'u_from' =>'Administrator','e_from' =>NOREPLY_EMAIL);
	$content = 'New site order!';
	
	send_swift($info,$content,strip_tags($content));
	
	
	refuse(_GOODORDER);
}
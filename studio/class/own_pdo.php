<?php
function apdo(string $action_type,string $tb_name,array $params){
	$result = false;
	
	switch(mb_convert_case($action_type,MB_CASE_LOWER,encoding)){
		case 'insert':
			
			$keys = array();
			$qua = array();
			foreach($params as $k=>$v){
				array_push($keys,$k);
				array_push($qua,'?');
			}
			$keys = implode('`,`',$keys);
			$keys = '`'.$keys.'`';
			
			$qua = implode(',',$qua);
			
			$sql = 'INSERT INTO'.$tb_name.'('.$keys.') VALUES ('.$qua.')';
			$result = pdo($sql,$params);
			
			
			break;
	}
	
	return $result;
}
function pdo($query,$array=0,$cut_index = 0,$cut_index2 = 0,$language = 0){
	$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
    $db->exec('set names utf8');
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	
    $a=$db->prepare($query);
	if( is_array($array) ){
		$val = array();
		foreach($array as $arr=>$value)$val[].=htmlspecialchars($value,ENT_QUOTES);
		$a->execute($val);
	}else $a->execute();
	
	
	if($language === 1){
		$sth = $db->prepare($query);
		$sth->execute();
		$db=null;
		
		return $sth->fetchAll(PDO::FETCH_COLUMN, 0);
	}
	
	$db = null;
	
	if( substr( strtolower($query),0,6 ) === "delete" || substr( strtolower($query),0,6 ) === "update" || substr( strtolower($query),0,6 ) === "insert" )return true;
	
	$data=$a->fetchAll();//$data=$a->fetch(PDO::FETCH_ASSOC);
	
	if(!empty($data)){
		if( $cut_index ){
			if( array_key_exists(0,$data) ){
				if( $cut_index2 ){
					if( array_key_exists($cut_index2,$data[0]) ){
						return $data[0][$cut_index2];
					}
				}
				return $data[0];
			}
		}
	}
	return $data;
}
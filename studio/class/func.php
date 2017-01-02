<?php
include(CLASSES.'load.php');
include(CLASSES.'own_pdo.php');
include(CLASSES.'css_compressor.php');
include(CLASSES.'header_compressor.php');
include(CLASSES.'route.php');
include(CLASSES.'VisitsCounter.php');

function refuse($s=0){if(!$s)return die(include_once(__ERROR));else return die(header($s));}
function print_p($a){echo'<pre>';print_r($a);echo'</pre>';}

function generate_cart($img,$text,$num=false,$class='',$link=false){
	
	if($link){
		?><a href="<?=$link?>"><?php
	}
	
	?><div class="tab <?=$class?>"><?php
		if($num){
			?><div class="num"><p><?=$num?></p></div><?php
		}
	
		if(substr($img,0,5)==='icon.'){
			?><div class="icon_container"><i class="material-icons"><?=substr($img,5)?></i></div><?php
		}else if(substr($img,0,5)==='text.'){
			?><div class="icon_container"><span></span><h5><?=substr($img,5)?></h5></div><?php
		}else{
			?><div class="icon_container"><span></span><img src="<?=$img?>"></div><?php
		}
		?><div class="_text"><h3><?=$text?></h3></div>
	</div><?php
	
	if($link){
		?></a><?php
	}
	
	return true;
}

function convert_price($quantity,$delimiter){
	$quantity=round($quantity/c);
	return $quantity .$delimiter. cc;
}
function length($s){
	return mb_strlen($s,encoding);
}
function convert_type($str,$c_t = '1'){
	return ($c_t === '0') ? mb_convert_case($str,MB_CASE_TITLE,encoding) : str_convert_case($str);
}
function str_convert_case($str,$type = 0){
	$f = mb_substr($str,0,1,encoding);
	$f = mb_convert_case($f,MB_CASE_UPPER,encoding);
	
	$end = mb_substr($str,1, mb_strlen($str,encoding) ,encoding);
	
	return $f.$end;
}
function set_cookie($name, $value, $expires){
	if($expires)$expires = time() + ($expires * 86400);
	else $expires = time();
	if(PHP_VERSION < 5.2)setcookie( $name, $value, $expires, "/", "; HttpOnly" );
	else setcookie( $name, $value, $expires, "/", "", NULL, TRUE );
}
function rand_str($length = 10){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
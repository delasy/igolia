<?php
function autoload($obj){
	if( defined("PAGE_NAME") && file_exists(CONTROLLER.PAGE_NAME.'_c.php') ){
		include_once( CONTROLLER . PAGE_NAME .'_c.php' );
	}
	if(!defined("robots")||!robots){
		$j = 'Noindex,Nofollow,Noimageindex';
	}else{
		$j = 'Index,Follow,Noimageindex';
	}

	$dandai = '<!--[if lt IE 9]><script>window.location = "/oldbrowser";</script><![endif]--><noscript><meta http-equiv="refresh" content="0; URL=/oldbrowser"></noscript>';
	$dandai = ($_SERVER['REQUEST_URI']!=='/oldbrowser')?$dandai:'';

	$t = '<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="'.LANG.'" lang="'.LANG.'">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="IE=edge" http-equiv="X-UA-Compatible" />
	<meta name="robots" content="'.$j.'" />
	<meta name="Googlebot" content="'.$j.'" />
	<meta name="Revisit" content="10" />
	<meta name="HandheldFriendly" content="true" />
	<meta name="author" content="delasy" />

	'.$dandai.'

	<meta name="theme-color" content="#bda180" />
	<meta name="msapplication-TileColor" content="#bda180" />
	<meta name="msapplication-navbutton-color" content="#bda180" />
	<meta name="apple-mobile-web-app-status-bar-style" content="#bda180" />

	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<meta name="mobile-web-app-capable" content="yes">

	<meta name="application-name" content="igolia.nginx.conf">
	<meta name="apple-mobile-web-app-title" content="igolia.nginx.conf" />
	<meta property="og:site_name" content="igolia.nginx.conf">

	<meta name="version" content="1"/>


	<link rel="apple-touch-icon" href="'.DOMAIN_FN.'include/img/short-logo.png">
	<link rel="icon" sizes="192x192" href="'.DOMAIN_FN.'include/img/short-logo.png">
	<meta name="msapplication-square310x310logo" content="'.DOMAIN_FN.'include/img/short-logo.png" />
	<link rel="shortcut icon" href="'.DOMAIN_FN.'include/img/short-logo.png" />
	<meta name="msapplication-TileImage" content="'.DOMAIN_FN.'include/img/short-logo.png">
	<meta property="og:image" content="'.DOMAIN_FN.'include/img/short-logo.png"/>

	<meta name="viewport" content="width=device-width, initial-scale=1" />


	<!--screenshot-->
	<link rel="apple-touch-startup-image" href="'.DOMAIN_FN.'include/img/short-logo.png" />

	<meta property="og:url" content="'.DOMAIN_FN.'" />
	<meta property="og:type" content="website" />



	';

	echo header_compressor($t);

	$css=(array_key_exists('head',$obj)&&!array_key_exists('no_main_styles',$obj['head']))?array('head.css','fonts.css','grid.css','common/header.css','common/footer.css','_.css'):array();
	$js =(array_key_exists('head',$obj)&&!array_key_exists('no_main_styles',$obj['head']))?array('prototype_ajax.js','prototype_animate.js','head.js','common/header.js','common/footer.js'):array();

	if(array_key_exists('head',$obj)){
		foreach($obj['head'] as $a){
			if( is_array($a) ){
				foreach($a as $b){
					array_push($js,'inc/'.$b.'.js');
					array_push($css,'inc/'.$b.'.css');
				}
			}else if( substr($a,0,6) === 'title.' ){
				$dalkj = substr($a,6). prefix;
				echo '<title>' . $dalkj . '</title>';
				echo '<meta property="og:title" content="' . $dalkj . '"/>';
				echo '<meta name="title" content="' . $dalkj . '"/>';
			}else if( substr($a,0,3) === 'kw.' ){
				$dalkjd = substr($a,3);
				echo '<meta name="keywords" content="' .$dalkjd. '"/>';
				echo '<meta property="og:keywords" content="' .$dalkjd. '"/>';
			}else if( substr($a,0,5) === 'desc.' ){
				$dalkjda = substr($a,5);
				echo '<meta name="description" content="' .$dalkjda. '"/>';
				echo '<meta property="og:description" content="' .$dalkjda. '"/>';
			}else if(substr($a,-3)==='.js'){
				array_push($js,$a);
			}else if(substr($a,-4)==='.css'){
				array_push($css,$a);
			}
		}
	}
	echo '<style>';
	foreach($css as $scss){
		if(file_exists(CSS.$scss)){
			//include_once(CSS.$scss);
			echo css_compressor(file_get_contents(CSS.$scss));
		}
	}
	echo '</style>';

	if((array_key_exists('head',$obj)&&array_key_exists('with_overflow',$obj['head']))){
		echo '</head><body>';
	}else{
		echo '</head><body style="overflow:hidden">';
	}



	if((array_key_exists('head',$obj)&&!array_key_exists('no_main_styles',$obj['head']))){

		include_once(TPL.'_.tpl');
		include_once(TPL.'common/header.tpl');

		echo '<main>';
	}


	if(array_key_exists('body',$obj)){
		foreach($obj['body']as$a){
			if(file_exists(TPL_INC.$a.'_t.php')){
				include_once(TPL_INC.$a.'_t.php');
			}
		}
	}


	if((array_key_exists('head',$obj)&&!array_key_exists('no_main_styles',$obj['head']))){
		echo '</main>';

		include_once(TPL.'common/footer.tpl');
	}


	echo '<script>';
	foreach($js as $sjs){
		if(file_exists(JS.$sjs)){
			include_once(JS.$sjs);
		}
	}
	echo '</script>';

	echo '</body></html>';

	return true;
}

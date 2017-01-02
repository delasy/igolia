<?php

Class Route{
	function __construct(){
		$route = (
			$_SERVER['REQUEST_URI'] === '/' ||
			$_SERVER['REQUEST_URI'] === '/index.php' ||
			$_SERVER['REQUEST_URI'] === '/index.html' ||
			$_SERVER['REQUEST_URI'] === '/index.htm' ||
			$_SERVER['REQUEST_URI'] === '/index.pl' ||
			$_SERVER['REQUEST_URI'] === '/index.js' ||
			$_SERVER['REQUEST_URI'] === '/index.css'
		) ? 'index' : mb_substr( $_SERVER['REQUEST_URI'], 1, mb_strlen( $_SERVER['REQUEST_URI'],encoding ),encoding);

		if(strpos($route,'?')){
			$route=explode("?",$route,2);
			$route=$route[0];
		}
		
		define('ROUTE',$route);

		$file = TPL.ROUTE.'.tpl';
		
		if( file_exists($file) )return include_once $file;
		else if( substr(ROUTE,0,9) === 'services/' )return include_once TPL.'service.tpl';
		else return refuse();
	}
}
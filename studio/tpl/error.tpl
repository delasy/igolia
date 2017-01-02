<?php

define('PAGE_NUM',-1);
define('PAGE_NAME','error');


$tpls = array(PAGE_NAME);

autoload(
	array(
		'head'=>array(
			'title.404 Not Found',
			'no_main_styles'=>true,
			$tpls
		),
		'body'=>$tpls
	)
);
<?php

define('PAGE_NUM',-1);
define('PAGE_NAME','admin');

$tpls = array(
	'admin'
);

autoload(
	array(
		'head'=>array(
			'title.Administrator',
			'no_main_styles'=>true,
			'with_overflow'=>true,
			$tpls
		),
		'body'=>$tpls
	)
);
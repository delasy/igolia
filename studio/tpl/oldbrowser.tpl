<?php

define('PAGE_NUM',-1);
define('PAGE_NAME','oldbrowser');


$tpls = array(PAGE_NAME);

autoload(
	array(
		'head'=>array(
			'title.'.convert_type(t[170]),
			'no_main_styles'=>true,
			$tpls
		),
		'body'=>$tpls
	)
);
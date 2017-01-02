<?php

define('PAGE_NUM',1);
define('PAGE_NAME','portfolio');

$tpls = array(
	'portfolio',
);

$page_params = pdo('SELECT * FROM'.TB_MENU.'WHERE `id`='.PAGE_NUM.' LIMIT 1',0,1);
autoload(
	array(
		'head'=>array(
			'title.'.convert_type(t[$page_params['num']],$page_params['convert_type']),
			'kw.'.pdo('SELECT `value` FROM'.TB_SETTINGS.'WHERE `prop`="meta-keywords" LIMIT 1',0,1,'value'),
			'desc.'.pdo('SELECT `value` FROM'.TB_SETTINGS.'WHERE `prop`="meta-description" LIMIT 1',0,1,'value'),
			$tpls
		),
		'body'=>$tpls
	)
);
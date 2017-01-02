<?php

define('PAGE_NUM',6);
define('PAGE_NAME','index');

$tpls = array(
	'index_slider_ad',
	'index_advantages',
	'index_how_we_work',
	'index_progress',
	'index_prices',
	'index_our_works',
	'index_soft',
	'index_company_description',
	'index_partners'
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
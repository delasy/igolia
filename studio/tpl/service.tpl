<?php
define('SERVICE',substr(ROUTE,9));
$servobj = pdo('SELECT * FROM'.TB_SERVICES.'WHERE `url` = ? LIMIT 1',array(SERVICE),1) OR refuse();

define('PAGE_NUM',-1);
define('PAGE_NAME','service');

define('SERVICE_NAME',convert_type(t[ $servobj['name'] ]));

$tpls = array(
	'service'
);

autoload(
	array(
		'head'=>array(
			'title.'.SERVICE_NAME,
			'kw.'.pdo('SELECT `value` FROM'.TB_SETTINGS.'WHERE `prop`="meta-keywords" LIMIT 1',0,1,'value'),
			'desc.'.pdo('SELECT `value` FROM'.TB_SETTINGS.'WHERE `prop`="meta-description" LIMIT 1',0,1,'value'),
			$tpls
		),
		'body'=>$tpls
	)
);
<?php
$pp = '';
$array = array(
	array('n'=>'Chrome','l'=>'https://www.google.ru/chrome'),
	array('n'=>'Opera','l'=>'http://www.opera.com/'),
	array('n'=>'Firefox','l'=>'https://www.mozilla.org/'),
	array('n'=>'Yandex','l'=>'https://browser.yandex.ua/'),
	array('n'=>'Safari','l'=>'https://support.apple.com/downloads/safari')
);

foreach($array as $k=>$v){
	$pp.='<a href="'.$v['l'].'" target="_blank" class="good_browser">';
	$pp.=	'<div class="browser_icon '.mb_convert_case($v['n'],MB_CASE_LOWER,encoding).'"></div>';
	$pp.=	'<div class="browser_name">'.$v['n'].'</div>';
	$pp.='</a>';

}

$p = '<div class="oldbrowser">';
$p.=	'<div class="inner">';
$p.=		'<div class="inner_div">';
$p.=			'<div class="header"><img class="header_image" src="'.DOMAIN_FN.'include/img/main_logo_white.png"></div>';
$p.=			'<div class="content">';
$p.=				'<h1>'.convert_type(t[171]).'</h1>';
$p.=				'<h2>'.convert_type(t[172]).'</h2>';
$p.=				'<div class="good_browsers">';
$p.=				$pp;
					
$p.=				'</div>';
$p.=			'</div>';
$p.=		'</div>';
$p.=	'</div>';
$p.='</div>';

echo $p;
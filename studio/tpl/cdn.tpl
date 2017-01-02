<?php
header('Content-Type: application/javascript');
function cdie($s){
	return die('console.error("'.$s.'")');
}

$re = $_SERVER['HTTP_REFERER'];

$parts = parse_url($_SERVER["REQUEST_URI"]);

if(!isset($parts['query']))cdie('No query is specified');

parse_str($parts['query'],$r);

if(!isset($r['key'])||!$r['key'])cdie('Could not obtain key...');
$k=$r['key'];
if(!isset($r['module'])||!$r['module'])cdie('Could not obtain module name...');
$m=$r['module'];

$d = pdo('SELECT `domain` FROM'.TB_API.'WHERE `module`=? AND `datakey`=? LIMIT 1',array($m,$k),1,'domain');

if(!$d)cdie('No such key that specified for this module');

$dl=mb_strlen($d,encoding);

if( mb_substr($re,0,$dl,encoding) !== $d )cdie('This domain is not specified for this key and module name');

include(CDN.$m.'.tpl');


?>
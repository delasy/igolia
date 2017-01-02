<?php
function header_compressor($s){
	$s = trim(preg_replace('/\s+/', ' ',$s));
	$s = str_replace("\n", '', $s);
	$s = str_replace("\t", '', $s);
	$s = str_replace('  ', '', $s);
	$s = str_replace('> <', '><', $s);
	
	return $s;
}
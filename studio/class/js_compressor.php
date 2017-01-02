<?php
function js_compressor($js){
	/* $css = trim(preg_replace('/\s+/', ' ',$css));
	$css = str_replace("\n", '', $css);
	$css = str_replace("\t", '', $css);
	$css = str_replace(';}', '}', $css);
	$css = str_replace('  ', '', $css);
	$css = str_replace('} ', '}', $css);
	$css = str_replace('0.', '.', $css);
	$css = str_replace(', ', ',', $css);
	$css = str_replace(': ', ':', $css);
	$css = str_replace('; ', ';', $css); */
	$js = preg_replace('/^\/\*.*\*\/$/m', '', $js);
	
	return $js;
}
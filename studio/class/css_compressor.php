<?php
function css_compressor($css){
	$css = trim(preg_replace('/\s+/', ' ',$css));
	$css = str_replace("\n", '', $css);
	$css = str_replace("\t", '', $css);
	$css = str_replace(';}', '}', $css);
	$css = str_replace('  ', '', $css);
	$css = str_replace('} ', '}', $css);
	$css = str_replace('0.', '.', $css);
	$css = str_replace(', ', ',', $css);
	$css = str_replace(': ', ':', $css);
	$css = str_replace('; ', ';', $css);
	
	return $css;
}
/*
include_once(FUNC.'css_compressor.php');

$css =file_get_contents(CSS.'test.css');

echo '<p>';
echo css_compressor($css);
echo '</p>';
*/
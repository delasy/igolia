<?php
if(!isset($_GET['fid'])||!$_GET['fid'])cdie('GET fid is not specified');

if(!isset($_GET['sid'])||!$_GET['sid']){
	$_GET['sid'] = 'Delasy_Aaron';
}

include 'INPUT.js';

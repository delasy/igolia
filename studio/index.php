<?php session_start();
// refuse()
// rns remove text_align classes
// convert_type remove second value
// translations
// [header] [button]

/*
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
*/

ini_set('display_errors',0);
ini_set('display_startup_errors',0);
error_reporting(0);

define('robots',0);
define('email','info.igolia.nginx.conf@gmail.com');
define('phone1','+38 068 144-86-61');
define('DB_HOST','localhost');
define('DB_NAME','igolia.nginx.conf');
define('DB_USER','igolia.nginx.conf');
define('DB_PASS','97IgoliA16');
require_once('const.php');

new Route;
new VisitsCounter;

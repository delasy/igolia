<?php
define('ROOT','/var/www/igolia.com/public_html/');
define('CLASSES',ROOT.'class/');
define('INC',ROOT.'include/');
define('IMG',INC.'img/');
define('PARTNERS',IMG.'partners/');
define('CSS',INC.'css/');
define('JS',INC.'js/');
define('TPL',ROOT.'tpl/');
define('TPL_INC',TPL.'inc/');
define('SPEAKER',ROOT.'speaker_use/');
define('CDN',ROOT.'cdn_include/');
define('CONTROLLER',TPL.'controller/');
define('TZ',ROOT.'techtasks/');

define('PREFIX','igolia_');
define('TB_SETTINGS',' `'.PREFIX.'settings` ');
define('TB_TRANSLATE',' `'.PREFIX.'translate` ');
define('TB_MENU',' `'.PREFIX.'menu` ');
define('TB_SERVICES',' `'.PREFIX.'services` ');
define('TB_FB',' `'.PREFIX.'feedback` ');
define('TB_FB_USERS',' `'.PREFIX.'feedback_users` ');
define('TB_BRIF',' `'.PREFIX.'brif` ');
define('TB_SLIDER',' `'.PREFIX.'slider` ');
define('TB_API',' `'.PREFIX.'api` ');
define('TB_ORDERS',' `'.PREFIX.'site_order` ');
define('TB_PAGE_CONTENT',' `'.PREFIX.'page_content` ');
define('TB_PORTFOLIO',' `'.PREFIX.'portfolio` ');
define('TB_COUNTER',' `'.PREFIX.'counter` ');
define('TB_CURR',' `'.PREFIX.'currency` ');
define('TB_LANG',' `'.PREFIX.'language` ');


define('encoding','UTF-8');
define('prefix',' - Igolia');
define('DOMAIN_PROTOCOL','http://');
define('DOMAIN','www.igolia.com');
define('NOREPLY_EMAIL','noreply@'.DOMAIN);
define('DOMAIN_FN',DOMAIN_PROTOCOL.DOMAIN.'/');
define('DOMAIN_FNL',mb_strlen(DOMAIN_FN,encoding));

include_once CLASSES.'func.php';

if(!isset($_SERVER['HTTP_REFERER']) || !$_SERVER['HTTP_REFERER'])$_SERVER['HTTP_REFERER'] = '/';

define('_ADMIN','Location: /admin');
define('_ADMIN_N','Location: /admin?IJ');
define('_REFERER','Location: '.$_SERVER['HTTP_REFERER']);
define('_COOKIE','Location: /cookie?change_cookie=ru');
define('_GOODORDER','Location: /order_site?success=true');
define('_AFTERFEEDBACK','Location: /feedback');

define('__ERROR',TPL.'error.tpl');




$lang = (isset($_COOKIE['lang']) && $_COOKIE['lang']) ? pdo('SELECT * FROM'.TB_LANG.'WHERE `shortname` = ? LIMIT 1',array($_COOKIE['lang']),1,'shortname') : 'ru';
$lang = (gettype($lang)=='array')?'ru':$lang;
define('LANG',$lang);
define('t',pdo('SELECT `'.LANG.'` FROM'.TB_TRANSLATE.'ORDER BY `id` ASC',0,0,0,1));


$curr = (isset($_COOKIE['curr']) && $_COOKIE['curr']) ? pdo('SELECT * FROM'.TB_CURR.'WHERE `shortname` = ? LIMIT 1',array($_COOKIE['curr']),1,'shortname') : 'UAH';
$curr = (gettype($curr)=='array')?'UAH':$curr;
define('CURR',$curr);
define('c',(float)pdo('SELECT * FROM'.TB_CURR.'WHERE `shortname`="'.CURR.'" LIMIT 1',0,1,'delimiter'));
define('cc',pdo('SELECT * FROM'.TB_CURR.'WHERE `shortname`="'.CURR.'" LIMIT 1',0,1,'extension'));

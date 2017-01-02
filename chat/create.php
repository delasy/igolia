<? include "func.php";

foreach( pdo(db(),"SHOW TABLES") as $a=>$_ ){
	db()->exec("DROP TABLE `".$_[0]."`");
}

$sql ="CREATE TABLE IF NOT EXISTS `".USERS."` (
 `id` int(11) NOT NULL auto_increment,
 `first_name` varchar(255) collate utf8_general_ci NOT NULL default '',
 `sur_name` varchar(255) collate utf8_general_ci NOT NULL default '',
 `login` varchar(255) collate utf8_general_ci NOT NULL default '',
 `image` varchar(255) collate utf8_general_ci NOT NULL default '".WDIR."tmp/default.jpg',
 `ipv4` int(11) UNSIGNED NOT NULL default '0',
 PRIMARY KEY  (`id`),
 UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;" ;
db()->exec($sql);

db()->query("INSERT INTO `".USERS."` (`id`, `first_name`, `sur_name`, `login`, `image`, `ipv4`) VALUES
(1, 'Aaron', 'Delasy', 'delasy', '". WDIR ."tmp/default.jpg', '127.0.0.1'),
(2, 'Julia', 'Delasy', 'love', '". WDIR ."tmp/default.jpg', '127.0.0.1');");

$sql ="CREATE TABLE IF NOT EXISTS `".MES."` (
 `id` int(11) NOT NULL auto_increment,
 `message` varchar(255) collate utf8_general_ci NOT NULL default '',
 `user_id` varchar(255) collate utf8_general_ci NOT NULL default '',
 `time` varchar(255) collate utf8_general_ci NOT NULL default '',
 PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;" ;
db()->exec($sql);

echo "<script>location.href='".WDIR."';</script>";

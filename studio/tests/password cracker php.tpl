<?php
set_time_limit(0);

if(!isset($_GET['passw'])):
$r = $_POST;
if(isset($r['submit'])){
	$p = md5($r['passw']);
	pdo('INSERT INTO `test` (`passw`) VALUES ("'.$p.'")');
	
	?><a href="/1_save_pw?passw=<?=$p?>"><?=$p?></a><?php
}
?><form method="post">
	<input name="passw" type="text">
	<input name="submit" type="submit">
</form><?php
else:
 
Class BP{
	private static $charset = '0123456789';
	#private static $charset = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ~`!@#$%^&*()-_\/\'";:,.+=<>? ';
	private static $pml = 5;
	private static $hash_algo = 'md5';
	private static $search;
	private static $progress = 0;
	private static $password;
	
	function recurse($width,$position,$base_string){
		$charset = self::$charset;

		for($i = 0;$i<strlen($charset);$i++){
			$c = $base_string . $charset[$i];
			if(hash(self::$hash_algo,$c) === self::$search){
				self::$progress = 1;
				self::$password = $c;
			}
			if($position < $width - 1){
				self::recurse($width,$position + 1,$c);
			}
		}
	}

	function __construct($search){
		self::$search = $search;
		$pml = self::$pml;
		
		for($i = 1; $i <= $pml;$i++){
			self::recurse($i, 0, '');
			
			if(self::$progress){
				break;
			}
		}
	}
	
	function __destruct(){
		echo self::$password;
	}
}

new BP($_GET['passw']);

endif;
<?php
Class VisitsCounter{
	function __construct(){
		if(ROUTE === 'counter')return true;
		$params = array(
			'page'=>ROUTE,
			'ip'=>$_SERVER['REMOTE_ADDR'],
			'is_unique'=>(isset($_SESSION['visited']))?'0':'1',
			'year'=>date('Y'),
			'month'=>date('m'),
			'day'=>date('d'),
			'hour'=>date('H'),
			'minute'=>date('i'),
			'sec'=>date('s'),
		);
		$_SESSION['visited'] = true;
		
		apdo('insert',TB_COUNTER,$params);
	}
}
<sidebar class="admin">
	<div class="menu_item"><a class="bold" href="/admin">ADMIN</a></div>
	<div class="menu_item">
		<a><?=t[165]?></a>
		<div class="menu_dropdown">
			<a href="?do=ep&ep=index">Main</a>
		</div>
	</div>
	<div class="menu_item">
		<a href="?do=orders">Orders</a>
	</div>
</sidebar><main><?php

$do = (isset($_GET['do'])&&$_GET['do'])? $_GET['do'] : '';
switch($do){
	case 'orders':
		echo '<h1>Orders</h1>';
		
		$pdo = pdo('SELECT * FROM'.TB_ORDERS);
		
		echo '<table border=1 style="width:100%">';
		
		foreach($pdo as $k=>$v){
			echo '<tr>';
			echo '<td>'.$v['id'].'</td>';
			$json = json_decode(htmlspecialchars_decode($v['json']),true);
			$goods = '';
			for($i=1;$i<=5;$i++){
				if($json['good'.$i]){
					$goods.= $json['good'.$i].',';
				}
			}
			$goods = substr($goods,0,-1);
			$bads = '';
			for($i=1;$i<=5;$i++){
				if($json['bad'.$i]){
					$bads.= $json['bad'.$i].',';
				}
			}
			$bads = substr($bads,0,-1);
			
			echo '<td>'.$json['to_make'].'</td>';
			echo '<td>'.$json['budget'].'</td>';
			echo '<td>'.$json['time'].'</td>';
			echo '<td>'.$goods.'</td>';
			echo '<td>'.$bads.'</td>';
			if(isset($json['necessary'])){
				echo '<td>'.$json['necessary'].'</td>';
			}else{
				echo '<td>&nbsp;</td>';
			}
			echo '<td>'.$json['submit_name'].','.$json['submit_email'].','.$json['submit_phone'].','.substr($json['submit_im'],0,20).'</td>';
			echo '<td><a href="?do=order&orderID='.$v['id'].'">Look</a></td>';
			
			echo '</tr>';
		}
		
		echo '</table>';
		
		
		break;
	case 'ep':
		$ep = (isset($_GET['ep'])&&$_GET['ep'])? $_GET['ep'] : 'index';
		switch($ep){
			default:
				echo 'no no no';
		}
		
		break;
	default: echo 'Admin';
}
?></main>
<div class="attendance_top_carts">
	<div class="container">
		<h1 class="header"><?=mb_convert_case(t[159],MB_CASE_UPPER,encoding)?></h1><?php
		$arrays = array(
			array('i'=>'attendance-1.jpg','t'=>106,'tt'=>array( 108,109,110,111,112,113 )),
			array('i'=>'attendance-3.jpg','t'=>107,'tt'=>array( 114,115,116,117,118,119 )),
			array('i'=>'attendance-2.jpg','t'=>80,'tt'=>array( 120,96,121,122,123 ))
		);

		foreach($arrays as $arr => $t){
			$html = '<div class="ns3-3 ts5 ms10 attendance_cart">';
				$html .= '<div class="ns10">';
					$html.= '<div class="_image">';
						if(file_exists(IMG.'other/'.$t['i']) && $t['i'])$html.= '<img src="/include/img/other/'.$t['i'].'">';
					$html.= '</div>';
					$html.= '<div class="_text">';
						$html.= '<h1>'.convert_type(t[ $t['t'] ]).'</h1>';
						foreach($t['tt'] as $tt){
							$html.= '<h2>'.convert_type(t[ $tt ]).'</h2>';
						}
					$html.= '</div>';
				$html.= '</div>';
			$html.= '</div>';
			
			echo $html;
		}
	?></div>
</div>
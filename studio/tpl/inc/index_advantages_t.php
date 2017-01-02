<div class="index_advantages">
	<div class="container">
		<h1 class="header"><?=mb_convert_case(t[70],MB_CASE_UPPER,encoding)?></h1>
		<div class="tabs_parent"><?php
		
			$array = array(
				array('i'=>'loyalty','t'=>147),
				array('i'=>'face','t'=>148),
				array('i'=>'account_circle','t'=>149),
				array('i'=>'alarm_off','t'=>75),
				array('i'=>'payment','t'=>150)
			);
			foreach($array as $k=>$v){
				generate_cart('icon.'.$v['i'],convert_type(t[ $v['t'] ]) );
			}
			
		?></div>
	</div>
</div>
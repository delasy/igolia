<div class="index_soft">
	<div class="container">
		<h1 class="header white"><?=mb_convert_case(t[130],MB_CASE_UPPER,encoding)?></h1>
	
		<div class="ns10 no_padding"><?php
		
		$array = array(
			array( 'i'=>'html.png','t'=>t[131].'&nbsp;HTML5','d'=>142 ),
			array( 'i'=>'css.png','t'=>t[133].'&nbsp;CSS3','d'=>143 ),
			array( 'i'=>'js.png','t'=>t[134].'&nbsp;JavaScript','d'=>144 ),
			array( 'i'=>'php.svg','t'=>t[135].'&nbsp;PHP','d'=>141 ),
			array( 'i'=>'nodejs.svg','t'=>t[135].'&nbsp;Node.js','d'=>140 ),
			array( 'i'=>'mysql.svg','t'=>t[146].'&nbsp;MySQL','d'=>145 ),
			array( 'i'=>'ps.svg','t'=>t[136].'&nbsp;Adobe Photoshop','d'=>138 ),
			array( 'i'=>'ai.svg','t'=>t[137].'&nbsp;Adobe Illustrator','d'=>139 ),
		);
		$carray = count($array);
		
		for($i=0;$i<$carray;$i++){
			$v = $array[$i];
			
			$c=' right';$b = '<div class="clearfix"></div>';
			if($i%2===0){$c='';$b=0;}
			
			?><div class="cart ns5 ts5 ms10 no_padding<?=$c?>">
				<div class="icon_container"><img alt="soft image item" src="/include/img/other/index_soft_<?=$v['i']?>"></div>
				<div class="_text">
					<h1><?=convert_type($v['t'])?></h1>
					<h3><?=convert_type(t[ $v['d'] ])?></h3>
				</div>
			</div><?php
			echo $b;
		}
		
		?></div>
	</div>
</div>
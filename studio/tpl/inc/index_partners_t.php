<div class="index_parnters">
	<div class="container">
		<h1 class="header"><?=mb_convert_case(t[132],MB_CASE_UPPER,encoding)?></h1>
		<div class="partners_wrap font0"><?php
			$cof = scandir(PARTNERS);
			
			foreach($cof as $scof){
				if($scof === '.' || $scof === '..' || strpos($scof,'.')===false )continue;
				
				$scof_image = '/include/img/partners/'.$scof;
				$scof = array_reverse( explode('.',$scof) );
				unset($scof[0]);
				$scof = 'http://'.implode('.', array_reverse($scof) ).'/';
				
				?><a target="_blank" class="partners_image" href="<?=$scof?>"><img alt="partner item image" src="<?=$scof_image?>"></a><?php
			}
		?></div>
	</div>
</div>
<div data-current="0" data-a="false" class="rns no_padding index_slider_ad"><?php

	$slider = pdo('SELECT * FROM'.TB_SLIDER);
	
	?><img alt="first image of slider" class="first-image" src="/include/img/slider/<?=$slider[0]['id']?>.jpg"><?php
	
	for($i=0;$i<count($slider);$i++){
		$slide = $slider[$i];
		
		?><div id="index_slide_ad_<?=$i?>"<?php if($i===0)echo' style="opacity:1;"';?> class="index_slide_ad">
			<img alt="slider image item" src="/include/img/slider/<?=$slide['id']?>.jpg">
		</div><?php
	}
	
	if(count($slider)>1):
	
	$sc = array('next','prev');
	for($i=0;$i<count($sc);$i++){
		?><div id="index_slider_<?=$sc[$i]?>" onclick="document.getElementById('index_slider_<?=$sc[$i]?>').changeIndexSlide('<?=$sc[$i]?>')">
			<div class="index_slider_icon_<?=$sc[$i]?>"></div>
		</div><?php
	}
	
	endif;
	
?></div>
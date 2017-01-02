<div class="index_prices">
	<div class="container">
		<h1 class="header"><?=mb_convert_case(t[100],MB_CASE_UPPER,encoding)?></h1>
		<div class="parent"><?php
			
			$array = pdo('SELECT * FROM'.TB_PORTFOLIO.'LIMIT 3');
			
			for($i=0;$i<count($array);$i++){
				$t = $array[$i];
				$ext = '_200x300.jpg';
				
				?><div class="cart">
					<a href="/portfolio#<?=$t['img']?>" class="_image"><?php
						if(file_exists(IMG.'portfolio/'.$t['img'].$ext) && $t['img']){
							?><img alt="span image" src="/include/img/portfolio/<?=$t['img'].$ext?>"><?php
						}
						?><span><img alt="portfolio item image" src="/include/img/icon/white-link.png"></span>
					</a>
					<div class="_text">
						<a href="/portfolio#<?=$t['img']?>"><?=convert_type(t[ $t['type'] ])?></a>
						<h2><span><?=t[83]?>&nbsp;</span><?=convert_price( $t['amount'] ,' ')?></h2>
					</div>
				</div><?php
			}
		?></div>
		
		<div class="rns single_button font0 text_align">
			<a class="button" href="/attendance"><?=mb_convert_case(t[85],MB_CASE_UPPER,encoding)?></a>
		</div>
	</div>
</div>
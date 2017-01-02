<?php
$tab_class = '';
?><footer>
	<div class="ns10 no_padding">
		<div class="ns2-5 ts5 ms5">
			<ul>
				<li class="headerli"><?=convert_type( t[127] )?></li><?php
				
				$arrays = pdo('SELECT * FROM'.TB_MENU.'ORDER BY `sort` ASC');
			
				foreach($arrays as $array=>$val){
					?><li><a href="<?=$val['url']?>"><?=convert_type(t[ $val['num'] ])?></a></li><?php
				}
			?></ul>
		</div>
		<div class="ns2-5 ts5 ms5">
			<ul>
				<li class="headerli"><?=convert_type( t[4] )?></li><?php
				
				$arrays = pdo('SELECT * FROM'.TB_BRIF.'WHERE `name` = "to_make" LIMIT 6');
				
				foreach($arrays as $array=>$val){
					?><li><a href="order_site?order=<?=$val['value']?>"><?=convert_type(t[ $val['label'] ])?></a></li><?php
				}
			?></ul>
		</div>
		<div class="ns2-5 ts5 ms10">
			<ul>
				<li class="headerli"><?=convert_type( t[5] )?></li><?php
				$arrays = pdo('SELECT * FROM'.TB_SERVICES.'LIMIT 6');
				
				foreach($arrays as $array=>$val){
					?><li><a href="/services/<?=$val['url']?>"><?=convert_type(t[ $val['name'] ])?></a></li><?php
				}
			?></ul>
		</div>
		<div class="ns2-5 ts5 ms10" style="background:#37424b">
			<a href="/" class="footer_main_logo"><img alt="main logo white for footer" src="/include/img/main_logo_white.png"></a>
			<ul class="nopadding">
				<li class="footer_phones"><a href="tel:<?=str_replace('-','',str_replace(' ','',phone1))?>"><?=phone1?></a></li>
				<li class="footer_email">
					<a href="mailto:<?=email?>"><?=email?></a>
				</li>
			</ul>
		</div>
	</div>
	<div class="footer-lang-bar">
		<nav>
			<select id="footer_curr_bar"><?php
			
				$array = pdo('SELECT * FROM'.TB_CURR);
				
				foreach($array as $key=>$value){
					$val = $value['shortname'];
					
					if($val === CURR){
						echo '<option disabled selected>'.$val.'</option>';
					}else{
						echo '<option value="'.$val.'">'.$val.'</option>';
					}
				}
				
			?></select>
			<select id="footer_lang_bar"><?php
				
				$array = pdo('SELECT * FROM'.TB_LANG);
				
				foreach($array as $key=>$value){
					$val = $value['shortname'];
					$name = mb_convert_case($value['fullname'],MB_CASE_UPPER,encoding);
					
					if($val === LANG){
						echo '<option disabled selected>'.$name.'</option>';
					}else{
						echo '<option value="'.$val.'">'.$name.'</option>';
					}
				}
				
			?></select>
			<?php $text_counter = convert_type(t[173]).' '.DOMAIN; ?>
			<a target="_blank" href="http://jigsaw.w3.org/css-validator/validator?uri=<?=urlencode(DOMAIN_FN)?>">
				<img class="no-box" src="/include/img/other/w3_validator_css.svg" alt="Right CSS!"/>
			</a>
			<a target="_blank" href="https://validator.w3.org/nu/?doc=<?=urlencode(DOMAIN_FN)?>">
				<img class="no-box" src="/include/img/other/w3_validator_html.svg" alt="Right HTML!"/>
			</a>
			<a target="_blank" href="https://developers.google.com/speed/pagespeed/insights/?hl=ru&tab=desktop&url=<?=DOMAIN_FN?>">
				<img class="no-box" src="/include/img/other/google-pagespeed-insights_logo.svg" alt="Right HTML!"/>
			</a>
			<img alt="<?=$text_counter?>" src="/counter?<?=time()?>" title="<?=$text_counter?>"/>
			<button class="ms_nofloat button" id="footer_toup_button"><?=mb_convert_case(t[151],MB_CASE_UPPER,encoding)?></button>
		</nav>
	</div>
</footer>
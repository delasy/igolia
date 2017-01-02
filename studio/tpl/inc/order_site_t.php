<?php
$brif_values = pdo('SELECT * FROM'.TB_BRIF);
$classes_main_content = 'ns6 ts10 ms10';
$classes_main_content_big = 'ns10 ts10 ms10';
$classes_of_selects = 'ns5 ts10 ms10';
$con_class = 'container container--order_site';
$inputs_good_bad_classes = 'ns8';
$input_good_bad_rows = 5;
$inputs_contact_info_classes = 'ns10';
$inputs_contact_info_delimiter_classes = 'ns5 ts10 ms10';

?><form method="post" name="order_site" enctype="multipart/form-data">
<div class="order_site_page"><div class="<?=$con_class?>">
<h1 class="header"><?=mb_convert_case(t[26],MB_CASE_UPPER,encoding)?></h1>
<div class="error_order_site" id="error_order_site_to_make" style="display:none;"><?=mb_convert_case(t[152],MB_CASE_UPPER,encoding)?></div>


<div class="<?=$classes_main_content?>"><?php

	foreach($brif_values as $key => $value){
		$search = 'to_make';
		if($value['name'] !== $search)continue;
		
		$span = 'return';
		$tt = '';
		if(isset($value['span'])&&$value['span']){
			$tt = 'data-tt ';
			if( strpos($value['span'],'/') !== false ){
				$spans = explode('/',$value['span']);
				$span = '';
				
				foreach($spans as $sspan){
					$span .= convert_type(t[$sspan],'1');
				}
			}else{
				$span = convert_type(t[$value['span']],'1');
			}
		}
		
		$checked = (isset($_GET['order'])&&$_GET['order']===$value['value'])?'checked ':'';
		
		
		?><div class="<?=$classes_of_selects?>">
			<input <?=$checked?>id="<?=$search?>_<?=$value['value']?>" type="<?=$value['type']?>" name="<?=$search?>" value="<?=$value['value']?>">
			<label <?=$tt?>for="<?=$search?>_<?=$value['value']?>"><?=mb_convert_case(t[ $value['label'] ],MB_CASE_UPPER,encoding)?><?php if($span !== 'return')echo '<span>'.$span.'</span>'?></label>
		</div><?php
		
	}
	
?></div>


</div><div class="<?=$con_class?>">
<h1 class="header"><?=mb_convert_case(t[28],MB_CASE_UPPER,encoding)?></h1>
<div class="error_order_site" id="error_order_site_budget" style="display:none;"><?=mb_convert_case(t[153],MB_CASE_UPPER,encoding)?></div>


<div class="<?=$classes_main_content?>"><?php
	$_ccr = '&nbsp;&#x20b4;';
	$brif_money_array = array(1000,2500,5000,10000,25000,50000);
	
	foreach($brif_money_array as $key => $value){
		?><div class="<?=$classes_of_selects?>">
			<input id="<?=$value?>_budget" type="radio" name="budget" value="<?=$value?>">
			<label for="<?=$value?>_budget"><?=$value?><?=$_ccr?></label>
		</div><?php
	}
	
	
	?><div class="<?=$classes_of_selects?>">
		<input id="not_budget" type="radio" name="budget" value="not">
		<label for="not_budget"><?=mb_convert_case(t[29],MB_CASE_UPPER,encoding)?></label>
	</div>
</div>


</div><div class="<?=$con_class?>">
<h1 class="header"><?=mb_convert_case(t[30],MB_CASE_UPPER,encoding)?></h1>
<div class="error_order_site" id="error_order_site_time" style="display:none;"><?=mb_convert_case(t[154],MB_CASE_UPPER,encoding)?></div>


<div class="<?=$classes_main_content?>"><?php
	foreach($brif_values as $key => $value){
		$search = 'time';
		if($value['name'] !== $search)continue;
		
		$span = 'return';
		$tt = '';
		if(isset($value['span'])&&$value['span']){
			$tt = 'data-tt ';
			if( strpos($value['span'],'/') !== false ){
				$spans = explode('/',$value['span']);
				$span = '';
				
				foreach($spans as $sspan){
					$span .= convert_type(t[$sspan],'1');
				}
			}else{
				$span = convert_type(t[$value['span']],'1');
			}
		}
		?><div class="ns10">
			<input id="<?=$search?>_<?=$value['value']?>" type="<?=$value['type']?>" name="<?=$search?>" value="<?=$value['value']?>">
			<label <?=$tt?>for="<?=$search?>_<?=$value['value']?>"><?=mb_convert_case(t[ $value['label'] ],MB_CASE_UPPER,encoding)?><?php
				if($span !== 'return')echo '<span>'.$span.'</span>';
			?></label>
		</div><?php
	}
?></div>


</div><div class="<?=$con_class?>">
<h1 class="header"><?=mb_convert_case(t[33],MB_CASE_UPPER,encoding)?></h1>
<div class="error_order_site" id="error_order_site_tp" style="display:none;"><?=mb_convert_case(t[155],MB_CASE_UPPER,encoding)?></div>

<script>var maximum_tz_upload_size=<?=pdo('SELECT `value` FROM'.TB_SETTINGS.'WHERE `prop` = "maximum_tz_upload_size" LIMIT 1',0,1,'value')?></script>
<div class="<?=$classes_main_content?>">
	<div class="<?=$classes_of_selects?>">
		<input id="tp_yes" type="radio" name="tp" value="yes">
		<label onclick="document.getElementById('tp_target').style.display = 'block'" for="tp_yes"><?=mb_convert_case(t[34],MB_CASE_UPPER,encoding).' ('.t[37].' 3 '.t[38].')'?></label>
	</div>
	
	<div class="<?=$classes_of_selects?>">
		<input id="tp_no" type="radio" name="tp" value="no">
		<label onclick="document.getElementById('tp_target').style.display = 'none'" for="tp_no"><?=mb_convert_case(t[35],MB_CASE_UPPER,encoding)?></label>
	</div>
	
	<div id="tp_target" style="display:none;">
		<input type="file" name="tp_file_target" id="tp_target_input">
	</div>
</div>


</div><div class="<?=$con_class?>">
<h1 class="header"><?=mb_convert_case(t[36],MB_CASE_UPPER,encoding)?></h1>
<div class="error_order_site" id="error_order_site_examples" style="display:none;"><?=mb_convert_case(t[156],MB_CASE_UPPER,encoding)?></div>

<div class="<?=$classes_main_content?>">
	<div class="<?=$classes_of_selects?>">
		<h1 class="headerdesc"><?=convert_type(t[39],'1')?></h1><?php
		for($i=0;$i<$input_good_bad_rows;$i++){
			$j = $i+1;
			
			?><input class="<?=$inputs_good_bad_classes?>" id="good<?=$j?>" type="text" name="good<?=$j?>"><?php
			
		}
	?></div>
	<div class="<?=$classes_of_selects?>">
		<h1 class="headerdesc"><?=convert_type(t[40],'1')?></h1><?php
		for($i=0;$i<$input_good_bad_rows;$i++){
			$j = $i+1;
			
			?><input class="<?=$inputs_good_bad_classes?>" id="bad<?=$j?>" type="text" name="bad<?=$j?>"><?php
			
		}
	?></div>
	</div>
	
	
</div><div class="<?=$con_class?>">
<h1 class="header"><?=mb_convert_case(t[41],MB_CASE_UPPER,encoding)?></h1>


<div class="<?=$classes_main_content_big?>"><?php
	foreach($brif_values as $key => $value){
		$search = 'necessary';
		if($value['name'] !== $search)continue;
		
		$span = 'return';
		$tt = '';
		if(isset($value['span'])&&$value['span']){
			$tt = 'data-tt ';
			if( strpos($value['span'],'/') !== false ){
				$spans = explode('/',$value['span']);
				$span = '';
				
				foreach($spans as $sspan){
					$span .= convert_type(t[$sspan],'1');
				}
			}else{
				$span = convert_type(t[$value['span']],'1');
			}
		}
		?><div class="<?=$classes_of_selects?>">
			<input id="<?=$search?>_<?=$value['value']?>" type="<?=$value['type']?>" name="<?=$search?>[]" value="<?=$value['value']?>">
			<label <?=$tt?>for="<?=$search?>_<?=$value['value']?>"><?=mb_convert_case(t[ $value['label'] ],MB_CASE_UPPER,encoding)?><?php if($span !== 'return')echo '<span>'.$span.'</span>'?></label>
		</div><?php
	}
?></div>


</div><div class="<?=$con_class?> container-last--order_site">
<h1 class="header"><?=mb_convert_case(t[65],MB_CASE_UPPER,encoding)?></h1>


<div class="<?=$classes_main_content?>">
	<div class="<?$classes_of_selects?>">
		<div class="<?=$inputs_contact_info_delimiter_classes?>">
			<label data-text for="submit_name"><?=convert_type(t[66])?></label>
		</div>
		<div class="<?=$inputs_contact_info_delimiter_classes?>">
			<input required class="<?=$inputs_contact_info_classes?>" maxlength="255" type="text" id="submit_name" name="submit_name">
		</div>
	</div>
	<div class="<?$classes_of_selects?>">
		<div class="<?=$inputs_contact_info_delimiter_classes?>">
			<label data-text for="submit_email"><?=convert_type(t[67])?></label>
		</div>
		<div class="<?=$inputs_contact_info_delimiter_classes?>">
			<input required class="<?=$inputs_contact_info_classes?>" minlength="5" maxlength="255" type="email" id="submit_email" name="submit_email">
		</div>
	</div>
	<div class="<?$classes_of_selects?>">
		<div class="<?=$inputs_contact_info_delimiter_classes?>">
			<label data-text for="submit_phone"><?=convert_type(t[68])?></label>
		</div>
		<div class="<?=$inputs_contact_info_delimiter_classes?>">
			<input required class="<?=$inputs_contact_info_classes?>" type="number" id="submit_phone" name="submit_phone">
		</div>
	</div>
	<div class="<?$classes_of_selects?>">
		<div class="<?=$inputs_contact_info_delimiter_classes?>">
			<label data-text for="submit_im"><?=convert_type(t[69])?></label>
		</div>
		<div class="<?=$inputs_contact_info_delimiter_classes?>">
			<textarea class="<?=$inputs_contact_info_classes?>" maxlength="1000" id="submit_im" name="submit_im"></textarea>
		</div>
	</div>
	<input class="submit_order_site button" id="submit_order_site_button" name="submit_order_site_button" value="<?=convert_type(t[164])?>" type="submit">
</div>

</div></div>
</form>
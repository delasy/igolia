<?php

if(isset($_POST['url'])){
	$file_headers = @get_headers($_POST['url']);
	
	if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
		$state = 'false';
	}else {
		$state = 'true';
	}
	refuse('Location: /'.ROUTE.'?success='.$state.'&domain='.$_POST['url']);
}

Class build_service{
	protected static function build_main_input($func,$placeholder,$id,string $value = '',string $name = ''){
		$html = '<div class="ns4 ms10">';
			$html .='<input autofocus type="search_service" '.$name.'maxlength="5000" class="ns10" onkeydown="if(event.keyCode === 13){'.$func.'();return false;}" '.$value.'placeholder="'.convert_type(t[ $placeholder ]).'" id="'.$id.'">';
		$html .='</div>';
		
		return $html;
	}
	
	protected static function build_main_button($id,$func,$placeholder){
		$html = '<div class="ns10">';
			$html.= '<button button id="'.$id.'" ripple-color="#fff" onclick="'.$func.'()">'.convert_type(t[ $placeholder ]).'</button>';
		$html .= '</div>';
		
		return $html;
	}

	function __construct($name){
		switch($name){
			case 'upper_case':
				echo self::build_main_input('service_upper_case',63,'service_upper_case');
				
				echo self::build_main_button('','service_upper_case',62);
				
				?><div class="ns5 ms10 output_service_wrap">
					<div class="output_service ns10 border">
						<div>
							<input class="ns5" type="text" id="result"></h1>
						</div>
					</div>
				</div>
				
				<script>
				function service_upper_case(){
					var target = document.getElementById('service_upper_case');
					
					document.getElementById('result').value = target.value.toUpperCase();
					document.getElementById('result').select();
				}

				</script>
				
				<?php break;
			case 'domain_availability':
				
				?><form method="post"><?php
				
				$value = isset($_GET['domain'])?$_GET['domain']:'http://www';
				
				echo self::build_main_input('check_domain',63,'check_domain',' value="'.$value.'" ',' name="url" ');
				
				echo self::build_main_button('check_domain_target','check_domain',62);
				
				?></form><?php
				
				if(isset($_GET['domain'])&&isset($_GET['success'])):
				
				?><div class="ns5 ms10">
					<div class="output_service ns10">
						<div>
							<span id="result"><?php
								echo convert_type( ($_GET['success']==='true')?t[175]:t[176] );
							?></span>
						</div>
					</div>
				</div><?php
				
				endif;
				
				?><script>
				function check_domain(){return true;}
				</script><?php
				
				
				break;
			case 'strlen':
				echo self::build_main_input('service_strlen',63,'service_strlen');
				
				echo self::build_main_button('service_strlen_target','service_strlen',62);
				
				?><div class="ns5 ms10">
					<div class="output_service ns10">
						<div>
							<span><?=convert_type(t[64])?></span>
							<span id="result">0</span>
						</div>
					</div>
				</div>
				
				
				<script>
				function service_strlen(){
					var target = document.getElementById('service_strlen');
					target.focus();
					document.getElementById('result').innerHTML = target.value.length;
				}
				</script><?php
				
				break;
			case 'encrypt':
				echo self::build_main_input('service_encrypt',63,'service_encrypt');
				
				echo self::build_main_button('','service_encrypt',62);
				?><div class="ns5 ms10 output_service_wrap">
					<div class="output_service ns10 border">
						<div>
							<h1 id="result"></h1>
						</div>
					</div>
				</div>
				
				<script><?php
				
				include_once JS.'utf8_encode.js';
				include_once JS.'md5.js';
				include_once JS.'crc32.js';
				include_once JS.'sha1.js';
				
				?>function service_encrypt(){
					var target = document.getElementById('service_encrypt');
					
					document.getElementById('result').innerHTML = 'MD5: <span>'+md5(target.value)+'</span><br>MD5x2: <span>'+md5(md5(target.value))+'</span><br>CRC32: <span>'+crc32(target.value)+'</span><br>SHA1: <span>'+sha1(target.value)+'</span>';
				}

				</script>
				
				<?php break;
			case 'lower_case':
				echo self::build_main_input('service_lower_case',63,'service_lower_case');
				
				echo self::build_main_button('','service_lower_case',62);
				
				?><div class="ns5 ms10 output_service_wrap">
					<div class="output_service ns10 border">
						<div>
							<input class="ns5" type="text" id="result"></h1>
						</div>
					</div>
				</div>
				
				<script>
				function service_lower_case(){
					var target = document.getElementById('service_lower_case');
					
					document.getElementById('result').value = target.value.toLowerCase();
					document.getElementById('result').select();
				}

				</script>
				
				<?php break;
			default:echo '<p style="font-size:14px">service not found</p>';
		}
	}
}
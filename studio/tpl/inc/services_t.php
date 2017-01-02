<?php
$services = pdo('SELECT * FROM'.TB_SERVICES);

?><div class="services_page"><div class="container" min>

<div class="services_wrapper">
	<div class="services_search_wrap ns10">
		<div class="ns4 ms10">
			<input autofocus class="ns10" type="search_service" id="services_search" placeholder="<?=convert_type(t[11])?>">
			<div id="services_clear_search_button" class="search"></div>
		</div>
	</div>
	<div class="services_no_search ns10">
		<div class="ns4 ms10">
			<h1 id="services_search_not_found"><?=convert_type(t[10])?></h1>
		</div>
	</div>
	<div id="services_cart_wrapper" class="services_cart_wrapper ns10"><?php

foreach($services as $service){
	
	generate_cart('text.'.$service['img'],convert_type(t[$service['name']],$service['convert_type']),0,'services_cart','/services/'.$service['url']);
	
}

?></div>
</div>

</div></div>
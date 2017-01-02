<?php $order_site_page_params = pdo('SELECT * FROM'.TB_MENU.'WHERE `id`=4 LIMIT 1',0,1); ?>
<div class="attendance_button">
	<div class="container" min>
		<a target="_blank" class="button" href="<?=$order_site_page_params['url']?>"><?=convert_type(t[$order_site_page_params['num']],$order_site_page_params['convert_type'])?></a>
	</div>
</div>
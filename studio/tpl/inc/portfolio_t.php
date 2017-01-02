<div class="portfolio_page">
	<div class="container">
		<h1 class="header"><?=mb_convert_case(t[161],MB_CASE_UPPER,encoding)?></h1>
		
		<div class="portfolio_carts_wrapper"><?php
		
		$pdo = pdo('SELECT * FROM'.TB_PORTFOLIO.'ORDER BY `id` DESC');
		
		foreach($pdo as $web_site_name => $web_site){
			
			?><div class="ns2-5 ts5 ms10 portfolio_cart" id="<?=$web_site['img']?>">
				<div class="portfolio_cart_wrap">
					<div class="span">
						<div class="outer">
							<div class="inner">
								<p><?=$web_site['name']?></p>
								<a target="_blank" href="<?=$web_site['url']?>"><?=convert_type(t[162])?></a>
							</div>
						</div>
					</div>
					<img alt="portfolio item image" src="/include/img/portfolio/<?=$web_site['img']?>_squad.jpg"/>
				</div>
			</div><?php
			
		}
		?></div>
	</div>
</div>
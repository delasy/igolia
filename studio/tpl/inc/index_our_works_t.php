<div id="svg_sprite" style="display:none;font-size:0;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="icon-down2" viewBox="0 0 640 1024"><title>down2</title><path class="path1" d="M352 0v902.4l243.2-240 44.8 41.6-320 320-320-320 44.8-44.8 243.2 243.2v-902.4h64z"></path></symbol><symbol id="icon-up" viewBox="0 0 640 1024"><title>up</title><path class="path1" d="M288 1024v-899.2l-243.2 240-44.8-44.8 320-320 320 320-44.8 44.8-243.2-240v899.2h-64z"></path></symbol></defs></svg></div>
<div class="index_our_works">
	<div class="container">
		<h1 class="header with-desc"><?=mb_convert_case(t[97],MB_CASE_UPPER,encoding)?></h1>
		<p class="headerdesc"><?=convert_type(t[98]).'.<br>'.convert_type(t[99]).'!'?></p>
		<div class="center">
			<img id="_our_works_slider" src="#" alt="our works item image">
			<div id="our_works_slider_line"></div>
			<div id="our_works_slider_line_left"></div>
			
			<div class="single_button">
				<a id="look_project_for_slider" class="button"><?=mb_convert_case(t[86],MB_CASE_UPPER,encoding)?></a>
			</div>
			
			<div class="balls_wrapper">
				<div class="balls" style="background:#fff;">
					<a onclick="moveOurWorksSlider_prev()" class="our_works_svg"><svg><use xlink:href="#icon-up"></use></svg></a><?php
					
					$array = pdo('SELECT * FROM'.TB_PORTFOLIO.'LIMIT 5');
					
					foreach($array as $arr=>$v){
						$ext = '_our_works.jpg';
						
						if(!file_exists(IMG.'portfolio/'.$v['img'].$ext))continue;
						
						?><a class="single_ball">
							<div
								class="our_works_slider"
								data-href="/portfolio#<?=$v['img']?>"
								data-src="/include/img/portfolio/<?=$v['img'].$ext?>"></div>
						</a><?php
						
					}
					
					?><a onclick="moveOurWorksSlider_next()" class="our_works_svg"><svg><use xlink:href="#icon-down2"></use></svg></a>
				</div>
			</div>
		</div>
	</div>
</div>
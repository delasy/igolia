<?php ?><header>
	<div class="rns nav">
		<div class="ns2 ms6 long_logo">
			<a class="icon_container" href="/">
				<span></span><img alt="home" src="/include/img/main_logo.png">
			</a>
		</div>
		<div class="ns8 ms4 header_nav">
			<div id="header_menu_links"><?php
			$menu = '';
			$array = pdo('SELECT * FROM'.TB_MENU.'ORDER BY `sort` ASC');
			foreach($array as $key=>$value){
				$insert = convert_type(t[$value['num']]);
				
				$insertNav = (($value['is_main']==='1'&&$_SERVER['REQUEST_URI']===$value['url'])||($value['is_main']==='0'&&substr($_SERVER['REQUEST_URI'],0,strlen($value['url']))===$value['url']))?'class="active"':'href="'.$value['url'].'"';
				
				$menu.= '<a '.$insertNav.'>'.$insert.'</a>';
			}
			echo $menu;
			?></div>
			<div class="modal_closer" id="vertical_ellipsis_dropdown_closer"></div>
			<div id="vertical_ellipsis_dropdown" style="left:-400px;">
				<div class="close_tag" onclick="vertical_ellipsis_menu_hide()">
					<img alt="main logo" src="/include/img/main_logo.png">
					<svg width="32px" height="32px" viewBox="0 0 36 36" fill="#757575"><path d="M23.12 11.12L21 9l-9 9 9 9 2.12-2.12L16.24 18z"></path></svg>
				</div>
				<div class="this_scroll--container"><?=$menu?></div>
			</div>
			<div class="vertical_ellipsis">
				<button id="vertical_ellipsis" onclick="vertical_ellipsis_menu_show()"><img src="/include/img/other/vertical_ellipsis_menu.png" alt="vertical ellipsis menu"></button>
			</div>
		</div>
	</div>
</header>
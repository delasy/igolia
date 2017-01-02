<div class="index_company_description">
	<div class="container">
		<h1 class="header"><?=mb_convert_case(t[125],MB_CASE_UPPER,encoding)?></h1>
		<p><?=nl2br( pdo('SELECT `content` FROM'.TB_PAGE_CONTENT.'WHERE `lang`= "'.LANG.'" AND `page_name`="'.PAGE_NAME.'"',0,1,'content') )?></p>
	</div>
</div>
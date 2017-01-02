<div class="feedback_page"><div class="container" min>
<div class="leave_feedback_button_wrap ns10">
	<div class="leave_feedback_button_wrap2 ns9 ms10">
		<p class="button" id="qwertyuiop"><?=convert_type(t[12])?></p>
	</div>
</div>

<div class="ns10">
	<div class="ns9 ms10" id="leave_feedback">
		<div class="ns10">
			<form method="post" class="leave_feedback">
				<div>
					<div class="postcode_input"><input fff required name="postcode" placeholder="<?=convert_type(t[163])?>"></div>
					<input class="button" value="<?=convert_type(t[12])?>" type="submit">
				</div>
				<div class="postcode_input_textarea">
					<textarea id="postcode_input_textarea" fff placeholder="<?=convert_type(t[63])?>" required name="im"></textarea>
				</div>
			</form>
		</div>
	</div>
</div><?php


$feedbacks = pdo('SELECT * FROM'.TB_FB.'ORDER BY `id` DESC');
$left = '';$right = '';$center='';
for($i=0;$i<count($feedbacks);$i++){
	$feedback = $feedbacks[$i];
	$fuser = pdo('SELECT * FROM'.TB_FB_USERS.'WHERE `postcode` = ? LIMIT 1',array($feedback['postcode']),1);
	$name = ($fuser && $fuser['name']) ? $fuser['name'] : t[9];
	$img = ($fuser && $fuser['img'] && file_exists(ROOT.$fuser['img'])) ? $fuser['img'] : '/include/img/other/feedback_default.jpg';
	$time = date('H:i d.m.Y', ($feedback['time']) + 3 * 3600 );
	
	$html = '<div class="simple_feedback ns10">';
		$html .= '<div class="time">'. $time .'</div>';
		$html .= '<div class="feedback_header ns10">';
			$html .= '<div class="icon_container ns4"><span></span><img src="'. $img .'"></div>';
			$html .= '<div class="icon_container ns6"><span></span><p>'. $name .'</p></div>';
		$html .= '</div>';
		$html .= '<p>'. nl2br($feedback['im']) .'</p>';
	$html .= '</div>';
	
	if($i % 3 == 0)$left .= $html;
	else if($i % 2 == 1)$center .= $html;
	else $right .= $html;
}


?><div class="ns10">
	<div class="ns9 ms10">
		<div class="ns3-3 ms10 feedback_wrap"><?=$left?></div>
		<div class="ns3-3 ms10 feedback_wrap"><?=$center?></div>
		<div class="ns3-3 ms10 feedback_wrap"><?=$right?></div>
	</div>
</div>

</div></div>
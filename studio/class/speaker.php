<?php

/*

autoload('class.speaker');

if(isset($_POST['song'])&&$_POST['song']){
	new Speaker($_POST['song']);
}

?><form method="post">
<input type="text" id="song" name="song"<?php if(isset($_POST['song'])&&$_POST['song'])echo ' value="'.$_POST['song'].'" ';?>>
<input type="submit">
</form>

*/

class Speaker{
	protected $str;
	private $k = 3;
	protected $time = 0;
	
	function __construct($str){
		$this->str = $str;
		$this->play();
	}
	function play(){
		$i=0;
		$numbers = $this->numbers();
		
		while($this->str !== ''){
			$k=$this->k;
			$num = 0;
			
			do{
				$val = $this->values($k);
				
				if( array_key_exists($val,$numbers) ){
					$num = $numbers[ $val ] + 1;
					break;
				}
				
				$k = $k-1;
			}while($k !== 0);
			
			if($k === 0){
				$this->str = $this->cut(1);
			}else{
				$filename = SPEAKER.'ru-RU/'.$num.'.mp3';
				
				$this->str = $this->cut($k);
				$this->speaker_play($num,$this->time);
				
				$i++;
				
				$this->time = $this->time + (int)ceil( filesize($filename) / 20 );
			}
		}
	}
	function values($i){
		return mb_substr($this->str,0,$i,encoding);
	}
	function cut($i){
		if($i>0){
			return mb_substr($this->str,$i, length($this->str) ,encoding);
		}else{
			return mb_substr($this->str,1, length($this->str) ,encoding);
		}
	}
	function numbers(){
		$array = array();
		$letters = array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ы','э','ю','я',' ');
		
		$count = count($letters);
		for($i=0;$i<$count;$i++){
			$letter = $letters[$i];
			$array[$letter] = $i;
		}
		
		return $array;
	}
	function speaker_play($num,$delay){
		$html = '<script>';
			$html .= 'var audio'.$num.' = new Audio("/speaker_use/ru-RU/'.$num.'.mp3");';
			$html .= 'setTimeout(function(){';
				$html .= 'audio'.$num.'.play();';
			$html .= '},'.$delay.');';
		$html .= '</script>';
		
		echo $html;
	}
}
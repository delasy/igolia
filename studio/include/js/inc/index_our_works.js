var our_works_slider_timer = 'underfined';
var our_works_slider_duration = 5000;
var our_works_slider_interval;
var our_works_slider_interval2;

function refuse_animation_our_works(){
	clearInterval(our_works_slider_interval);
	clearInterval(our_works_slider_interval2);
	clearTimeout(our_works_slider_timer);
}
function moveOurWorksSlider_prev(){
	var current = parseInt( document.getElementById('_our_works_slider').getAttribute('c') );
	var num = current-1;
	var prev = document.getElementsByClassName('our_works_slider')[ num ];
	
	if(!prev || num<0){
		num = document.getElementsByClassName('our_works_slider').length-1;
		prev = document.getElementsByClassName('our_works_slider')[ num ];
	}
	
	moveOurWorksSlider_click(prev,num);
}
function moveOurWorksSlider_next(){
	var current = parseInt( document.getElementById('_our_works_slider').getAttribute('c') );
	var num = current+1;
	var next = document.getElementsByClassName('our_works_slider')[ num ];
	
	if(!next){
		num = 0;
		next = document.getElementsByClassName('our_works_slider')[ num ];
	}
	
	moveOurWorksSlider_click(next,num);
}
function moveOurWorksSlider_click(el,num){
	if(document.getElementById('index_our_works_current') ){
		document.getElementById('index_our_works_current').removeAttribute('id');
	}
	document.getElementById('_our_works_slider').setAttribute('c',num);
	document.getElementById('look_project_for_slider').href = el.getAttribute('data-href');
	document.getElementById('_our_works_slider').src = el.getAttribute('data-src');
	
	refuse_animation_our_works();
	el.id = 'index_our_works_current';
	our_works_slider_interval = document.getElementById('our_works_slider_line').a({target:'height',from:0,to:100,type:'%'},our_works_slider_duration);
	our_works_slider_interval2 = document.getElementById('our_works_slider_line_left').a({target:'height',from:0,to:100,type:'%'},our_works_slider_duration);
	
	return our_works_slider_timer = setTimeout(moveOurWorksSlider,our_works_slider_duration);
};
function moveOurWorksSlider(){
	var targets = document.getElementsByClassName('our_works_slider'),d = 0;
	if(our_works_slider_timer !== 'undefined'){
		
		for(var i=0;i<targets.length;i++){
			var target = targets[i];
			if(target.id && target.id === 'index_our_works_current'){
				d = i+1;
				
				break;
			}
		}
		
		if(d === targets.length)d=0;
	}
	if(!d)d=0;
	
	moveOurWorksSlider_click( targets[d],d );
	
	return true;
};


var targets = document.getElementsByClassName('our_works_slider'),i;

for(i=0;i<targets.length;i++){
	var target = targets[i];
	
	target.onclick = function(){
		moveOurWorksSlider_click(this);
	}
}

moveOurWorksSlider();
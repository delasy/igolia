var time_index_slider = 500;

Element.prototype.changeIndexSlide = function(type){
	switch(type){
		case 'next':
			var parent_el = this.parentNode;
			var current = parseInt( parent_el.getAttribute('data-current') );
			var next = document.getElementById( 'index_slide_ad_'+ (current+1) ) ? (current+1) : 0;
			
			if( parent_el.getAttribute('data-a')==='true' )return false;
			parent_el.setAttribute('data-a','true');
			
			document.getElementById('index_slide_ad_'+current).a({target:'opacity',from:1,to:0,type:''},time_index_slider);
			document.getElementById('index_slide_ad_'+next).a({target:'opacity',from:0,to:1,type:''},time_index_slider);
			
			setTimeout(function(){
				document.getElementById('index_slide_ad_'+current).style.opacity = '0';
				parent_el.setAttribute('data-a','false');
			},time_index_slider+100);
			
			parent_el.setAttribute('data-current',next);
			
			break;
		default:
			var parent_el = this.parentNode;
			var current = parseInt( parent_el.getAttribute('data-current') );
			var next = document.getElementById( 'index_slide_ad_'+ (current-1) ) ? (current-1) : document.getElementsByClassName('index_slide_ad').length-1;
			
			if( parent_el.getAttribute('data-a')==='true' )return false;
			parent_el.setAttribute('data-a','true');
			
			document.getElementById('index_slide_ad_'+current).a({target:'opacity',from:1,to:0,type:''},time_index_slider);
			document.getElementById('index_slide_ad_'+next).a({target:'opacity',from:0,to:1,type:''},time_index_slider);
			
			setTimeout(function(){
				document.getElementById('index_slide_ad_'+current).style.opacity = '0';
				parent_el.setAttribute('data-a','false');
			},time_index_slider+100);
			
			parent_el.setAttribute('data-current',next);
	}
	return true;
};
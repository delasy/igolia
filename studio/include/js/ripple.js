var target = document.getElementsByClassName('ripple');
for(var k=0;k<target.length;k++){
	target[k].onclick = function(event){
		do{
			var pre_ripple_styles = document.getElementsByTagName('style');
			var rs = false;
			
			if( pre_ripple_styles ){
				for(var j=0;j<pre_ripple_styles.length;j++){
					if(pre_ripple_styles[j].id === 'ripple_styles'){
						rs = true;
						break;
					}
				}
			}
			
			if(rs)break;
			
			var ripple_styles = document.createElement('style');
			ripple_styles.id = 'ripple_styles';
			ripple_styles.innerHTML = '.ripple{overflow:hidden;}';
			ripple_styles.innerHTML += '.ripple-target{position:absolute;border-radius:50%;width:30px;height:30px;background-color:#fff;animation:ripple-animation 1s;}';
			ripple_styles.innerHTML += '@keyframes ripple-animation{from{transform:scale(1);opacity:.4;}to{transform:scale(50);}}';
			
			document.head.appendChild(ripple_styles);
			break;
		}while(1);
		
		var span = document.createElement('span');
		span.className = 'ripple-target';
		
		var win,box={top: 0, left: 0},doc = this && this.ownerDocument;

		if(typeof this.getBoundingClientRect !== typeof undefined)box = this.getBoundingClientRect();
		
		win = (doc != null && doc === doc.window) ? doc : doc.nodeType === 9 && doc.defaultView;
		
		var offset = {top:box.top + win.pageYOffset - doc.documentElement.clientTop,left:box.left + win.pageXOffset - doc.documentElement.clientLeft};
		
		var span_top = (event.pageY - offset.top - 15) + 'px';
		var span_left = (event.pageX - offset.left - 15) + 'px';
		
		span.style.top = (event.pageY - offset.top - 15) + 'px';
		span.style.left = (event.pageX - offset.left - 15) + 'px';
		
		if( this.getAttribute('ripple_radius') ){
			span.style.borderRadius = this.getAttribute('ripple_radius');
		}
		if( this.getAttribute('ripple_color') ){
			span.style.backgroundColor = this.getAttribute('ripple_color');
		}
		
		var parent = this.parentNode;
		this.appendChild(span);
		
		(function(Obj){
			window.setTimeout(function(){
				var new_span = Obj.getElementsByTagName('span');
				for(var i=0;i<new_span.length;i++){
					if(new_span[i].className === 'ripple-target'){
						var span_active_parent = new_span[i].parentNode;
						span_active_parent.removeChild(new_span[i]);
						break;
					}
				}
			},800);
		})(this);
		
		if(this.getAttribute('onclick')){
			var a=0;
			var target = document.getElementById('ripple_script');
			if(target){
				target.parentNode.removeChild(target);
			}
			var ripple_script = document.createElement('script');
			ripple_script.id='ripple_script';
			ripple_script.innerHTML = this.getAttribute('onclick');
			document.head.appendChild(ripple_script);
		}
		
		return true;
	}
}
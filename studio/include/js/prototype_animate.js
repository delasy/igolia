var a;
Element.prototype.a = function(obj,duration){
	if(duration == null)var duration = 1000;
	var start = new Date().getTime(),that = this;
	
	var a = window.setInterval(function(){
		var now = new Date().getTime() - start;
		var progress = now / duration;

		if(obj['from'] < obj['to']){
			var result = (obj['to'] - obj['from']) * progress + obj['from'];
		
			if(result > obj['to']){
				result = obj['to'];
				clearInterval(a);
			}
		}else{
			var result = ( (obj['to'] - obj['from']) ) * progress + obj['from'];
		
			if(result < obj['to']){
				result = obj['to'];
				clearInterval(a);
			}
		}
		if(obj['target']==='scrollTop'){
			document.documentElement.scrollTop = document.body.scrollTop = result;
		}else if(obj['notstyle']){
			that[ obj['target'] ] = result + obj['type'];
		}else{
			that.style[ obj['target'] ] = result + obj['type'];
		}
	},12);
	
	return a;
};
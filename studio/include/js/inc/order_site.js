listen('change',document.getElementById('tp_target_input'),function(){
	var size = this.files[0].size;
	
	if(size>=maximum_tz_upload_size)return this.value='';
	return true;
});
listen('click',document.getElementById('submit_order_site_button'),function(){
	var that=this,evt=event,to_make='',budget='',time='',tp='';
	
	var tmp = document.getElementsByName('to_make');
	for(var i = 0, length = tmp.length; i < length; i++){
		if(tmp[i].checked){
			to_make = tmp[i].value;
			break;
		}
	}
	var tmp = document.getElementsByName('budget');
	for(var i = 0, length = tmp.length; i < length; i++){
		if(tmp[i].checked){
			budget = tmp[i].value;
			break;
		}
	}
	var tmp = document.getElementsByName('time');
	for(var i = 0, length = tmp.length; i < length; i++){
		if(tmp[i].checked){
			time = tmp[i].value;
			break;
		}
	}
	var tmp = document.getElementsByName('tp');
	for(var i = 0, length = tmp.length; i < length; i++){
		if(tmp[i].checked){
			tp = tmp[i].value;
			break;
		}
	}
	
	var good1 = document.getElementById('good1').value;
	var bad1 = document.getElementById('bad1').value;
	
	var obj = {
		to_make:to_make,
		budget:budget,
		time:time,
		tp:tp,
		good1:good1,
		bad1:bad1,
		submit_order_site_button:'true'
	};
	
	var tmp = document.getElementsByClassName('error_order_site');
	for(var i=0;i<tmp.length;i++){
		tmp[i].style.display = 'none';
	}
	
	
	ajax.post('/order_site?test',obj,function(data){
		if( data!=='OK'&&document.getElementById('error_order_site_'+data) ){
			var tmp = document.getElementById('error_order_site_'+data);
			
			tmp.style.display = 'block';
			var scrollToThis = tmp.offset().top;
			
			document.body.a({target:'scrollTop',from:document.documentElement.scrollTop || document.body.scrollTop,to:scrollToThis-70},500);
			
			
			evt.preventDefault();
		}
	},false);
});
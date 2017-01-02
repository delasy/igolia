listen('click',document.getElementById('qwertyuiop'),function(){
	var Obj = document.getElementById('leave_feedback');
	Obj.style.display = (Obj.style.display==='inline-block') ? 'none' : 'inline-block';
	Obj.style.paddingTop = '46px';
	
	this.parentNode.parentNode.style.display = 'none';
});
listen('keypress',document.getElementById('postcode_input_textarea'),function(){
	this.agrow(event,20);
});
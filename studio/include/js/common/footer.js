listen('click',document.getElementById('footer_toup_button'),function(){
	document.body.a({target:'scrollTop',from:document.documentElement.scrollTop || document.body.scrollTop,to:0},1000);
});
listen('change',document.getElementById('footer_lang_bar'),function(){
	window.location.href = 'http://www.igolia.tk/cookie?language='+this.value;
});
listen('change',document.getElementById('footer_curr_bar'),function(){
	window.location.href = 'http://www.igolia.tk/cookie?currency='+this.value;
});
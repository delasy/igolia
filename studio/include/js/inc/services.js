listen('click',document.getElementById('services_clear_search_button'),function(){
	document.getElementById('services_search').value = '';
	document.getElementById('services_search').parentNode.getElementsByClassName('search')[0].removeAttribute('close');
	
	var target = document.getElementsByClassName('services_cart'),i;
	for(i=0;i<target.length;i++){
		target[i].getElementsByTagName('h3')[0].parentNode.parentNode.removeAttribute('style');
	}
	document.getElementById('services_search').focus();
	return true;
});
listen('keyup',document.getElementById('services_search'),function(){
	var Obj = document.getElementById('services_search');
	var toSearch = Obj.value.toLowerCase(), target = document.getElementsByClassName('services_cart'),i;
		
	for(i=0;i<target.length;i++){
		if( !toSearch ){
			target[i].removeAttribute('style');
			Obj.parentNode.getElementsByClassName('search')[0].removeAttribute('close');
			continue;
		}
		var new_target = target[i].getElementsByTagName('h3')[0];
		var its_text = new_target.innerHTML.toLowerCase();
		Obj.parentNode.getElementsByClassName('search')[0].setAttribute('close','');
		
		if(its_text.indexOf(toSearch) < 0)new_target.parentNode.parentNode.style.display = 'none';
		else new_target.parentNode.parentNode.style.display = 'inline-block';
	}
	if(target.length<=0)return false;
	
	return true;
});
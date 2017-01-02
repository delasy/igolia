function vertical_ellipsis_menu_show(){
	document.getElementById('vertical_ellipsis_dropdown_closer').style.display = 'block';
	
	document.getElementById('vertical_ellipsis_dropdown_closer').style.display = 'block';
	document.getElementById('vertical_ellipsis_dropdown').a({target:'left',from:-400,to:0,type:'px'},500);
	document.body.style.overflow = 'hidden';
}
function vertical_ellipsis_menu_hide(){
	document.getElementById('vertical_ellipsis_dropdown').a({target:'left',from:0,to:-400,type:'px'},500);
	document.body.style.overflow = '';
	document.getElementById('vertical_ellipsis_dropdown_closer').style.display = '';
}
listen('click',document.getElementById('vertical_ellipsis_dropdown_closer'),function(){
	vertical_ellipsis_menu_hide();
});
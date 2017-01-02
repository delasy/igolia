var index_how_we_work_timer = 500;
var index_how_we_work_inerval;

function readConst_howWeWork(el){
	var elw = parseInt( el.offsetWidth );
	var lscroll = parseInt(el.scrollLeft);
	var fchild = el.childNodes[0];
	var fchildw = fchild.offsetWidth;
	var fchild_computedStyle = getComputedStyle(fchild);
	var fchild_margins = parseInt( fchild_computedStyle['marginLeft'] ) + parseInt( fchild_computedStyle['marginRight'] );
	var fchildrw = fchildw + fchild_margins;
	var maxscroll = (parseInt(el.childNodes.length) - 1) * fchildrw;
	var nlscroll = (lscroll/fchildrw >> 0)*fchildrw;
	
	return {elw:elw,lscroll:lscroll,fchild:fchild,fchildw:fchildw,fchild_computedStyle:fchild_computedStyle,fchild_margins:fchild_margins,fchildrw:fchildrw,maxscroll:maxscroll,nlscroll:nlscroll};
}
function how_we_work_next(){
	var el = document.getElementById('parent_how_we_work');
	var obj = readConst_howWeWork(el);
	var nel = document.getElementById('how_we_work_prev');
	var needscroll = (obj.elw/obj.fchildrw >> 0)*obj.fchildrw + obj.nlscroll;
	
	if( nel.getAttribute('deactive') === 'true' ){
		nel.removeAttribute('deactive');
	}
	if( !nel.getAttribute('onclick') ){
		nel.setAttribute('onclick','how_we_work_prev()');
	}
	
	if(needscroll >= obj.maxscroll){
		document.getElementById('how_we_work_next').setAttribute('deactive','true');
		document.getElementById('how_we_work_next').removeAttribute('onclick');
	}
	
	clearInterval(index_how_we_work_inerval);
	index_how_we_work_inerval = el.a({target:'scrollLeft',from:obj.lscroll,to:needscroll,type:'',notstyle:1},index_how_we_work_timer);
}
function how_we_work_prev(){
	var el = document.getElementById('parent_how_we_work');
	var obj = readConst_howWeWork(el);
	var nel = document.getElementById('how_we_work_next');
	var needscroll = obj.nlscroll - (obj.elw/obj.fchildrw >> 0)*obj.fchildrw;
	
	if( nel.getAttribute('deactive') === 'true' ){
		nel.removeAttribute('deactive');
	}
	if( !nel.getAttribute('onclick') ){
		nel.setAttribute('onclick','how_we_work_next()');
	}
	
	if(needscroll <= 0){
		document.getElementById('how_we_work_prev').setAttribute('deactive','true');
		document.getElementById('how_we_work_prev').removeAttribute('onclick');
	}
	
	clearInterval(index_how_we_work_inerval);
	index_how_we_work_inerval = el.a({target:'scrollLeft',from:obj.lscroll,to:needscroll,type:'',notstyle:1},index_how_we_work_timer);
}
function howWeWorkTo(obj){
	var pobj = obj.parentNode,o_obj = obj.offsetLeft,o_pobj = pobj.offsetLeft,tscroll = o_obj - o_pobj - 5,left = parseInt(pobj.scrollLeft);
	
	if(left === tscroll)return false;
	
	clearInterval(index_how_we_work_inerval);
	index_how_we_work_inerval = pobj.a({target:'scrollLeft',from:left,to:tscroll,type:'',notstyle:1},index_how_we_work_timer);
}
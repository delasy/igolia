function listen(a,b,c){
	if(b.attachEvent)return b.attachEvent('on'+a,c);
	else if(b.addEventListener)return b.addEventListener(a,c,false);
}
function removeEvent(a,b,c){
    if(b.detachEvent)return b.detachEvent('on'+a,c);
	else if(b.removeEventListener)return b.removeEventListener(a,c);
}


/*

listen('keydown',document,function(e){
	if(e.keyCode==123){
		e.preventDefault();
	}else if(e.ctrlKey && e.shiftKey && e.keyCode==73){
		e.preventDefault();
	}else if(e.ctrlKey && e.keyCode==85){
		e.preventDefault();
	}
},false);

*/

var _n;
var _n_width_tmp = 140;
!function(){
	var t = document.getElementById('_line_mover');
	if(_n_width_tmp === 140){
		_n_width_tmp = 120;
		var _n_width_from = 140;
		var _n_width_to = 120;
	}else{
		_n_width_tmp = 140;
		var _n_width_from = 120;
		var _n_width_to = 140;
	}
	
	t.a({target:'width',from:_n_width_from,to:_n_width_to,type:'px'},1000);
	
	_n = setTimeout(arguments.callee,1000);
}();



//images_drag.js
!function(){
	var target = document.getElementsByTagName('img');
	
	for(var i=0;i<target.length;i++){
		target[i].setAttribute('ondragstart','return false');
		target[i].setAttribute('oncontextmenu','return false');
	}
}();

// _.js
listen('load',window,function(){
	clearTimeout(_n);
    document.getElementById('_').parentNode.removeChild(document.getElementById('_'));
    document.body.style.overflow = '';
});

// prototype_agrow.js
HTMLTextAreaElement.prototype.agrow = function(e,step){
	if(step==undefined)var step = 20;
	var that = this;
	var key = e.keyCode || e.keyChar;
	
	if(key === 13){
		that.style.height = '0px';
		
		that.style.height = that.scrollHeight +step+ 'px';
	}
};


Element.prototype.offset = function(){
	var elem = this;
    var docElem,win,box = { top: 0, left: 0 },doc = elem && elem.ownerDocument;

    docElem = doc.documentElement;

    if(typeof elem.getBoundingClientRect !== typeof undefined)box = elem.getBoundingClientRect();
	
    win = (doc != null && doc === doc.window) ? doc : doc.nodeType === 9 && doc.defaultView;
    return {
        top: box.top + win.pageYOffset - docElem.clientTop,
        left: box.left + win.pageXOffset - docElem.clientLeft
    };
};
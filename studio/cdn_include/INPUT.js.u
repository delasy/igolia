/*!

Plugin: igoliaINPUT
Web site: http://www.igolia.tk/
Version: 1.0

Author: delasy

Copyright 2014 - 2017

Date: 2017-02-01T23:36Z

Attributes for main input:
.id
.value
.placeholder
.className
.classNameDropdown
.clear-dates-text
.close-dropdown-text
.next-dropdown-text
.prev-dropdown-text
.days-name
.months-name
.dates_array
.type
.callback
.autoscroll
.autoscroll-offset
.mindays
.mindays-desc
.maxdays
.maxdays-desc
.maxmonths
.maxmonths-desc
.show-desc
.hidden-access

Attributes for other input
.id
.value
.placeholder
.className
.another-position

Usage
<input id="igoliaInput"><script src="http://www.igolia.tk/cdn/INPUT?fid=igoliaInput"></script>


*/
var ext_div_id = '',igoliaINPUTname = 'igoliaINPUT',igoliaINPUTdelimiter='.';
var fid= "<?=$_GET['fid']?>";
var sid= "<?=$_GET['sid']?>";

var postfixINPUT = 'external';

var arrayINPUT = [0,1];
for(var i=0;i<5;i++)ext_div_id += '0123456789'.charAt(Math.floor(Math.random() * '0123456789'.length));
if( arrayINPUT[Math.floor(Math.random()*arrayINPUT.length)] === 1){
	var ext_div_id = ext_div_id + '_' + igoliaINPUTname;
}else{
	var ext_div_id = igoliaINPUTname + '_' + ext_div_id;
}

Element.prototype.igoliaINPUT = function(ee){
	var igoliaINPUTtype = 'single';

	var igoliaINPUTtype_a = ['double','single'];

	var e = this,p = e.parentNode,div = document.createElement('div');

	var div_e = document.createElement('div');
	var div_ee = document.createElement('div');
	var calendar = {};
	var dropdown = document.createElement('div');
	var fda = (e.hasAttribute('dates_array')&&e.getAttribute('dates_array').indexOf(',') !== -1)?e.getAttribute('dates_array').split(','):false;

	if(e.getAttribute('type')&&igoliaINPUTtype_a.indexOf(e.getAttribute('type')) !== -1){
		igoliaINPUTtype = e.getAttribute('type');
	}

	var days_array = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
	var months_array = ['Jan','Feb','Mar','Apr','May','June','July','Aug','Sept','Oct','Nov','Dec'];

	if( e.getAttribute('days-name')&&e.getAttribute('days-name').split(',').length === 7 ){
		days_array = e.getAttribute('days-name')&&e.getAttribute('days-name').split(',');
	}
	if( e.getAttribute('months-name')&&e.getAttribute('months-name').split(',').length === 12 ){
		months_array = e.getAttribute('months-name')&&e.getAttribute('months-name').split(',');
	}

	function in_array(needle,haystack,strict){
		var found = false, key, strict = !!strict;

		for (key in haystack) {
			if ((strict && haystack[key] === needle) || (!strict && haystack[key] == needle)) {
				found = true;
				break;
			}
		}

		return found;
	}

	function calcMonths(months,tmpss){
		var tmpsfm = new Date().getMonth()+months;
		tmpsfm = tmpsfm>11?tmpsfm-11:tmpsfm;
		var tmpsfy = tmpsfm>11?new Date().getFullYear()+1:new Date().getFullYear();
		var tmpsf = new Date(tmpsfy,tmpsfm,new Date().getDate());

		if(tmpss>=tmpsf){
			return false;
		}else{
			return true;
		}
	}

	function build_custom_input(Obj,tmp_attr){
		var tmp = document.createElement('div');

		var this_h = document.createElement('h1');
		var toInsert_inH = (Obj.mm-1)<0?11:Obj.mm-1;
		this_h.innerHTML = months_array[toInsert_inH]+' '+Obj.yy;
		this_h.className = igoliaINPUTname+'--nav-h';

		tmp.appendChild(this_h);

		var tmps = document.createElement('div');
		tmps.className = igoliaINPUTname+'--nav-nav';

		for(var i=0;i<days_array.length;i++){
			var new_div = document.createElement('div');
			new_div.className = igoliaINPUTname+'--nav-title';

			new_div.innerHTML = days_array[i];
			tmps.appendChild(new_div);
		}

		tmp.appendChild(tmps);

		for(var i=1;i<Obj.wd;i++){
			var new_div = document.createElement('div');

			new_div.className = igoliaINPUTname+'--date';
			new_div.style['visibility'] = 'hidden';
			new_div.style['cursor'] = 'default';
			tmp.appendChild(new_div);
		}

		for(var i=1;i<=Obj.dim;i++){
			var new_div = document.createElement('div');
			new_div.innerHTML = i;
			var toInsertMonth = Obj.mm<10?'0'+Obj.mm:Obj.mm;
			var toInsertDay = i<10?'0'+i:i;
			var date_toInsert = i+igoliaINPUTdelimiter+toInsertMonth+igoliaINPUTdelimiter+Obj.yy;
			new_div.setAttribute('toInsert',date_toInsert);

			if(fda){
				var dtmp = Obj.yy+toInsertMonth+toInsertDay;

				if(!in_array(dtmp,fda)){
					new_div.className = igoliaINPUTname+'--date';
					new_div.setAttribute('false','');
					tmp.appendChild(new_div);

					continue;
				}
			}

			if(e.hasAttribute('maxmonths')){
				var td = date_toInsert;
				if(td.indexOf('.') === 1){
					var tmpss = new Date(td.substring(5,9),parseInt( td.substring(2,4) ) - 1, parseInt(td.substring(0,1)));
				}else{
					var tmpss = new Date(td.substring(6, 10),parseInt( td.substring(3, 5) ) - 1, parseInt(td.substring(0, 2)));
				}

				if( !calcMonths(  parseInt(e.getAttribute('maxmonths')),tmpss  ) ){
					new_div.className = igoliaINPUTname+'--date';
					new_div.setAttribute('false','');
					tmp.appendChild(new_div);

					continue;
				}
			}


			if( new Date(Obj.yy,toInsertMonth,i).getTime()/1000 < new Date(new Date().getFullYear(),new Date().getMonth()+1,new Date().getDate()).getTime()/1000 ){
				new_div.className = igoliaINPUTname+'--date';
				new_div.setAttribute('false','');
			}else{
				new_div.className = igoliaINPUTname+'--date';

				new_div.onmouseenter = function(){
					if(!e.getAttribute('current')||e.getAttribute('current')==='first')return false;


					var td = this.getAttribute('toInsert');

					if(td.indexOf('.') === 1){
						var hoverDate = new Date(td.substring(5,9),parseInt( td.substring(2,4) ) - 1,td.substring(0, 1));
					}else{
						var hoverDate = new Date(td.substring(6, 10),parseInt( td.substring(3, 5) ) - 1,td.substring(0, 2));
					}

					var th = document.getElementById(ext_div_id+'selected').getAttribute('toInsert');

					if(th.indexOf('.') === 1){
						var selectedDate = new Date(th.substring(5,9),parseInt( th.substring(2,4) ) - 1,th.substring(0, 1));
					}else{
						var selectedDate = new Date(th.substring(6, 10),parseInt( th.substring(3, 5) ) - 1,th.substring(0, 2));
					}

					if(hoverDate > selectedDate){
						var dates_accepted = [],dates_accepted_fda = [];

						if(td.indexOf('.') === 1){
							var phd = new Date(td.substring(5,9),parseInt( td.substring(2,4) ) - 1, parseInt(td.substring(0,1)));
						}else{
							var phd = new Date(td.substring(6, 10),parseInt( td.substring(3, 5) ) - 1, parseInt(td.substring(0, 2)));
						}

						if(th.indexOf('.') === 1){
							var psd = new Date(th.substring(5,9),parseInt( th.substring(2,4) ) - 1, parseInt(th.substring(0,1))+1);
						}else{
							var psd = new Date(th.substring(6, 10),parseInt( th.substring(3, 5) ) - 1, parseInt(th.substring(0, 2))+1);
						}


						for(var d = psd; d <= phd; d.setDate(d.getDate() + 1)){
							var stmps = new Date(d);
							var stmpsm = (stmps.getMonth()+1)<10?'0'+(stmps.getMonth()+1):stmps.getMonth()+1;
							dates_accepted.push(stmps.getDate()+'.'+stmpsm+'.'+stmps.getFullYear());

							var dti = stmps.getDate()<10?'0'+stmps.getDate():stmps.getDate();
							dates_accepted_fda.push(stmps.getFullYear()+stmpsm+dti);
						}


						if(e.hasAttribute('mindays')&&parseInt(e.getAttribute('mindays'))>0){
							var ttt = parseInt(e.getAttribute('mindays'))-1;

							if(dates_accepted_fda.length<ttt)return false;
						}
						if(e.hasAttribute('maxdays')&&parseInt(e.getAttribute('maxdays'))>0){
							var ttt = parseInt(e.getAttribute('maxdays'))-1;

							if(dates_accepted_fda.length>ttt)return false;
						}

						if(fda){
							for(var i = 0; i < dates_accepted_fda.length; i++){
								if(fda.indexOf(dates_accepted_fda[i]) === -1)return false;
							}
						}

						if(dates_accepted.length>0){
							var tt = document.getElementsByClassName(igoliaINPUTname+'--date');
							for(var k=0;k<tt.length;k++){
								var kt=tt[k];

								if( in_array(kt.getAttribute('toInsert'),dates_accepted) ){
									kt.setAttribute('spanhover','true');
								}
							}
						}
					}else{
						return false;
					}
				};

				new_div.onmouseleave = function(){
					var tt = document.getElementsByClassName(igoliaINPUTname+'--date');
					for(var j=0;j<tt.length;j++){
						var kj=tt[j];


						if(kj.igoliaINPUTcab('spanhover')){
							kj.removeAttribute('spanhover');
						}
					}
				};




				new_div.onclick = function(){
					if(igoliaINPUTtype==='double'){
						if(e.getAttribute('current')==='first'){
							if( document.getElementById(ext_div_id+'selected') ){
								document.getElementById(ext_div_id+'selected').className = igoliaINPUTname+'--date';
								document.getElementById(ext_div_id+'selected').removeAttribute('id');
							}


							this.id = ext_div_id+'selected';
							this.className = igoliaINPUTname+'--selected';

							e.igoliaINPUTvalue( this.getAttribute('toInsert'),div_e );

							e.setAttribute('current','second');
						}else{
							var td = this.getAttribute('toInsert');

							if(td.indexOf('.') === 1){
								var hoverDate = new Date(td.substring(5,9),parseInt( td.substring(2,4) ) - 1,td.substring(0, 1));
							}else{
								var hoverDate = new Date(td.substring(6, 10),parseInt( td.substring(3, 5) ) - 1,td.substring(0, 2));
							}
							var th = document.getElementById(ext_div_id+'selected').getAttribute('toinsert');

							if(th.indexOf('.') === 1){
								var selectedDate = new Date(th.substring(5,9),parseInt( th.substring(2,4) ) - 1,th.substring(0, 1));
							}else{
								var selectedDate = new Date(th.substring(6, 10),parseInt( th.substring(3, 5) ) - 1,th.substring(0, 2));
							}

							if(hoverDate <= selectedDate){
								return false;
							}else if(fda){
								var dates_accepted_fda = [];

								if(td.indexOf('.') === 1){
									var phd = new Date(td.substring(5,9),parseInt( td.substring(2,4) ) - 1, parseInt(td.substring(0,1)));
								}else{
									var phd = new Date(td.substring(6, 10),parseInt( td.substring(3, 5) ) - 1, parseInt(td.substring(0, 2)));
								}

								if(th.indexOf('.') === 1){
									var psd = new Date(th.substring(5,9),parseInt( th.substring(2,4) ) - 1, parseInt(th.substring(0,1))+1);
								}else{
									var psd = new Date(th.substring(6, 10),parseInt( th.substring(3, 5) ) - 1, parseInt(th.substring(0, 2))+1);
								}

								for(var d = psd; d <= phd; d.setDate(d.getDate() + 1)){
									var stmps = new Date(d);
									var stmpsm = (stmps.getMonth()+1)<10?'0'+(stmps.getMonth()+1):stmps.getMonth()+1;
									var dti = stmps.getDate()<10?'0'+stmps.getDate():stmps.getDate();

									dates_accepted_fda.push(stmps.getFullYear()+stmpsm+dti);
								}

								if(e.hasAttribute('mindays')&&parseInt(e.getAttribute('mindays'))>0){
									var ttt = parseInt(e.getAttribute('mindays'))-1;

									if(dates_accepted_fda.length<ttt)return false;
								}
								if(e.hasAttribute('maxdays')&&parseInt(e.getAttribute('maxdays'))>0){
									var ttt = parseInt(e.getAttribute('maxdays'))-1;

									if(dates_accepted_fda.length>ttt)return false;
								}

								if(fda){
									for(var i = 0; i < dates_accepted_fda.length; i++){
										if(fda.indexOf(dates_accepted_fda[i]) === -1){
											return false;
										}
									}
								}
							}

							ee.igoliaINPUTvalue( this.getAttribute('toInsert'),div_ee);

							dropdown.setAttribute('igoliaINPUT','hidden');

							document.getElementById(ext_div_id+'selected').className = igoliaINPUTname+'--date';
							document.getElementById(ext_div_id+'selected').removeAttribute('id');

							e.setAttribute('current','first');

							if(e.hasAttribute('callback')&&typeof window[e.getAttribute('callback')] == 'function'){
								window[e.getAttribute('callback')]();
							}
						}
					}else{
						e.igoliaINPUTvalue( this.getAttribute('toInsert'),postfixINPUT+ext_div_id );
						dropdown.setAttribute('igoliaINPUT','hidden');

						if(e.hasAttribute('callback')&&typeof window[e.getAttribute('callback')] == 'function'){
							window[e.getAttribute('callback')]();
						}
					}
				};
			}
			tmp.appendChild(new_div);
		}

		tmp.className = igoliaINPUTname+'--dateswrap';
		tmp.setAttribute('box',tmp_attr);

		return tmp;
	}

	function buildNav(div){
		var tmp = document.createElement('div');
		tmp.className = igoliaINPUTname+'--nav';

		var next = document.createElement('button');

		next.type = 'button';

		next.onclick=function(){
			var els = div.getElementsByClassName(igoliaINPUTname+'--dateswrap');


			if(igoliaINPUTtype==='double'){
				div.removeChild(els[1]);
			}
			div.removeChild(els[0]);

			calendar.current = calcObject(e.getAttribute('cy'),e.getAttribute('cm'));
			calendar.next = calcObject(calendar.current.yy,calendar.current.mm);

			var fbox = build_custom_input(calendar.current,'first');
			dropdown.appendChild( fbox );

			if(e.getAttribute('current')!=='first'){
				var l = document.getElementsByClassName(igoliaINPUTname+'--date');
				for(var h=0;h<l.length;h++){
					var hh = l[h];

					if( hh.getAttribute('toInsert')&&hh.getAttribute('toInsert')===e.value ){
						hh.id = ext_div_id+'selected';
						hh.className = igoliaINPUTname+'--selected';

						break;
					}
				}

				var ediv = document.createElement('div');
				ediv.id = ext_div_id+'selected';
				ediv.setAttribute('toInsert',e.value);

				fbox.appendChild(ediv);
			}


			if(igoliaINPUTtype==='double'){
				dropdown.appendChild( build_custom_input(calendar.next,'second') );
			}

			e.setAttribute('cm',calendar.current.mm);
			e.setAttribute('cy',calendar.current.yy);
		}

		next.className = igoliaINPUTname+'--next';
		next.innerHTML = 'next';
		if(e.hasAttribute('next-dropdown-text')){
			next.innerHTML = e.getAttribute('next-dropdown-text');
		}

		var prev = document.createElement('button');
		prev.type = 'button';
		prev.className = igoliaINPUTname+'--prev';
		prev.innerHTML = 'prev';
		if(e.hasAttribute('prev-dropdown-text')){
			prev.innerHTML = e.getAttribute('prev-dropdown-text');
		}

		prev.onclick=function(){
			var els = div.getElementsByClassName(igoliaINPUTname+'--dateswrap');


			if(igoliaINPUTtype==='double'){
				div.removeChild(els[1]);
			}
			div.removeChild(els[0]);

			calendar.current = calcObject(e.getAttribute('cy'),e.getAttribute('cm'),'left');
			calendar.next = calcObject(calendar.current.yy,calendar.current.mm);

			var fbox = build_custom_input(calendar.current,'first');
			if(e.getAttribute('current')!=='first'){
				var l = document.getElementsByClassName(igoliaINPUTname+'--date');
				for(var h=0;h<l.length;h++){
					var hh = l[h];

					if( hh.getAttribute('toInsert')&&hh.getAttribute('toInsert')===e.value ){
						hh.id = ext_div_id+'selected';
						hh.className = igoliaINPUTname+'--selected';

						break;
					}
				}

				var ediv = document.createElement('div');
				ediv.id = ext_div_id+'selected';
				ediv.setAttribute('toInsert',e.value);

				fbox.appendChild(ediv);
			}
			dropdown.appendChild( fbox );

			if(igoliaINPUTtype==='double'){
				dropdown.appendChild( build_custom_input(calendar.next,'second') );
			}

			e.setAttribute('cm',calendar.current.mm);
			e.setAttribute('cy',calendar.current.yy);
		}

		var stmp = document.createElement('button');
		stmp.innerHTML = '&times;';

		if(e.hasAttribute('close-dropdown-text')){
			stmp.innerHTML = e.getAttribute('close-dropdown-text')
		}

		stmp.className = igoliaINPUTname+'--close';

		stmp.onclick = function(){
			dropdown.setAttribute('igoliaINPUT','hidden');
		};
		stmp.type = 'button';
		tmp.appendChild(stmp);

		tmp.appendChild(prev);
		tmp.appendChild(next);

		return tmp;
	}
	function calcObject(year,month,dir){
		if(dir == undefined){
			dir='right';
		}
		var Obj = {};

		if(year === 'current'){
			Obj.date = new Date();
			Obj.mm = Obj.date.getMonth()+1;
			Obj.yy = Obj.date.getFullYear();
			Obj.wd = new Date(Obj.yy,Obj.mm,1).getDay();
			Obj.dim = new Date(Obj.yy,Obj.mm,0).getDate();
		}else if(year&&month&&dir==='right'){
			year = parseInt(year);
			month = parseInt(month);
			Obj.mm = (month+1)<=12?month+1:1;
			Obj.yy = (month+1)<=12?year:year+1;

			if(Obj.mm===1&&Obj.yy===2017){
				Obj.wd = 7;
			}else{
				Obj.wd = new Date(Obj.yy,Obj.mm-1,1).getDay();
			}

			Obj.dim = new Date(Obj.yy,Obj.mm,0).getDate();
		}else if(year&&month&&dir==='left'){
			year = parseInt(year);
			month = parseInt(month);

			Obj.mm = (month-1)<=0?12:month-1;
			Obj.yy = (month-1)<=0?year-1:year;

			if(Obj.mm===1&&Obj.yy===2017){
				Obj.wd = 7;
			}else{
				Obj.wd = new Date(Obj.yy,Obj.mm-1,1).getDay();
			}


			Obj.dim = new Date(Obj.yy,Obj.mm,0).getDate();
		}

		return Obj;
	}


	div_e.id = postfixINPUT+ext_div_id;



	if( e.value ){
		div_e.innerHTML = e.value;
		e.igoliaINPUTvalue( e.value,div_e );
	}else if(e.placeholder){
		div_e.innerHTML = e.placeholder;
	}else{
		div_e.innerHTML = '';
	}
	if( e.hasAttribute('className') ){
		div_e.className = e.getAttribute('className');
	}else{
		div_e.style.cssText = document.defaultView.getComputedStyle(e,'').cssText;
	}
	e.style['display'] = 'none';
	e.type = 'hidden';

	if(igoliaINPUTtype==='double'){
		div_ee.id = postfixINPUT+ext_div_id+'2';



		if( ee.value ){
			div_ee.innerHTML = ee.value;
			ee.igoliaINPUTvalue( ee.value,div_ee );
		}else if(ee.placeholder){
			div_ee.innerHTML = ee.placeholder;
		}else{
			div_ee.innerHTML = '';
		}
		if( ee.hasAttribute('className') ){
			div_ee.className = ee.getAttribute('className');
		}else if( e.hasAttribute('className') ){
			div_ee.className = e.getAttribute('className');
		}else{
			div_ee.style.cssText = document.defaultView.getComputedStyle(ee,'').cssText;
		}
		ee.style['display'] = 'none';
		ee.type = 'hidden';
	}


	calendar.current = calcObject('current');
	calendar.next = calcObject(calendar.current.yy,calendar.current.mm);


	dropdown.setAttribute('igoliaINPUT','hidden');
	dropdown.onclick = function(e){
		e.stopPropagation();
	}



	p.insertBefore(div_e,e);
	if(igoliaINPUTtype==='double'){
		if(ee.igoliaINPUTcab('another-position')){
			pp = ee.parentNode;
			pp.insertBefore(div_ee,ee);
		}else{
			p.insertBefore(div_ee,e);
		}
	}



	dropdown.appendChild( buildNav(dropdown) );

	if(!e.hasAttribute('button-clear-dates')&&e.getAttribute('button-clear-dates')!=='false'){
		var tmps = document.createElement('button');
		tmps.className = igoliaINPUTname+'--clear-dates';
		tmps.innerHTML = 'Clear dates';
		if(e.hasAttribute('clear-dates-text')){
			tmps.innerHTML = e.getAttribute('clear-dates-text');
		}
		tmps.type = 'button';

		tmps.onclick = function(){
			e.igoliaINPUTvalue('',div_e);

			if(e.placeholder){
				div_e.innerHTML = e.placeholder;
			}

			dropdown.setAttribute('igoliaINPUT','hidden');

			if(igoliaINPUTtype==='double'){
				ee.igoliaINPUTvalue('',div_ee);
				if(ee.placeholder){
					div_ee.innerHTML = ee.placeholder;
				}
			}

			e.setAttribute('current','first');
			if( document.getElementById(ext_div_id+'selected') ){
				document.getElementById(ext_div_id+'selected').className = igoliaINPUTname+'--date';
				document.getElementById(ext_div_id+'selected').id = '';
			}
		};
		dropdown.appendChild(tmps);
	}

	dropdown.appendChild( build_custom_input(calendar.current,'first') );
	if(igoliaINPUTtype==='double'){
		dropdown.appendChild( build_custom_input(calendar.next,'second') );
	}


	window.addEventListener('click',function(){
		dropdown.setAttribute('igoliaINPUT','hidden');
	},false);

	dropdown.id = ext_div_id;
	if(e.hasAttribute('classNameDropdown')){
		dropdown.className = e.getAttribute('classNameDropdown');
	}

	if(e.igoliaINPUTcab('show-desc')){
		var info_block = document.createElement('p');
		info_block.className = igoliaINPUTname+'--info-block';
		info_block.innerHTML = '';

		if(e.hasAttribute('mindays')){
			if(e.hasAttribute('mindays-desc')){
				info_block.innerHTML +=e.getAttribute('mindays-desc');
			}else{
				info_block.innerHTML +='Minimum days to select: ';
			}
			info_block.innerHTML += parseInt(e.getAttribute('mindays'))+'<br>';
		}
		if(e.hasAttribute('maxdays')){
			if(e.hasAttribute('maxdays-desc')){
				info_block.innerHTML +=e.getAttribute('maxdays-desc');
			}else{
				info_block.innerHTML +='Maximum days to select: ';
			}
			info_block.innerHTML += parseInt(e.getAttribute('maxdays'))+'<br>';
		}
		if(e.hasAttribute('maxmonths')){
			if(e.hasAttribute('maxmonths-desc')){
				info_block.innerHTML +=e.getAttribute('maxmonths-desc');
			}else{
				info_block.innerHTML +='Maximum months to select: ';
			}
			info_block.innerHTML += parseInt(e.getAttribute('maxmonths'))+'<br>';
		}
		dropdown.appendChild( info_block );
	}

	p.insertBefore(dropdown,e);


	e.setAttribute('cm',calendar.current.mm);
	e.setAttribute('cy',calendar.current.yy);
	e.setAttribute('current','first');

	function autoscroll(){
		var a = dropdown;
		var offset = 0;
		do{
			if( !isNaN(a.offsetTop) ){
				offset += a.offsetTop;
			}
		}while( a = a.offsetParent );

		var userOffset = e.hasAttribute('autoscroll-offset')?parseInt(e.getAttribute('autoscroll-offset')):0;

		offset=offset-window.innerHeight+dropdown.offsetHeight+userOffset;


		window.scrollTo(0,offset);
	}

	if(!e.igoliaINPUTcab('autoscroll')){
		function autoscroll(){}
	}
	div_e.onclick=function(e){
		e.stopPropagation();
		dropdown.setAttribute('igoliaINPUT','visible');
		autoscroll();
	}
	if(igoliaINPUTtype==='double'){
		div_ee.onclick=function(e){
			e.stopPropagation();
			dropdown.setAttribute('igoliaINPUT','visible');
			autoscroll();
		}
	}
	if(e.hasAttribute('hidden-access')){
		if(document.getElementById(e.getAttribute('hidden-access'))){
			document.getElementById(e.getAttribute('hidden-access')).addEventListener('click',function(e){
				e.stopPropagation();
				dropdown.setAttribute('igoliaINPUT','visible');
				autoscroll();
			},false);
		}
	}
};
Element.prototype.igoliaINPUTcab = function(an){
	return this.hasAttribute(an)&&this.getAttribute(an)==='true';
};

Element.prototype.igoliaINPUTvalue=function(v,st){
	this.value = v;
	if(typeof st!=='string')st.innerHTML = this.value;
	else document.getElementById(st).innerHTML = this.value;
	return true;
};

if( document.getElementById(fid) && document.getElementById(fid).getAttribute('type') && document.getElementById(fid).getAttribute('type') === 'single' ){
	document.getElementById(fid).igoliaINPUT();
}else if( document.getElementById(fid) && document.getElementById(fid).getAttribute('type') && document.getElementById(fid).getAttribute('type') === 'double' && document.getElementById(sid) ){
	document.getElementById(fid).igoliaINPUT( document.getElementById(sid) );
}

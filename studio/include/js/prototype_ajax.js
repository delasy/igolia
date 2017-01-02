var ajax = {};

ajax.send = function(url,callback,method,data,async){
	if(async === undefined)async = true;

	if(window.XMLHttpRequest)var x = new XMLHttpRequest();
	else var x = new ActiveXObject('Microsoft.XMLHTTP');

	x.open(method,url,async);
	x.onreadystatechange = function(){if(x.readyState == 4 && typeof callback === 'function')callback(x.responseText);};
	if(method == 'POST')x.setRequestHeader('Content-type','application/x-www-form-urlencoded');

	return x.send(data);
};

ajax.get = function(url,data,callback,async){
    var query = [];
    for(var key in data){
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    }
    return ajax.send(url + (query.length ? '?'+query.join('&') : ''),callback,'GET',null,async)
};

ajax.post = function(url,data,callback,async){
    var query = [];
    for(var key in data){
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    }
    return ajax.send(url,callback,'POST',query.join('&'),async);
};
<?php ?>
<script src="/include/js/md5.js"></script>
<input type="text" id="text">
<input type="submit" onclick="document.getElementById('outsert').innerHTML = md5(document.getElementById('text').value);return false;">

<div id="outsert">0</div>
<input type="text" id="text2">
<input type="submit" onclick="crack(document.getElementById('text2').value);return false;">
<div id="insert">0</div>
<script>
var charset = ' !"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyz{|}~';
//var charset = '0123456789';
function crack(value){
    function toRadix(N){
        var HexN = "", 
            Q = Math.floor(Math.abs(N)), 
            R,
            strv = charset,
            radix = strv.length;
        while (true) {
            R = Q % radix;
            HexN = strv.charAt(R) + HexN;
            Q = (Q - R) / radix; 
            if (Q == 0) 
                break;
        };
        return ((N < 0) ? "-" + HexN : HexN);
    };
    var demo = '',
        cracked = false,
        index = 0;
    while(!cracked){
		var its = toRadix(index);
        if(md5(its) == value){
            cracked = true;
			demo = its;
        }else{
			document.getElementById('insert').innerHTML = its;
			index++;
		}
    };
    document.getElementById('insert').innerHTML = demo;
};
</script>
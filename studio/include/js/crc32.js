var makeCRCTable=function(){var c,a=[],n,k;for(n=0;n<256;n++){c=n;for(k=0;k<8;k++)c=((c&1)?(0xEDB88320^(c>>>1)):(c>>>1));a[n]=c;}return a;},crc32=function(str){var crcTable = window.crcTable || (window.crcTable = makeCRCTable()),crc = 0 ^ (-1),i;for(i=0;i<str.length;i++)crc=(crc>>>8)^crcTable[(crc^str.charCodeAt(i))&0xFF];return (crc^(-1))>>>0;};
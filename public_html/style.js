function style(){
	var xd=document.styleSheetSets;
	var style=document.getElementById("style");
	var lista=document.createElement('select');
	
	for(var i=0;i<xd.length;i++){
	      	var styl=document.createElement('option');
		var nazwa=xd[i];
		styl.innerHTML=nazwa;
		styl.setAttribute("onclick","zmianaStylu(\""+nazwa+"\")");
		lista.appendChild(styl);
	}
	style.appendChild(lista);
}

function zmianaStylu(nazwa){
	var xd=document.styleSheets;
	for(var i=0;i<xd.length;i++){
		if(xd[i].title==nazwa){
			xd[i].disabled=false;
		}
		else{
			xd[i].disabled=true;
		}
	}
	ciacho(nazwa);
}

function ciacho(nazwa){
	var data=new Date();
	data.setTime(data.getTime()+(365*24*60*60*1000));
	document.cookie="styl"+"="+nazwa+"; expires="+data.toGMTString()+"; path=/";
}

function zjedzciacho(){
	var ciacho=przygotujciacho("styl");
	if(ciacho!=null) zmianaStylu(ciacho);
}

function przygotujciacho(nazwa){
	nazwa=nazwa+"=";
	var ciacho=decodeURIComponent(document.cookie);
	var tab=ciacho.split(';');
	for(var i=0;i<tab.length;i++){
		var j=tab[i];
		while(j.charAt(0)==' '){
			j=j.substring(1);
		}
		if(j.indexOf(nazwa)==0){
			return j.substring(nazwa.length, j.length);
		}
	}
	return "";
}

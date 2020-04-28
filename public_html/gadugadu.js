function jedziemy(){
	var guzik=document.getElementById("guzik");
	var rozmowa=document.getElementById("rozmowa");
	var nick=document.getElementById("wklej");
	var wiadomosc=document.getElementById("wiadomosc");
	var wyslij=document.getElementById("wyslij");
	var wysylanie=document.getElementById("wysylanie");

	guzik.addEventListener("change", onoff);
	wysylanie.addEventListener("submit", sending);
}

function onoff(guzik){
	guzik=guzik.target.checked;
	wiadomosc.disabled=!guzik;
	wyslij.disabled=!guzik;
	if(guzik){
		var xml=new XMLHttpRequest();
		xml.open("GET", "wiadomosci.php?fetch=true");
		xml.send();
		xml.onreadystatechange = function() {
			if (xml.status==200) {
				rozmowa.value=xml.responseText;
			}
		};
		czat();
	}
}

function czat(){
	var xml=new XMLHttpRequest();
        xml.open("GET","wiadomosci.php");
        xml.send();
        xml.onreadystatechange = function(){
        	if(xml.status==200){
                	rozmowa.value=xml.responseText;
			czat();
        	}
	};
}

function sending(wys) {
	wys.preventDefault();
	if (!nick.value || !wiadomosc.value) {
    		alert("Wpisz nick i wiadomość");
    		return;
  	}

  	var formData = new FormData(wys.target);
  	var xml = new XMLHttpRequest();
  	xml.open("POST", "dowyslania.php");
  	xml.send(formData);

  	wiadomosc.value = '';
}

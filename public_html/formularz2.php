<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Lab PHP</title>
<script>
	function Time(){
		var date = new Date();
		var h = date.getHours();
		var m = date.getMinutes();
		var y = date.getFullYear();
		var M = date.getMonth()+1;
		var d = date.getDate();
		h = View(h);
		m = View(m);
		M = View(M);
		d = View(d);
		
		document.getElementById('data').value=y+"-"+M+"-"+d;
		document.getElementById('godzina').value=h+":"+m;
		//var t = setTimeout(Time, 500);
	}
	
	function View(v){
		if(v<10){
			v="0"+v;
		}
		return v;
	}
	
	function Check(){
		var date = new Date();
		var data = document.getElementById('data').value;
		var godzina = document.getElementById('godzina').value;

		if(data.length==10 && godzina.length==5){
			if(data[4]!='-' || data[7]!='-' || godzina[2]!=':') Time();

			var year = parseInt(data[0]+data[1]+data[2]+data[3]);
			if(year>date.getFullYear()) Time();

			var month = parseInt(data[5]+data[6]);
			if(month>12 || month<1) Time();
			
			var day = parseInt(data[8]+data[9]);
			if(month==1 || month==3 || month==5 || month==7 || month==8 || month==10 || month==12){
				if(day>31 || day<1) Time();
			}
			if(month==4 || month==6 || month==9 || month==11){
				if(day>30 || day<1) Time();
			}
			if(month==2){
				if(year%4==0){
					if(day>29 || day<1) Time();
				}
				else{
					if(day>28 || day<1) Time();
				}
			}
			
			var godz = parseInt(godzina[0]+godzina[1]);
			if(godz>23 || godz<0) Time();
			
			var min = parseInt(godzina[3]+godzina[4]);
			if(min>59 || min<0) Time();

			if(year==date.getFullYear()){
				if(month>date.getMonth()+1) Time();
				if(month==date.getMonth()+1){
					if(day>date.getDate()) Time();
				}
			}
		}
		else Time();
	}

	function newFile(nrpliku){
		nrpliku++;
		
		var nowyPlik = document.createElement('input');
      		nowyPlik.setAttribute("type", "file");
      		nowyPlik.setAttribute("name", "plik"+nrpliku);
      		nowyPlik.setAttribute("onclick", "newFile("+nrpliku+")");

      		var pliki = document.getElementById("pliki");
      		pliki.appendChild(nowyPlik);
	}

	</script>
</head>
<body onload="Time()">

	<?php include 'menu.php'; ?>
	<form action="wpis.php" method="post" enctype="multipart/form-data">
                <p>Nazwa uzytkownika</p>
                <input type="text" name="nazwa">
                <p>Haslo</p>
                <input type="password" name="haslo">
                <p>Wpis</p>
		<textarea cols="50" rows="9" name="wpis">
		</textarea>
		<p>Data: <input type="text" name="data" id="data" onchange="Check()"></p>
		<p>Godzina: <input type="text" name="godzina" id="godzina" onchange="Check()"></p>
		<p>Załączniki</p>
		<div id="pliki">
		<input type="file" name="plik1" onclick="newFile(1)">
		</div>
		<p>
                <input type="reset" value="Wyczyść" name="wyczysc" />
                <input type="submit" value="Wyślij">
		</p>
        </form>
</body>
</html>


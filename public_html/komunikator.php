<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Komunikator</title>

<script type="text/javascript" src="gadugadu.js">
</script>
</head>
<body onload="jedziemy()">
	<p><input type="checkbox" id="guzik">Włączony</p>
        <p>Rozmowa:</p>
        <textarea rows="20" cols="50" disabled id="rozmowa"></textarea>
	<form id="wysylanie">
	<p>Nick:
        <input type="text" id="nick" name="nick"></p>
        <p>Wiadomość:</p>
        <textarea rows="3" cols="50" id="wiadomosc" name="wiadomosc" disabled></textarea>

	<button id="wyslij" disabled>Wyślij</button>
	</form>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Lab PHP</title>
</head>
<body>

	<?php include 'menu.php'; ?>
        <form action="nowy.php" method="post">
		<p>Nazwa bloga</p>
                <input type="text" name="nazwa_bloga">
                <p>Nazwa uzytkownika</p>
                <input type="text" name="nazwa_uzytkownika">
                <p>Haslo</p>
                <input type="password" name="haslo">
                <p>Opis</p>
                <textarea cols="50" rows="9" name="opis">
                </textarea>
                <p>
                <input type="reset" value="Wyczyść" name="wyczysc" />
                <input type="submit" value="Wyślij">
                </p>

               
        <form>
</body>
</html>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Lab PHP</title>
</head>
<body>

	<?php include 'menu.php'; ?>
        <form action="koment.php" method="post">
             	<p>Rodzaj komentarza: <select name="rodzaj_kom">
                        <option>Pozytywny</option>
                        <option>Neutralny</option>
                        <option>Negatywny</option>
                </select></p>
                <p>Komentarz</p>
                <textarea cols="50" rows="9" name="kom">
                </textarea>
		<p>Pseudonim</p>
		<input type="text" name="pseudo">
		<input type="hidden" name="blog" value="<?php echo $_POST["blog"]; ?>">
		<input type="hidden" name="wpis" value="<?php echo $_POST["wpis"]; ?>">
		<p>
		<input type="reset" value="Wyczyść" name="wyczysc" />
                <input type="submit" value="Wyślij">
		</p>
        </form>
</body>
</html>

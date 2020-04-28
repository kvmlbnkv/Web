<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Lab PHP</title>
</head>
<body> 

<?php include 'menu.php'; ?>

	<form method="get">
               	<input type="text" name="nazwa">
               	<input type="submit" value="Znajdź bloga">
	</form>	

<?php
	$nazwa=$_GET["nazwa"];
	if($nazwa==""){
		echo "<h2>Spis blogów:</h2>";
		$blogs=new DirectoryIterator("./Blogi/");
		echo "<ul>";
		foreach($blogs as $blog){
			if(!$blog->isDot()){
				echo "<li><a href=\"./blog.php?nazwa=".$blog."\">".$blog."</a><br/></li>";
			}
		}
		echo "</ul>";
	}
	else{
		$dir="./Blogi/".$nazwa;
		if(file_exists($dir)){
			echo "<h1>".$nazwa."</h1>";
			$info=file($dir."/info");
			for($i=0;$i<sizeof($info);$i++){
				if($i==0) echo "<h3>Autor: ".$info[$i]."</h3>";
				if($i==2) echo "Opis:<br/>".$info[$i];
				if($i>2) echo "<br/>".$info[$i];
			}

			$wpisy=new DirectoryIterator($dir."/");
			$wpisreg="/^[0-9]{16}$/";
			foreach($wpisy as $wpis){
				if(!is_dir($wpis) && preg_match($wpisreg,$wpis)){
					echo "<p>$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$</p><h3>Wpis</h3>";
					$inwpis=file($dir."/".$wpis);
					for($i=0;$i<sizeof($inwpis);$i++){
						echo $inwpis[$i]."<br/>";
					}
					$zalreg="/^".$wpis."[1-9]/";
					$zalaczniki=new DirectoryIterator($dir."/");
					echo "<p>";
					foreach($zalaczniki as $zal){
						if(preg_match($zalreg,$zal)){
							echo "<a href=\"./Blogi/".$nazwa."/".$zal."\">".$zal."</a><br/>";
						}
					}
					echo "</p>";
					
					echo "<h4>Komentarze:</h4>";
					if(file_exists("./Blogi/".$nazwa."/".$wpis.".k")){
						$komentarze=new DirectoryIterator($dir."/".$wpis.".k/");
						foreach($komentarze as $kom){
							$inkom=file($dir."/".$wpis.".k/".$kom);
							for($i=0;$i<sizeof($inkom);$i++){
                                                		echo $inkom[$i]."<br/>";
							}
							if($kom!="." && $kom!="..") echo "<br/>";
						}
					}
					echo '<form action="formularz3.php" method="post">
						<input type="hidden" value="'.$nazwa.'" name="blog">
						<input type="hidden" value="'.$wpis.'" name="wpis">
						<input type="submit" value="Dodaj komentarz">
						</form>';
				}

			}
		}
		else echo "Blog o podanej nazwie nie istnieje";
	}

?>
</body>
</html>

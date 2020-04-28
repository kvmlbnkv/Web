<?php
$name=$_POST["nazwa_bloga"];
$user=$_POST["nazwa_uzytkownika"];
$password=$_POST["haslo"];
$opis=$_POST["opis"];

$path="/home/students/b/bienkami/public_html/Blogi/".$name;
if(file_exists($path)){
	echo "Blog o podanej nazwie już istnieje";
	//unlink($path."/info.txt");
}
else{
	$filee=fopen("./Blogi/semafor",'r');
	while(!flock($filee,LOCK_EX));
	mkdir($path,0777,true);
	$file=fopen($path."/info","w");
	$info=$user."\n".md5($password)."\n".$opis;
	fwrite($file,$info);
	flock($filee, LOCK_UN);
	fclose($file);
	fclose($filee);
	echo "Blog stworzony";
}
?>

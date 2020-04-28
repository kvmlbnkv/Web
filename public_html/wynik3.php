<?php
header('Content-type: text/plain');
$plik = fopen('slownik.txt','r');
$haslo = $_GET['haslo'];
while (!feof($plik)) {
	$s = fgets($plik).trim();
	$t = true;
	if(strlen($haslo)==strlen($s)-1){
		for($i=0;$i<strlen($s)-1;$i++){
	  		if($haslo[$i]=="_") continue;
			else if($haslo[$i]!=$s[$i]){
				$t = false;
				break;
			}
		}
		if($t) echo $s;
	}
}
fclose($plik);
?>


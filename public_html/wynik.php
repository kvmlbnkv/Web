<?php
	
	function witaj($imie) {
  return 'Cześć ' . $imie . '!';
	}
$imie=$_GET["input"];
if($imie=="Kamil"){
	echo witaj($imie);
}
else{
	echo "ty se chyba kpisz że ja ci dostęp dam";
}

/*
	$x=$_GET["input"];
        for($i=1;$i<$x+1;$i++){
		echo $i;
		echo "\n";
	}
 */
?>

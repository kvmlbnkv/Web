<?php
$rodzaj=$_POST["rodzaj_kom"];
$kom=$_POST["kom"];
$pseudo=$_POST["pseudo"];
$blog=$_POST["blog"];
$wpis=$_POST["wpis"];

$wpisy=new RecursiveIteratorIterator(new RecursiveDirectoryIterator("./Blogi/".$blog."/"));

foreach($wpisy as $wpiss){
	if(!is_dir($wpiss)){
		if(basename($wpiss)==$wpis){
			$dir=$wpiss.".k";
			break;
		}
	}
}

if(!file_exists($dir))	mkdir($dir,0777,true);

$num=0;
while(file_exists($dir."/".$num)) $num++;

$tresc=$rodzaj."\n".date("Y-m-d, H:i:s")."\n".$pseudo."\n".$kom;
$file=fopen($dir."/".$num,'w');
fwrite($file,$tresc);
fclose($file);

?>

<?php
$user=$_POST["nazwa"];
$password=$_POST["haslo"];
$wpis=$_POST["wpis"];
$data=$_POST["data"];
$godzina=$_POST["godzina"];
$blogs=new RecursiveIteratorIterator(new RecursiveDirectoryIterator("./Blogi/"));

foreach($blogs as $file){
	if(basename($file)=="info"){
		$check=file($file);
		if(rtrim($check[0],"\n")==$user){ 
			if(rtrim($check[1],"\n")==md5($password)){
				echo "o jezu to jest totalnie moj syn on ma to samo ubranie\n";
				$path=dirname($file);
				break;
			}
		}
	}
}

if($path){
	$newdata=str_replace("-","",$data);
	$newgodzina=str_replace(":","",$godzina);
	$sek=date("s");
	$uni=1;
	$uni2=sprintf("%02d",$uni);
        $newfile=$newdata.$newgodzina.$sek.$uni2;
        $nfpath=$path."/".$newfile;
	while(file_exists($nfpath)){
		$uni++;
		$uni2=sprintf("%02d",$uni);
		$newfile=$newdata.$newgodzina.$sek.$uni2;
		$nfpath=$path."/".$newfile;
	}
	$filee=fopen($nfpath,'w');
	fwrite($filee,$wpis);
	fclose($filee);


	for($i=1;$i<9;$i++){
		if(is_uploaded_file($_FILES["plik".$i]['tmp_name'])){
			$rozszerzenie=pathinfo($_FILES["plik".$i]["name"],PATHINFO_EXTENSION);
                	$nfzal=$nfpath.$i.'.'.$rozszerzenie;
                	move_uploaded_file($_FILES["plik".$i]["tmp_name"],$nfzal);
		}
	}
	/*
	if(is_uploaded_file($_FILES["plik1"]['tmp_name'])){
		$rozszerzenie=pathinfo($_FILES["plik1"]["name"],PATHINFO_EXTENSION);
		$nfzal=$nfpath.'1.'.$rozszerzenie;
		move_uploaded_file($_FILES["plik1"]["tmp_name"],$nfzal);
		if(is_uploaded_file($_FILES["plik2"]['tmp_name'])){
			$rozszerzenie=pathinfo($_FILES["plik2"]["name"],PATHINFO_EXTENSION);
			$nfzal=$nfpath.'2.'.$rozszerzenie;
                	move_uploaded_file($_FILES["plik2"]["tmp_name"],$nfzal);
			if(is_uploaded_file($_FILES["plik3"]['tmp_name'])){
				$rozszerzenie=pathinfo($_FILES["plik3"]["name"],PATHINFO_EXTENSION);
				$nfzal=$nfpath.'3.'.$rozszerzenie;
                		move_uploaded_file($_FILES["plik3"]["tmp_name"],$nfzal);
			}
		}
		elseif(!is_uploaded_file($_FILES["plik2"]['tmp_name'])){
			if(is_uploaded_file($_FILES["plik3"]['tmp_name'])){
                                $rozszerzenie=pathinfo($_FILES["plik3"]["name"],PATHINFO_EXTENSION);
                                $nfzal=$nfpath.'2.'.$rozszerzenie;
                                move_uploaded_file($_FILES["plik3"]["tmp_name"],$nfzal);
                        }

		}
	}
	elseif(!is_uploaded_file($_FILES["plik1"]['tmp_name'])){
	        if(is_uploaded_file($_FILES["plik2"]['tmp_name'])){
			$rozszerzenie=pathinfo($_FILES["plik2"]["name"],PATHINFO_EXTENSION);
                        $nfzal=$nfpath.'1.'.$rozszerzenie;
                        move_uploaded_file($_FILES["plik2"]["tmp_name"],$nfzal);
	                if(is_uploaded_file($_FILES["plik3"]['tmp_name'])){
                                $rozszerzenie=pathinfo($_FILES["plik3"]["name"],PATHINFO_EXTENSION);
                                $nfzal=$nfpath.'2.'.$rozszerzenie;
                                move_uploaded_file($_FILES["plik3"]["tmp_name"],$nfzal);
                        }

		}
		elseif(!is_uploaded_file($_FILES["plik2"]['tmp_name'])){
			if(is_uploaded_file($_FILES["plik3"]['tmp_name'])){
                                $rozszerzenie=pathinfo($_FILES["plik3"]["name"],PATHINFO_EXTENSION);
                                $nfzal=$nfpath.'1.'.$rozszerzenie;
                                move_uploaded_file($_FILES["plik3"]["tmp_name"],$nfzal);
                        }

		}
	}*/
}
?>

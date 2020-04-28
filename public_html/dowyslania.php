<?php

$nick = $_POST["nick"];
$message = $_POST["wiadomosc"];

$path = realpath('./wiadomosci.txt');
$pointer = fopen($path, 'r+');

$max = 20;

if (flock($pointer, LOCK_SH)) {
  $messages = explode(PHP_EOL, fread($pointer, filesize($path)));
  $messages[] = $nick.':'.removeEOL($message);
  $messages = array_filter($messages, 'strlen');

  $length = count($messages);
  if ($length>$max) {
	  $messages = array_slice($messages, $length-$max,$max);
  }

  rewind($pointer);
  ftruncate($pointer, 0);
  
  foreach ($messages as $message) {
    fwrite($pointer, $message.PHP_EOL);
  }

  flock($pointer, LOCK_UN);
}

fclose($pointer);

function removeEOL($text) {
  return str_replace(["\r\n","\r","\n"], ' ', $text);
}

?>

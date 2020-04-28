<?php
$path = realpath('./wiadomosci.txt');
$time = filemtime($path);
$new_time = $time;

while ($time == $new_time && !isset($_GET['fetch'])) {
  clearstatcache();
  $new_time = filemtime($path);
  sleep(1);
}

$messages = '';
$pointer = fopen($path, 'r');
 
if (flock($pointer, LOCK_SH)) {
  $messages = fread($pointer, filesize($path));
  flock($pointer, LOCK_UN);
}
fclose($pointer);

echo $messages;
?>

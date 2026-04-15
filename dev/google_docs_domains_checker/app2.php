<?php
if(!isset($argv[1])) die('error');
$sheet = $argv[1];
$path = getenv('PWD');
echo $path;
sleep(30);
echo 'end';
@unlink("{$path}/pid{$sheet}");
?>
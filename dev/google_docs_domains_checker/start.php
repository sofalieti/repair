<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/dev/google_docs_domains_checker';
@unlink("{$path}/pid{$_GET['sheet']}.txt");
@unlink("{$path}/pid{$_GET['sheet']}");
exec(sprintf("%s > %s 2>&1 & echo $! >> %s", "/opt/php71/bin/php {$path}/app.php {$_GET['sheet']}", "{$path}/pid{$_GET['sheet']}.txt", "{$path}/pid{$_GET['sheet']}"));
header('Location: /dev/google_docs_domains_checker/?secret123');
exit;
?>
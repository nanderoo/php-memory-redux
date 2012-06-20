<?php
// read, write
$fp = fopen("php://memory", 'rw+');
fputs($fp, "hello world");
rewind($fp);
print stream_get_contents($fp)."\n";
fclose($fp);
?>

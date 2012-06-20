<?php
// store in memory
include('common.php');

memLimit();

$fp = fopen("php://memory", "rw+");
$bp = fopen("bacon-ipsum.txt", "r");
fputs($fp, stream_get_contents($bp)); // out of memory: > 128M
rewind($fp);
print "[".str_word_count(stream_get_contents($fp))."]\n";
fclose($fp);
fclose($bp);

memUsage();
memPeak();
?>

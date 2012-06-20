<?php
// store in memory until it becomes scarce 
include('common.php');

memLimit();

$membuffer = 50 * 1024 * 1024; // default is 2mb
$fp = fopen("php://temp/maxmemory:$membuffer", "rw+");
$bp = fopen("bacon-ipsum.txt", "r");
fputs($fp, stream_get_contents($bp));
rewind($fp);
print "[".str_word_count(stream_get_contents($fp))."]\n"; 
fclose($fp);
fclose($bp);

memUsage();
memPeak();

?>

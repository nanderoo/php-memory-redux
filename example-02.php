<?php
// store in memory
include('common.php');

memLimit();

$fp = fopen("php://memory", "rw+");
$bp = fopen("bacon-ipsum-small.txt", "r");
fputs($fp, stream_get_contents($bp));
rewind($fp);
print "[".str_word_count(stream_get_contents($fp))."]\n";
fclose($fp);
fclose($bp);

memUsage();
memPeak();
?>

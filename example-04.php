<?php
// store in memory
include('common.php');

memLimit();

$fp = fopen("php://memory", "rw+");
$bp = fopen("bacon-ipsum.txt", "r");
stream_copy_to_stream($bp, $fp); // better
rewind($fp);
print "[".str_word_count(stream_get_contents($fp))."]\n"; 
// ^ still fails - need a better way 
fclose($fp);
fclose($bp);

memUsage();
memPeak();
?>

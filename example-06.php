<?php
// store on the file system 
include('common.php');

memLimit();

$fp = fopen("php://temp/", "rw+");
$bp = fopen("bacon-ipsum.txt", "r");
fputs($fp, stream_get_contents($bp));
rewind($fp);
print "[".str_word_count(stream_get_contents($fp))."]\n"; 
fclose($fp);
fclose($bp);

memUsage();
memPeak();

?>

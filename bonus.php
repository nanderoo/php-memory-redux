<?php
/*
 bonus simple frequency analysis example. 
 pass in a resource on the CLI - e.g. #php bonus.php http://www.google.com/
*/
include('common.php');

if (!isset($argv[1])) { print "ERROR: No resource specified.\n"; exit(0); };

memLimit();

$fp = fopen("php://temp/", "rw+");
$bp = fopen($argv[1], "r");
stream_filter_append($bp, 'string.toupper');
fputs($fp, stream_get_contents($bp));
rewind($fp);
$data = stream_get_contents($fp);
fclose($fp);
fclose($bp);

$letters = str_split($data);
$results = array();
for($i = 0; $i<sizeof($letters); $i++) {
  if ($letters[$i] == chr(10)) continue;
  if(array_key_exists($letters[$i], $results)) {
   $results[$letters[$i]] = $results[$letters[$i]] + 1;
#print "results[".$letters[$i]."] = ".$results[$letters[$i]]."\n";
  } else {
   $results[$letters[$i]] = 1;
  }
}

arsort($results, SORT_NUMERIC);

foreach($results as $key => $val) {
 print "[$key]\t= $val\n";
}

memUsage();
memPeak();

?>

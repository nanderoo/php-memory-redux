<?php
/*
 bonus simple frequency analysis example. 
 pass in a resource on the CLI - e.g. >php bonus.php http://www.google.com/
 outputs the top-10 characters found.
*/
include('common.php');

if (!isset($argv[1])) { print "ERROR: No resource specified.\n"; exit(0); };

memLimit();

$membuffer = 50 * 1024 * 1024; // default is 2mb
$fp = fopen("php://temp/maxmemory:$membuffer", "rw+");
$bp = fopen($argv[1], "r");
stream_filter_append($bp, 'string.toupper');
stream_copy_to_stream($bp, $fp);
rewind($fp);

$letters = str_split(stream_get_contents($fp));
# TODO: stream_get_contents() can still return more than max mem!

fclose($fp);
fclose($bp);

$results = array();
for($i = 0; $i<sizeof($letters); $i++) {
  if ($letters[$i] == chr(10)) continue;
  // what else could we exclude? could this be a filter?
  if(array_key_exists($letters[$i], $results)) {
    $results[$letters[$i]] = $results[$letters[$i]] + 1;
  } else {
    $results[$letters[$i]] = 1;
  }
}

arsort($results, SORT_NUMERIC);

$counter = 0;
foreach($results as $key => $val) {
  print "[$key]\t= $val\n";
  $counter++;
  if ($counter > 10) { break; }
}

memUsage();
memPeak();

?>

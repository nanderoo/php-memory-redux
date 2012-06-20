<?php
// common functionality

// upper memory limit
function memLimit() {
  print "mem limit: ".ini_get("memory_limit")."\n";
}

// current memory usage
function memUsage() {
  print "mem usage: ".round(memory_get_usage()/1048576,2)."M\n";
}

// peak memory usage
function memPeak() {
  print "peak use : ".round(memory_get_peak_usage()/1048576,2)."M\n";
}

?>

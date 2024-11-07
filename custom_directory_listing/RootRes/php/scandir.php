<?php

$scfiles = scandir(".");
$ignore = [".", "..", "index.php", "index.html", "RootRes"];

$dirs = [];
$files = [];

foreach ($scfiles as $scfile) {
  if (!in_array($scfile, $ignore)) {
    is_dir($scfile) ? $dirs[] = [$scfile, true] : $files[] = [$scfile, false];
  }
}

$items = array_merge($dirs, $files);

?>
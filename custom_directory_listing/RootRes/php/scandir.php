<?php

$scfiles = scandir(".");
$ignore = [".", "..", "index.php", "index.html", "RootRes"];

$dirs = [];
$files = [];

foreach ($scfiles as $scfile) {
  if (!in_array($scfile, $ignore)) {
    if (is_dir($scfile)) {
      $dirs[] = [$scfile, true];
    } else {
      $files[] = [$scfile, false];
    }
  }
}

sort($dirs);
sort($files);
$items = array_merge($dirs, $files);

?>
<?php

$scfiles = scandir(".", SCANDIR_SORT_ASCENDING);
$ignore = [".", "..", "index.php", "index.html", "RootRes"];

$dirs = $files = [];

foreach ($scfiles as $scfile) {
  if (in_array($scfile, $ignore)) {
    continue;
  };

  if (is_dir($scfile)) {
    $dirs[] = [$scfile, true];
  } else {
    $files[] = [$scfile, false];
  };

};

$items = array_merge($dirs, $files);
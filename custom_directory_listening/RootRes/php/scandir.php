<?php

$scfiles = scandir(".");
$ignore = [
  ".", "..", "index.php", "index.html", "RootRes"
];

$items = [];
foreach ($scfiles as $scfile) {
  if ( !in_array($scfile, $ignore) ) {
    $items[] = [$scfile, is_dir($scfile)];
  };
};
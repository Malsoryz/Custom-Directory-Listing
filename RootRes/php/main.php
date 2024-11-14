<?php

function listdir(string $path = ".", bool $show_hidden = false, array $ignore = []) : array {
  $dirs = $files = [];
  $srcfiles = scandir($path);

  foreach ($srcfiles as $item) {
    if (
      ( !$show_hidden && substr($item, 0, 1) === '.') ||
      in_array($item, $ignore)
    ) continue;

    is_dir("$path/$item") ? $dirs[] = "$path/$item" : $files[] = "$path/$item";

  };

  return array_merge($dirs, $files);
}

function size(string $path) : string {
  $sizes = ['B', 'KB', 'MB', 'GB', 'TB'];
  $bytes = filesize($path);
  $factor = 0;

  while ($bytes >= 1024 && $factor < count($sizes) - 1) {
    $bytes /= 1024;
    $factor++;
  }

  return round($bytes, 2) . $sizes[$factor];
}

function path(string $path) : string {
  if (!is_dir($path)) return $path;

  $index = ['index.html', 'index.php'];
  $hasindex = array_intersect($index, scandir($path));

  return $hasindex ? $path : "?path=" . $path;
}

function file_info(string $path) : array {
  return [
    "name" => basename($path),
    "icon" => (is_dir($path)) ? "fa-folder" : "fa-file",
    "modified" => date("d/m/y", filemtime($path)),
    "count" => (is_dir($path)) ? count(listdir($path)) . " items" : size($path),
    "link" => path($path)
  ];
};
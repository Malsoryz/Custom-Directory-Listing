<?php

function listdir(string $path = ".", array $ignore = []) : array {
  $dirs = $files = [];
  $srcfiles = scandir($path);
  $ignore = array_merge($ignore, [
    ".", "..", ".editorconfig", ".vscode", "index.php", "index.html", "RootRes"
  ]);

  foreach ($srcfiles as $item) {
    if (!in_array($item, $ignore)) {

      is_dir($item) ? $dirs[] = $item : $files[] = $item;

    };
  };

  return array_merge($dirs, $files);
}

function size(string $path, int $decimals = 1) : string {
  $sizes = ['B', 'KB', 'MB', 'GB', 'TB'];
  $bytes = filesize($path);
  $factor = floor((strlen($bytes) - 1) / 3);

  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . " " . $sizes[$factor];
}

function file_info(string $path) : array {
  return [
    "name" => $path,
    "icon" => (is_dir($path)) ? "fa-folder" : "fa-file",
    "modified" => date("d/m/y", filemtime($path)),
    "count" => (is_dir($path)) ? count(listdir($path)) . " items" : size($path)
  ];
};
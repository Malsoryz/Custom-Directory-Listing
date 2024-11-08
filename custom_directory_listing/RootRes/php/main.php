<?php

function listdir(string $path = ".", array $ignore = []) : array {
  $dirs = $files = [];
  $srcfiles = scandir($path);
  $ignore = array_merge($ignore, [
    ".", "..", ".editorconfig", ".vscode","index.php", "index.html", "RootRes"
  ]);

  foreach ($srcfiles as $item) {
    if (!in_array($item, $ignore)) {
      if (is_dir($item)) {
        $dirs[] = $item;
        continue;
      };

      $files[] = $item;
    };
  };

  return array_merge($dirs, $files);
}

function file_info(string $path) : array {
  return [
    "name" => $path,
    "icon" => (is_dir($path)) ? "fa-folder" : "fa-file",
    "modified" => date("d/m/y", filemtime($path)),
    "count" => (is_dir($path)) ? count(listdir($path)) . " items" : filesize($path)
  ];
};
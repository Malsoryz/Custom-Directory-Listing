<?php
  $rootdir = '.';
  $scfiles = scandir($rootdir);
  $dirs = [];
  $files = [];
  foreach ($scfiles as $scfile){
    if ($scfile != '.' && $scfile != '..' && $scfile != 'index.php' && $scfile != 'RootRes') {
      if (is_dir($scfile)) {
        $dirs[] = $scfile;
      }else {
        $files[] = $scfile;
      }
    }
  }
?>
<?php 
  $kb = 1024;
  $mb = $kb * 1024;
  $gb = $mb * 1024;
  $filesize = (filesize($item[0]) >= $gb) ? round(filesize($item[0]) / $gb, 2)."GB" : ((filesize($item[0]) >= $mb) ? round(filesize($item[0]) / $mb, 2)."MB" : ((filesize($item[0]) >= $kb) ? round(filesize($item[0]) / $kb, 2)."KB" : filesize($item[0])."B" ));
  $count = ( $item[1] ) ? count(scandir($item[0]))." items" : $filesize;
  $icon = ( $item[1] ) ? "fa-folder" : "fa-file";
  $last_modified = filemtime($item[0]);
        $format_last_modified = date('d/m/y', $last_modified);
?>
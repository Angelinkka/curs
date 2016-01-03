<?php
$link = '?type=' . CATALOG_TYPE . "&id=" . $item['id'];
$resString = '<a href="' . $link . '">'  . $item[ 'name' ] . '</a><br>' ;
return $resString;
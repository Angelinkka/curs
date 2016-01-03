<?php
//$resString = $item[ 'id' ] . '<br>' ;
//echo $result[ 'catalog_name' ] . '<br>' ;
$resString ='';
$resString .= 'Название:' . $item[ 'name' ] . '<br>' ;
$resString .= 'Театр:' . $item[ 'theature_name' ] . '<br>' ;
$resString .= 'Цена:' . $item[ 'price' ] . ' pублей <br>' ;
$link = '?type=' . ITEM_TYPE . "&id=" . $item['id'];
$resString .= '<a href="' . $link . '">Подробнее</a>' . '<br><br><br>' ;
return $resString;
<?php
//$resString = $item[ 'id' ] . '<br>' ;
//echo $result[ 'catalog_name' ] . '<br>' ;
$resString ='';
$resString .= '<td>' . $item[ 'name' ] . '</td>' ;
$resString .= '<td>' .$item[ 'count' ] . ' шт.</td>' ;
$resString .= '<td>' .$item[ 'price' ] . ' руб.</td>' ;
$resString .= '<td>' .$item[ 'price' ]*$item[ 'count' ] . ' руб.</td>' ;
$resString .= '<td align="center" width="15px"><a href="?type=' . ADD_CART_TYPE . '&id=' . $item['id'] . '">+</a></td>' ;
$resString .= '<td align="center" width="15px"><a href="?type=' . REMOVE_CART_TYPE . '&id=' . $item['id'] . '">-</a></td>' ;
$resString .= '<td align="center" width="15px"><a href="?type=' . REMOVE_ITEM_CART_TYPE . '&id=' . $item['id'] . '">Убрать</a></td>' ;
return $resString;
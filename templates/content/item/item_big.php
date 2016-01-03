<?php
//$resString = $item[ 'id' ] . '<br>' ;
//$resString .= $result[ 'catalog_name' ] . '<br>' ;
$resString ='';
$resString .= '<b>Название:' . $item[ 'name' ] . '</b><br>' ;
$resString .= 'Театр:' . $item[ 'theature_name' ] . '<br>' ;
$resString .= 'Автор:' . $item[ 'author_name' ] . '<br>' ;
$resString .= 'Цена:' . $item[ 'price' ] . ' рублей <br>' ;
$resString .= 'Описание:' .$item[ 'description' ] . '<br>' ;
$resString .= '<a href="?type=' . ADD_CART_TYPE . '&id=' .$item[ 'id' ] . '">Добавить в корзину</a>' . '<br>' ;

$resString .= '<img width="350px" src="'. $item['img'] . '"' . '<br>' ;
return $resString;
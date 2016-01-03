<?php
if( count( $cartItems  ) > 0 ) {

	$result = '';
	$result .= '<table border="1">';
	$result .= '<tr>';
	$result .= '<td>Название</td>';
	$result .= '<td>Кол-во</td>';
	$result .= '<td>Цена</td>';
	$result .= '<td>Стоимость</td>';

	$result .= '<td align="center">+</td>';
	$result .= '<td align="center">-</td>';
	$result .= '<td align="center">Убрать</td>';
	$result .= '</tr>';


	foreach ($cartItems as $key => $item) {
		$result .= '<tr>';
		$result .= include("cart_item.php");
		$result .= '</tr>';

	}

	$result .= '</table>';
	$result .= 'Кол-во:' . $sum['count'] . ' шт. <br>' ;
	$result .= 'Итого:' . $sum['sum'] . ' руб. <br>';

	$result .= '<form action="/">';
	$result .= '<input type="submit" value="Купить">';
	$result .= '</form>';
	return $result;
}
else
{
	return '<h1>Корзина пуста</h1>';
}
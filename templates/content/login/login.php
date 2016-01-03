<?php
if( isset( $user ) && $user )
{
	$return = 'Добрый день <br>' . $user['login'] . "<br>" ;
	$return .= '<a href="?unlogin=1">Выйти</a>';

}
else {
	$return = '<form action="/" method="post">';
	$return .= 'Логин<br>';
	$return .= '<input name="login" size="10"><br>';
	$return .= 'Пароль<br>';
	$return .= '<input name="password" size="10" type="password"> <br>';
	$return .= '<input name="submit" size="10" type="submit" value="Войти"><br> ';
	$return .= '<a href="?type=' . NEW_REG_TYPE . '">Регистрация</a>';
	switch($loginStatus)
	{
		case LOGIN_OK:
		case LOGIN_EXIT:
		case LOGIN_ALREADY:
			break;

		case LOGIN_FAIL:
			$return .= '<br>Пароли не совпадают<br>';
			break;
		case LOGIN_NOT_FOUND:
			$return .= '<br>Такого пользователя нет<br>';

			break;
	}
	$return .= '</form>';
}
return $return;
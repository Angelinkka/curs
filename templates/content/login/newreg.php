<?php

	$return = '<form action="/" method="post"> ';
	$return .= 'Логин<br>';
	$return .= '<input name="new_login" size="10"><br>';
	$return .= 'Пароль<br>';
	$return .= '<input name="new_password1" size="10" type="password"> <br>';
	$return .= 'Повторите Пароль<br>';
	$return .= '<input name="new_password2" size="10" type="password"> <br>';

	$return .= '<input name="new_submit" size="10" type="submit" value="Войти"> ';

	$return .= '</form>';
return $return;
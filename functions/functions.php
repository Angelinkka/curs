<?php

    function getTextContent( $id )
    {
        $sql =  "SELECT * from texts WHERE id='" . $id . "'" ;
       $result = mysql_query( $sql );
        $array = mysql_fetch_array( $result );
        if( !$array )
            $array = array();
        return $array;
    }

    function getCatalogCategories( $table = "theatures" )
    {
        $sql = "SELECT * from " . $table  ;
        $result = mysql_query( $sql );
        $array = array();
        while( $row = mysql_fetch_array( $result ) )
        {
            $array[] = $row;
        }

        return $array;
    }


        function getCatalogItems( $id, $table = "tickets" )
        {
            $sql = "SELECT * from " . $table . "  WHERE theature_id = '" . $id . "'" ;
            $result = mysql_query( $sql );
            $i = 0;
            $array = array();
            if( $result ) {
                while ($row = mysql_fetch_array($result)) {
                    $array[$i] = $row;
                    $sql2 = "SELECT * from theatures WHERE id = '" . $row[ 'theature_id' ] . "'" ;
                    $result2 = mysql_query( $sql2 );
                    $row2 = mysql_fetch_array( $result2 );
                    $array[$i]['theature_name'] =  $row2[ 'name' ] ;
                    $i++;
                }
            }

            return $array;
        }

        function getItem( $id, $table = 'tickets' )
        {
            $array = array();
            $sql = "SELECT * from " . $table . " WHERE id='" . $id . "'";
            $result = mysql_query( $sql );
            if( $result && $row = mysql_fetch_array( $result ) )
            {
                $array = $row;

                $sql2 = "SELECT * from authours WHERE id = '" . $row[ 'author_id' ] . "'" ;
                $result2 = mysql_query( $sql2 );
                $row2 = mysql_fetch_array( $result2 );
                $array['author_name'] =  $row2[ 'name' ] ;

                $sql2 = "SELECT * from geners WHERE id = '" . $row[ 'genre_id' ] . "'" ;
                $result2 = mysql_query( $sql2 );
                $row2 = mysql_fetch_array( $result2 );
                $array['genre_name'] = $row2['name'];

                $sql2 = "SELECT * from theatures WHERE id = '" . $row[ 'theature_id' ] . "'" ;
                $result2 = mysql_query( $sql2 );
                $row2 = mysql_fetch_array( $result2 );
                $array['theature_name'] =  $row2[ 'name' ] ;
            }
            return $array;
        }

		function convertPassword( $pass )
		{
			return md5($pass);
		}

		function login( $login, $pass )
		{
			/*Ищем пользователя с данымм логином и паролем*/
			$row2 =findUserByLogin($login);
			if( !$row2 )
				return LOGIN_NOT_FOUND ;
			if( $row2['pass'] == convertPassword( $pass ) )
			{
				$_SESSION['user_id'] = $row2['id'];
				return LOGIN_OK ;
			}
			return LOGIN_FAIL ;
		}

		function findUserByLogin($login)
		{
			$sql2 = "SELECT * from users WHERE login = '" . $login . "'";
			$result2 = mysql_query($sql2);
			return mysql_fetch_array($result2);
		}

		function addNewUser( $login , $password )
		{
			if( !findUserByLogin($login) ) {
				$sql2 = "INSERT INTO `users` (`id`, `login`, `pass`) VALUES (NULL, '" . $login . "' , '" . convertPassword( $password ). "')";

				$result2 = mysql_query($sql2);
				return true ;
			}
			return false;
		}

		function unlogin()
		{
			unset( $_SESSION['user_id'] );
		}

		function getCurrentUser()
		{
			$row2 = false ;
			if( isset( $_SESSION[ 'user_id' ] ) ) {
				$sql2 = "SELECT * from users WHERE id = '" . $_SESSION['user_id'] . "'";
				$result2 = mysql_query($sql2);
				$row2 = mysql_fetch_array($result2);
			}
			return $row2;
		}


		function addToCart($id)
		{
			if( !isset($_SESSION['myCart']) )
			{
				$_SESSION['myCart'] = array();
			}
			if( isset( $_SESSION['myCart'][$id] ) )
			{
				$_SESSION['myCart'][$id]++;
			}
			else
			{
				$_SESSION['myCart'][$id] = 1;
			}

		}

		function removeFromCart($id, $count = 1 )
		{
			if( isset(	$_SESSION['myCart'][$id] ) && $_SESSION['myCart'][$id] > $count && $count != CART_REMOVE_ALL )
			{
				$_SESSION['myCart'][$id] -= $count;;
			}
			else if( $_SESSION['myCart'][$id] == $count || $count == CART_REMOVE_ALL )
			{
				unset( $_SESSION['myCart'][$id] ) ;
			}
		}

		function getCartItems()
		{
			$cartItems = array();
			if( isset($_SESSION['myCart']) )
			{
				foreach( $_SESSION['myCart'] as $id=>$count )
				{
					$cartItems[$id]=getItem($id);
					$cartItems[$id]['count'] = $count;
				}
			}
			return $cartItems;
		}

		function clearCart()
		{
			unset( $_SESSION['myCart'] );
		}

		function calculateCart()
		{
			$cart = getCartItems();
			$array = array( 'sum'=>0, 'count'=>0);
			foreach( $cart as $key=> $item )
			{;
				    $array['sum']+= $item['price']*$item['count'];
					$array['count']+= $item['count'];
			}
			return $array;
		}

		/**
		 * Функция которая возвращает массив информации
		 * о просматриваемой страничка с типом $type
		 * и $id
		 * @param null $type
		 * @param null $id
		 * @return array
		 */
        function getContent(  $type = null, $id = null  )
        {
			/*Если параметры null, то выводим страничку по умолчанию*/
            if( $type == null )
            {
                $type = DEFAULT_PAGE;
            }
			if( isset($_POST['new_submit']) && $_POST['new_submit'] )
			{
				$type = NEW_SUBMIT_TYPE;
			}

			$loginStatus = LOGIN_ALREADY;

			if( isset($_GET['unlogin']) && $_GET['unlogin'] )
			{
				unlogin();
				$loginStatus = LOGIN_EXIT;

			}
			if( $_POST['submit'] )
			{
				$loginStatus = login( $_POST['login'],  $_POST['password'] );
			}

			/*Инициализируем информацию в зависимости от типа */
            $array = array();
            switch( $type )
            {
				/*Если тип страницы - текстовая*/
                case TEXT_TYPE:
					/*Если id не инициализирован выводим главную.
					Иначе страницу с id*/
                    if( $id == null )
                        $id = MAIN_PAGE_TEXT_ID;
					/*Получаем текст из базы*/
                    $page = getTextContent( $id );
                    $array['content'] = $page['text'];
                    break;

                case CATALOG_TYPE:
                    /*Если id не инициаизирован */
					if( !($id > 0) )
                    {
						/*Выбираем первый попавшийся театр*/
                        $sql = "SELECT id from theatures LIMIT 1"  ;
                        $res = mysql_query( $sql );
                        $row = mysql_fetch_array( $res );
                        $id = $row['id'];
                    }
					/*Получаем спектали из базы*/

                    $items = getCatalogItems( $id );
                    //$parent_item = get;
					/*Вставляем их в ш для красивого вывода*/
                    $array['content'] = include('templates/content/item/items.php');

                    break;
                case ITEM_TYPE :
                    $item = getItem( $id );
                    $array['content'] = include('templates/content/item/item_big.php');
                    break;

				case NEW_REG_TYPE:
					$array['content'] = include('templates/content/login/newreg.php');
					break;
				case NEW_SUBMIT_TYPE:
					//Если пароли совпадают
					if( $_POST['new_password1'] == $_POST['new_password2'] )
					{
						if( addNewUser( $_POST['new_login'], $_POST['new_password2'] ) )
						{
							$array['content'] = 'Поздравляем вы зарегистерированы';
						}
						else
						{
							$array['content'] = 'Такой пользователь уже есть';

						}
					}
					else
					{
						$array['content'] = 'Пароли не совпадают';
					}
					break;

				case ADD_CART_TYPE:
					addToCart($id);
					$cartItems = getCartItems();
					$sum = calculateCart();
					$array['content'] = include('templates/content/cart/cart.php');
					break;

				case CART_TYPE:
					$cartItems = getCartItems();
					$sum = calculateCart();
					$array['content'] = include('templates/content/cart/cart.php');
					break;
				/*Удаляем одну штуку*/
				case REMOVE_CART_TYPE:
					$cartItems = getCartItems();
					$sum = calculateCart();
					removeFromCart($id);
					$array['content'] = include('templates/content/cart/cart.php');
					break;
				/*Удаляем весь товар*/
				case REMOVE_ITEM_CART_TYPE:
					$cartItems = getCartItems();
					$sum = calculateCart();
					removeFromCart( $id, CART_REMOVE_ALL );
					$array['content'] = include('templates/content/cart/cart.php');
					break;
				case CLEAR_CART_TYPE:
					$cartItems = getCartItems();
					$sum = calculateCart();
					clearCart();
					$array['content'] = include('templates/content/cart/cart.php');
					break;
			}

			$user = getCurrentUser();
			$array['theatures'] = getCatalogCategories();
            $items= getCatalogCategories();
            $array['leftPanel'] = include('templates/content/catalog/catalogCategories.php');
           	$array['rightPanel'] = include('templates/content/login/login.php');
			$array['banner_word'] = 'Театры';
			$array['title'] = 'Сайт';

			return $array;
        }
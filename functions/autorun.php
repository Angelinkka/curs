<?php
session_start();

/*Константы*/

const TEXT_TYPE = 0;
const CATALOG_TYPE = 1;
const ITEM_TYPE = 2;
const NEW_REG_TYPE = 3;
const NEW_SUBMIT_TYPE= 4;
const CART_TYPE = 5;
const ADD_CART_TYPE = 6;
const REMOVE_CART_TYPE = 7 ;
const REMOVE_ITEM_CART_TYPE = 8 ;
const CLEAR_CART_TYPE = 9 ;

/*Статусы для входа в ЛК. для улучшения читабельноости кода*/
const LOGIN_FAIL = 0;
const LOGIN_OK = 1;
const LOGIN_ALREADY = 2;
const LOGIN_EXIT = 3;
const LOGIN_NOT_FOUND = 4;
/*Константа искользуемая для удаление предмета из корзины*/
const CART_REMOVE_ALL = -1;

//Идентификаторы текстовх страниц
const MAIN_PAGE_TEXT_ID = 1 ;
const CONTACT_PAGE_TEXT_ID = 4;
const DEFAULT_PAGE = TEXT_TYPE;



include("dbConnect.php");
/*Подргузка функции*/
include("functions.php");

if( !isset( $_GET['type'] ) )
{
    $type = null;
}
else
{
    $type = $_GET['type'];
}

if( !isset( $_GET['id'] ) )
{
    $id = null;
}
else
{
    $id = $_GET['id'];
}

/*Инициализация массива, в котором храняться данные
о просматриваемой страничке*/
$array = getContent( $type, $id );
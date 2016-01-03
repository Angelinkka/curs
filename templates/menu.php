<?php
echo '<div id="menu">
    <ul>';
    //class="active"
    echo '<li ><a href="?id='. MAIN_PAGE_TEXT_ID .'" >Главная</a></li>';
    echo '<li ><a href="?type=' . CATALOG_TYPE . '" >Репертуар</a></li>';
    echo '<li ><a href="?id=' . CONTACT_PAGE_TEXT_ID . '" >Контакты</a></li>';
echo '<li ><a href="?type=' . CART_TYPE	  . '" >Корзина</a></li>';

echo   '</ul>
</div>';
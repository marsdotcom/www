<?php

// Инклюдим определитель мобильных и планшетов
require_once "if_mobile.php";

// Определяем мобильные и планшеты
// Создаем новый экземпляр класса
$detect = new Mobile_Detect;
$if_mobile="noy";
// Определяем мобильные
if ( $detect->isMobile()  && !$detect->isTablet() ) {
    $if_mobile = "_mobile";
}

// Определяем планшеты
if ( $detect->isTablet() ) {
    $if_mobile = "_tablet";
}
// Пример инклюда нужного php-файла
//include "template".$if_mobile.".php";
echo $if_mobile;

/**
 * Created by PhpStorm.
 * User: rt
 * Date: 20.12.2016
 * Time: 18:17
 */
?>
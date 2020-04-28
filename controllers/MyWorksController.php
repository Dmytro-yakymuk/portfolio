<?php

/**
 * Контролер головної сторінки
 */

// підключаєм моделі
//nclude_once '../models/CategoriesModel.php';
//include_once '../models/ProductsModel.php';


/**
 * Формування головної сторінки сайта
 */
function indexAction($name) {

    include_once "view/" . $name . ".php";    
}
















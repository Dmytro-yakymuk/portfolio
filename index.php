<?php

    session_start(); // вмикаєм сесію

    include_once "config/connect.php";       // Підключаєм БД          
    include_once "config/mainFunctions.php"; // Підключаєм основні функції
    include_once "config/router.php";        // Підключаєм маршутирацію

    $route = trim($_SERVER['REQUEST_URI'], '/') != null ? trim($_SERVER['REQUEST_URI'], '/') : 'index';

    if($routes[$route]) {
        include_once "controllers/" . $routes[$route]['controller'] . "Controller.php";

        $function = $routes[$route]['action'] ."Action";
        $function($routes[$route]['name'], $myPDO);
        
    } else {
        require_once('view/404.php');
    }




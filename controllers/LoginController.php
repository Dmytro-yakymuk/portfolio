<?php

/**
 * Контролер головної сторінки
 */

// підключаєм моделі
//nclude_once '../models/CategoriesModel.php';
include_once 'models/UsersModel.php';



/**
 * Формування головної сторінки сайта
 */
function indexAction($name) {
    if(isset($_SESSION['active'])) {
        header('Location: /');
    }

    include_once "view/" . $name . ".php"; 
}

function authAction($name, $myPDO) {

    session_start();
    
    unset($_SESSION['error_message']);

    $flogin = $_POST['login'];
    $fpassword = md5($_POST['password']);

    $is_user_login = getUserByLogin($flogin, $myPDO);

    if(!$is_user_login){
        $_SESSION['error_message']['login'] = 'Користувача з таким логіном не існує!';
        echo $_SESSION['error_message']['login'];
    }

    //var_dump($_SESSION['error_message']);

    if(!$_SESSION['error_message']['login']){

        $is_user = getUserByPasswordAndLogin($fpassword, $flogin, $myPDO);

        if(!$is_user){
            $_SESSION['error_message']['password'] = 'Не правильний пароль!';
            echo $_SESSION['error_message']['password'];
        }

        if(!$_SESSION['error_message']['password']){
            $_SESSION['user_login'] = $is_user[0]['login'];
            $_SESSION['active'] = $is_user[0]['id'];
            echo 'success';
        }

    }

    //include_once "view/" . $name . ".php"; 
}


function loguotAction($name) {

    if(isset($_POST['is_activ'])) {
        unset($_SESSION['active']);
        //$_SESSION['success_message']['register'] = 'Дозустрічі!';
    }

    include_once "view/" . $name . ".php"; 
}















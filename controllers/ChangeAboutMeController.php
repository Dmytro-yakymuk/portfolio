<?php

// підключаєм моделі
include_once 'models/AboutMeModel.php';

function indexAction($name, $myPDO) {
    if(!isset($_SESSION['active'])) {
        header('Location: /');
    }
    $about_me = getAllAboutMe($myPDO);
    include_once "view/" . $name . ".php";    
}

function edit_about_meAction($name, $myPDO) {

    session_start();
    
    unset($_SESSION['error_message']);

    $id = $_POST['id'];
    $text = $_POST['text'];

    $update_about_me = update_about_me($id, $text, $myPDO);

    if(!$update_about_me){
        $_SESSION['error_message']['update'] = 'Not update!';
        echo $_SESSION['error_message']['password'];
    } else {
        $_SESSION['success_message']['update'] = 'Update success!';
        echo 'success';
    }
   
}


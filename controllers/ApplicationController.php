<?php

// підключаєм моделі
include_once 'models/ApplicationModel.php';

function indexAction($name, $myPDO) {
    if(isset($_SESSION['active'])) {
        header('Location: /');
    }
    include_once "view/" . $name . ".php";    
}

function send_applicationAction($name, $myPDO) {

    session_start();
    unset($_SESSION['error_message']);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['text'];

    $send_application = send_application($name, $email, $text, $myPDO);

    if(!$send_application){
        $_SESSION['error_message']['send'] = 'Not send!';
        echo $_SESSION['error_message']['password'];
    } else {
        $_SESSION['success_message']['send'] = 'Application send!';
        echo 'success';
    }
   
}


<?php

// підключаєм моделі
include_once 'models/SkillsModel.php';

function indexAction($name, $myPDO) {
    if(!isset($_SESSION['active'])) {
        header('Location: /');
    }
    $skills = getAllSkills($myPDO);
    include_once "view/" . $name . ".php";    
}

function destroyAction($name, $myPDO) {

    session_start();
    
    unset($_SESSION['error_message']);

    $id = $_POST['id'];


    $destroy_skill = destroySkill($id, $myPDO);

    if(!$destroy_skill){
        $_SESSION['error_message']['destroy'] = 'Not destroy!';
        echo $_SESSION['error_message']['password'];
    } else {
        $_SESSION['success_message']['destroy'] = 'Skill destroy!';
        echo 'success';
    }
   
}













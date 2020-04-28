<?php

// підключаєм моделі
include_once 'models/SkillsModel.php';

function indexAction($name, $myPDO) {
    if(!isset($_SESSION['active'])) {
        header('Location: /');
    }
    include_once "view/" . $name . ".php";    
}

function insertAction($name, $myPDO) {

    session_start();
    
    unset($_SESSION['error_message']);

    $name = $_POST['name'];
    $parent_id = $_POST['parent_id'];
    $icon = $_POST['icon'];


    $insert_skill = insertSkill($name, $parent_id, $icon, $myPDO);

    if(!$insert_skill){
        $_SESSION['error_message']['insert'] = 'Not insert!';
        echo $_SESSION['error_message']['password'];
    } else {
        $_SESSION['success_message']['insert'] = 'Skill insert!';
        echo 'success';
    }
   
}


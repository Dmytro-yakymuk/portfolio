<?php

/**
 * Контролер головної сторінки
 */

// підключаєм моделі
include_once 'models/SkillsModel.php';


/**
 * Формування головної сторінки сайта
 */
function indexAction($name, $myPDO) {
    if(!isset($_SESSION['active'])) {
        header('Location: /');
    }
    $skills = getAllSkills($myPDO);
    include_once "view/" . $name . ".php";    
}

function updateAction($name, $myPDO) {

    session_start();
    
    unset($_SESSION['error_message']);

    $id = $_POST['id'];
    $name = $_POST['name'];
    $parent_id = $_POST['parent_id'];
    $icon = $_POST['icon'];


    $update_skill = updateSkill($id, $name, $parent_id, $icon, $myPDO);

    if(!$update_skill){
        $_SESSION['error_message']['update'] = 'Не редагувалося!';
        echo $_SESSION['error_message']['password'];
    } else {
        $_SESSION['success_message']['update'] = 'Skill update!';
        echo 'success';
    }
   
}


function select_skillAction($name, $myPDO) {

    $id = $_POST['id'];
    $skill = getOneSkill($id, $myPDO);

    echo json_encode($skill);
}













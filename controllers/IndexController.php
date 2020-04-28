<?php

/**
 * Контролер головної сторінки
 */

// підключаєм моделі
include_once 'models/SkillsModel.php';
include_once 'models/AboutMeModel.php';

/**
 * Формування головної сторінки сайта
 */
function indexAction($name, $myPDO) {
    $skills = getAllSkills($myPDO);
    $about_me = getOneAboutMe('main', $myPDO);
    include_once "view/" . $name . ".php";    
}
















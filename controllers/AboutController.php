<?php


include_once 'models/AboutMeModel.php';

function indexAction($name, $myPDO) {
    $about_me = getOneAboutMe('about me', $myPDO);
    include_once "view/" . $name . ".php";    
}
















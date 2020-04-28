<?php

/**
 * Модель для таблиці about_me
 */

function getAllAboutMe($myPDO){
    $sql = "SELECT * FROM `about_me`";
    return $myPDO->query($sql)->fetchAll();
}

function update_about_me($id, $text, $myPDO){
    $sql = "UPDATE`about_me` SET `text` = '". $text ."' WHERE `id` = ". $id;
    return $myPDO->query($sql);
}

function getOneAboutMe($name_page, $myPDO){
    $sql = "SELECT `text` FROM `about_me` WHERE `name` = '". $name_page ."'";
    return $myPDO->query($sql)->fetchAll();
}


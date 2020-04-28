<?php

/**
 * Модель для таблиці навичків (skills)
 */


function getAllSkills($myPDO)
{
    $sql = "SELECT *
            FROM `skills`";

    return $myPDO->query($sql)->fetchAll();
}

function getOneSkill($id, $myPDO)
{
    $sql = "SELECT *
            FROM `skills` 
            WHERE `id` = ". $id;

    return $myPDO->query($sql)->fetchAll();
}


function insertSkill($name, $parent_id, $icon, $myPDO)
{
    $sql = "INSERT INTO `skills` (`name`, `parent_id`, `icon`) VALUES ('". $name ."', '". $parent_id ."', '". $icon ."')";

    return $myPDO->query($sql);
}

function updateSkill($id, $name, $parent_id, $icon, $myPDO)
{
    $sql = "UPDATE`skills` SET `name` = '". $name ."', `parent_id` = '". $parent_id ."', `icon` = '". $icon ."' WHERE `id` = ". $id;

    return $myPDO->query($sql);
}


function destroySkill($id, $myPDO)
{
    $sql = "SELECT * FROM `skills` WHERE `id` = ". $id;

    $check_parent_id = $myPDO->query($sql)->fetchAll();
    if($check_parent_id[0]['parent_id'] != 0) {
        $sql_delete = "DELETE FROM `skills` WHERE `id` = '". $id ."'";
    } else {
        $sql_delete = "DELETE FROM `skills` WHERE `id` = '". $id ."' OR `parent_id` = '". $id ."'";
    }

    return $myPDO->query($sql_delete);
}

<?php

/**
 * Модель для таблиці користувачів (users)
 */


function getUserByLogin($flogin, $myPDO)
{
    $sql = "SELECT *
            FROM `users`
            WHERE `login` = '". $flogin ."' LIMIT 1";

    return $myPDO->query($sql)->fetchAll();
}

function getUserByPasswordAndLogin($fpassword, $flogin, $myPDO)
{
    $sql = "SELECT *
            FROM `users`
            WHERE `password` = '". $fpassword ."' AND `login` = '". $flogin ."' LIMIT 1";

    return $myPDO->query($sql)->fetchAll();
}



function addUser($data, $myPDO)
{
    $sql = 'INSERT INTO `users` (`login`, `password`)
                        VALUES (:login, :password) ';
    $result = $myPDO->prepare($sql);
    $result->execute($data);
}










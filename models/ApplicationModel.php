<?php

/**
 * Модель для таблиці application
 */


function send_application($name, $email, $text, $myPDO)
{
    $sql = "INSERT INTO `applications` (`name`, `email`, `text`) VALUES ('". $name ."', '". $email ."', '". $text ."')";

    return $myPDO->query($sql);
}


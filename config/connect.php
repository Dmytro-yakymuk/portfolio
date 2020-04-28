<?php
/**
 * Підключення до БД
 */

    // $dblocation = "127.0.0.1";
    // $port = "3307";
    // $dbname = "portfolio";
    // $dbuser = "root";
    // $dbpassword = "";

    
    $dblocation = "mysql.zzz.com.ua";
    $port = "3306";
    $dbname = "yakimuk_dmyto123";
    $dbuser = "yakimukdmyto123";
    $dbpassword = "009DimaYakum1231";
    
    try {
        $myPDO = new PDO('mysql:host='. $dblocation .';port='. $port .';dbname='. $dbname, $dbuser, $dbpassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        die('Подключение не удалось: ' . $e->getMessage());
    }
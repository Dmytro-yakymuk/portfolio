<?php

/**
 * Контролер головної сторінки
 */

// підключаєм моделі
//nclude_once '../models/CategoriesModel.php';
include_once 'models/UsersModel.php';


// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

/**
 * Формування головної сторінки сайта
 */
function indexAction($name) {
    if(isset($_SESSION['active'])) {
        header('Location: /');
    }
    include_once "view/" . $name . ".php"; 
}

function registerUserAction($name, $myPDO) {


    session_start();


        unset($_SESSION['error_message']);
        unset($_SESSION['success_message']);
        

        if(strlen($_POST['login']) < 2 || strlen($_POST['login']) > 12){
            $_SESSION['error_message']['login_len'] = 'Логін повинен містити від 2 до 12 символів!';
            echo $_SESSION['error_message']['login_len'];
        }
        if(strlen($_POST['password']) < 6 || strlen($_POST['password']) > 12){
            $_SESSION['error_message']['password_len'] = 'Пароль повинен містити від 6 до 12 символів!';
            echo $_SESSION['error_message']['password_len'];
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_message']['email_len'] = 'Email повинен відповідати стандартам';
            echo $_SESSION['error_message']['email_len'];
        }

        

        if(!$_SESSION['error_message']) {

            $flogin = $_POST['login'];
            $fpassword = md5($_POST['password']);
            $femail = $_POST['email'];

            $is_user = getUserByLogin($flogin, $myPDO);

            if($flogin == $is_user[0]['login']){
                $_SESSION['error_message']['login'] = 'Користувач з таким логіном вже існує!';
                echo $_SESSION['error_message']['login'];
            }

                
            if(!$_SESSION['error_message']){

                $mail = new PHPMailer\PHPMailer\PHPMailer();
                $mail->CharSet = "UTF-8";  

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // SMTP сервера GMAIL                                 
                $mail->SMTPAuth   = true;
                $mail->Username   = "dmytroyakimuk@gmail.com";
                $mail->Password   = "20000905natali";
                $mail->SMTPSecure = 'ssl';
                $mail->SMTPDebug = 1;
                $mail->Port = 587;

                $mail->SetFrom("dmytroyakimuk@gmail.com", "from-name");

                $mail->AddAddress($femail, $flogin);
                
                $mail->Subject = "Test PHP Mailer";

                $generate_random_string = generateRandomString();
                $content = "
                            <b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>
                            <a href=\"http:\/\/myportfol.kl.com.ua\/". $femail ."\/\". $generate_random_string >click</a>
                            ";
                
                
                $mail->MsgHTML($content); 
                if(!$mail->Send()) {
                    echo "Error while sending Email.";
                    var_dump($mail);
                } else {
                    echo "Email sent successfully";
                }
                


                $data = [
                    'login' => $flogin,
                    'password' => $fpassword
                ];

                addUser($data, $myPDO);

                $_SESSION['success_message']['register'] = 'Ви успішно зареєстровані!';
                echo 'success';
            }
        }
    


    // if(isset($_SESSION['success_message'])) {
    //     echo "<ul class='message_session'>";
    //         foreach($_SESSION['success_message'] as $error){
    //             echo "<li class='alert alert-success'>". $error . "</li>";
    //         }
    //     echo "</ul>";
    // }


    

}

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}




function loguotAction($name) {

    if(isset($_POST['is_activ'])) {
        unset($_SESSION['active']);
        $_SESSION['success_message']['register'] = 'Дозустрічі!';
    }

    include_once "view/" . $name . ".php"; 
}















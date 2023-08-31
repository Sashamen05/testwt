<?php
    session_start();

    $login = htmlspecialchars(trim($_POST['login']));
    $name = htmlspecialchars(trim($_POST['name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $pass = htmlspecialchars(trim($_POST['pass']));
    $repass = htmlspecialchars(trim($_POST['repass']));
    $email = htmlspecialchars(trim($_POST['email']));

    $error_create = "";

    unset($_SESSION['error_all']);
    unset($_SESSION['error_login']);
    unset($_SESSION['error_name']);
    unset($_SESSION['error_lastname']);
    unset($_SESSION['error_pass']);
    unset($_SESSION['error_repass']);
    
    function redirect() {
        header('Location: create.php');
        exit;
    }


    if(trim($login) == "" || trim($name) == "" || trim($last_name) == "" || trim($pass) == "" || trim($repass) == "" || trim($email) == "" ) {
        $_SESSION['error_all'] = "Заполните все поля";
        redirect();
    }else if(strlen($login) <= 1) {
        $_SESSION['error_login'] = "Не допустимая длина логина";
        redirect();
    } else  if(strlen($name) <= 1) {
        $_SESSION['error_name'] = "Не допустимая длина имени";
        redirect();
    } else  if(strlen($last_name) <= 1) {
        $_SESSION['error_lastname'] = "Не допустимая длина фамилии";
        redirect();
    }  else  if(strlen($pass) <= 5) {
        $_SESSION['error_pass'] = "Не допустимая длина пароля (не менее 5 символов)";
        redirect();
    }  else  if($repass != $pass) {
        $_SESSION['error_repass'] = "Пароли не совпадают";
        redirect();
    }else{
        header('Location: /index.php');
    }

    $pass = md5($pass);

    $mysql = new mysqli("localhost", "mysql", "mysql", "taekwondo-reg");
    $mysql->query("INSERT INTO `login` (`login`, `name`, `last name`, `email`, `pass`) VALUES('$login', '$name', '$last_name', '$email','$pass')");

    $mysql->close();
?>
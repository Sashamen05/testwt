<?php
session_start();

unset($_SESSION['error_auth']);

 $login = htmlspecialchars(trim($_POST['login']));
 $pass = htmlspecialchars(trim($_POST['pass']));

 $pass = md5($pass);

 $mysql = new mysqli("localhost", "mysql", "mysql", "taekwondo-reg");
 $result = $mysql->query("SELECT * FROM `login` WHERE `login` = '$login' AND `pass` = '$pass'");

 $user = $result->fetch_assoc();
 if(count($user) == 0) {
   $_SESSION['error_auth'] = "Такой пользователь не найлен";
   header('Location: ../index.php');
    exit;
 }
   
 setcookie('user', $user['name'], time() + 3600 * 24, "/");

 $mysql->close();

 header('Location: ../index.php');
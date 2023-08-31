<?php 
    session_start();
    
    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $date = htmlspecialchars(trim($_POST['date']));
    $dan = htmlspecialchars(trim($_POST['dan']));
    $sex = htmlspecialchars(trim($_POST['sex']));
    $club = htmlspecialchars(trim($_POST['club']));
    $coach_name = htmlspecialchars(trim($_POST['coach_name']));
    $coach_surname = htmlspecialchars(trim($_POST['coach_surname']));
    $id = htmlspecialchars(trim($_POST['id']));

    unset($_SESSION['error_all']);
    unset($_SESSION['error_name']);
    unset($_SESSION['error_surname']);
    unset($_SESSION['error_date']);
    unset($_SESSION['error_dan']);
    unset($_SESSION['error_sex']);
    unset($_SESSION['error_club']);
    unset($_SESSION['error_coach']);

    function redirect() {
        header('Location: competitorForm.php');
        exit;
    }

    if(trim($name) == "" || trim($surname) == "" || trim($date) == "" || trim($dan) == "" || trim($sex) == "" ||     trim($club) == "" || trim($coach_name) == "" || trim($coach_surname) == "") {
        $_SESSION['error_all'] = "Заполните все поля";
        redirect();
    }else if(strlen($name) <= 1) {
        $_SESSION['error_name'] = "Не допустимая длина имени";
        redirect();
    } else  if(strlen($surname) <= 1) {
        $_SESSION['error_surname'] = "Не допустимая длина фамилии";
        redirect();
    }else  if(strlen($club) <= 1) {
        $_SESSION['error_club'] = "Не допустимая длина клуба";
        redirect();
    }  else  if(strlen($coach_surname) <= 5 || strlen($coach_name) <= 5) {
        $_SESSION['error_coach'] = "Не допустимая длина тренера";
        redirect();
    } else{
        header('Location: ../index.php');
    }




        $images = $_FILES["avatar"];


        // Валидация типа файда
        $type = ["image/jpeg", "image/png"];

        if(!in_array($images["type"], $type)) {
            die('Incorrect file type');
        }



        // Валидация размера сайта
        $fileSize = $images["size"] / 10485760;
        $maxSize = 1; //mb

        if($fileSize > $maxSize) {
            die('Incorrect file size');
        }

        // Проверка папки на существование
        if(!is_dir('../img')) {
            mkdir('../img', 0777, true); //Создаём папку
        }


        // Получаем расширение файла
        $extension = pathinfo($images["name"], PATHINFO_EXTENSION);

        // Создание уникального тмени файла
        $fileName = time() . "." . $extension;


        // Перемещаем файл в опр папку
        move_uploaded_file($images ["tmp_name"], "../img/" . $fileName);



    $mysql = new mysqli("localhost", "mysql", "mysql", "taekwondo-reg");
        $mysql->query("INSERT INTO `competitor` (`id`,`name`, `surname`, `date`, `Gip/dan`, `Sex`, `club`, `coach_name`, `coach_surname`, `avatar`) VALUES('$id','$name', '$surname', '$date', '$dan', '$sex', '$club', '$coach_name', '$coach_surname', '$fileName')");

        $mysql->close();

?>
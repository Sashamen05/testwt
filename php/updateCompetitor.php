<?php
    require_once 'connect.php';


    $id = $_POST['id'];
    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $date = htmlspecialchars(trim($_POST['date']));
    $dan = htmlspecialchars(trim($_POST['dan']));
    $sex = htmlspecialchars(trim($_POST['sex']));
    $club = htmlspecialchars(trim($_POST['club']));
    $coach_name = htmlspecialchars(trim($_POST['coach_name']));
    $coach_surname = htmlspecialchars(trim($_POST['coach_surname']));




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



    mysqli_query($connect, "UPDATE `competitor` SET `name` = '$name', `surname` = '$surname', `date` = '$date', `Gip/dan` = '$dan', `Sex` = '$sex', `club` = '$club', `coach_name` = '$coach_name', `coach_surname` = '$coach_surname', `avatar` = '$fileName' WHERE `competitor`.`id` = '$id'");

    header('Location: /');

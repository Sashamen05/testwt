<?php
    session_start();


    require_once 'connect.php';


    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $date = htmlspecialchars(trim($_POST['date']));
    $club = htmlspecialchars(trim($_POST['club']));
    $id = htmlspecialchars(trim($_POST['id'])); 


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

    mysqli_query($connect, "INSERT INTO `coach` ( `id`,`name`, `surname`, `date`, `club`, `img`) VALUES('$id', '$name', '$surname', '$date', '$club','$fileName')");

    header('Location: /');

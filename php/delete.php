<?php

require_once 'connect.php';

$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `competitor` WHERE `competitor`.`id` = '$id'");

header('Location: /');

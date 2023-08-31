<?php

require_once 'connect.php';

$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `coach` WHERE `coach`.`id` = '$id'");

header('Location: ../coaches.php');

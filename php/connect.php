<?php

$connect = mysqli_connect('localhost', 'mysql', 'mysql', 'taekwondo-reg');

if(!$connect) {
    die('Error connect to disabled!');
}
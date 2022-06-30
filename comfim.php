<?php
session_start();

if (empty($_SESSION['token'])){
    $_SESSION['messages'][]='token has been expired!';
    header('location: signup.php');
}

var_dump($_GET);

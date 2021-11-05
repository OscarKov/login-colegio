<?php
session_start();

if($_SESSION) {
    var_dump($_SESSION);
    session_destroy();
    header('Location: /login.php');
}
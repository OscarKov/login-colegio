<?php
// template head.
require_once('resources/global/head.php');

function displayUserView() {
    $userData = [
        'name' => $_SESSION['name']
    ];

    include_once('resources/views/user.view.php');
}

function redirectToLogin() {
    header('Location: /login.php');
}

if (!$_SESSION) {
    redirectToLogin();
}
displayUserView();


// template head.
require_once('resources/global/footer.php');

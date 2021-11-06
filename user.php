<?php
// template head.
require_once('resources/global/head.php');

// Carga la vista del usuario logueado.
function displayUserView()
{
    $userData = [
        'name' => $_SESSION['name']
    ];

    include_once('resources/components/navbar.php');
    include_once('resources/views/user.view.php');
}

// Envia al login.
function redirectToLogin()
{
    header('Location: /login.php');
}

if (!$_SESSION) {
    redirectToLogin();
}
displayUserView();


// template head.
require_once('resources/global/footer.php');

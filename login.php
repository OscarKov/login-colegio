<?php

namespace App;

require_once('helpers/AuthHelper.php');

use Helpers\Auth\AuthHelper;

// template head.
include_once('resources/global/head.php');

// Registro de usuario.
function loginAttempt()
{
    $auth = new AuthHelper;

    $alertData = [
        'class' => 'primary',
        'title' => 'Ocurrio un error.',
        'message' => 'Revisa la información.'
    ];

    if (isset($_POST['txt_email']) && isset($_POST['txt_password'])) {
        $result = $auth->loginUser([
            'email' => $_POST['txt_email'],
            'password' => $_POST['txt_password']
        ]);

        if ($result) {
            header('Location: /user.php');
        }
    } else {
        $alertData['message'] = 'Campos faltantes.';
    }
    include_once('resources/components/alert.php');
}

function loginForm()
{
    include_once('resources/views/login.view.php');
}

// Intento de logueo.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    loginAttempt();
}

// Si existe sesion redirige al perfil
if ($_SESSION) {
    header('Location: /user.php');
}

loginForm();

// template footer.
include_once('resources/global/footer.php');

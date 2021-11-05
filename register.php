<?php

namespace App;

require_once('helpers/AuthHelper.php');

use Helpers\Auth\AuthHelper;

// template head.
include_once('resources/global/head.php');
// ruta del template de registro.

// Registro de usuario.
function registerAttempt()
{
    $alertData = [
        'class' => 'success',
        'title' => 'Usuario registrado.',
        'message' => 'Se registró exitosamente.'
    ];

    $auth = new AuthHelper;

    if (isset($_POST['txt_name']) && isset($_POST['txt_email']) && isset($_POST['txt_password'])) {
        $result = $auth->registerUser([
            'name' => $_POST['txt_name'],
            'email' => $_POST['txt_email'],
            'password' => $_POST['txt_password']
        ]);

        if (!$result) {
            $alertData['class'] = 'primary';
            $alertData['title'] = 'Ocurrió un error.';
            $alertData['message'] = 'No se pudo registrar.';
        }
    } else {
        $alertData['class'] = 'No se pudo registrar.';
    }
    include_once('resources/components/alert.php');
}

function registerForm()
{
    include_once('resources/views/register.view.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    registerAttempt();
}
registerForm();

// template footer.
include_once('resources/global/footer.php');

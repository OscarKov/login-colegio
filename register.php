<?php

namespace App;

require_once('helpers/AuthHelper.php');
require_once('helpers/ViewHelper.php');

use Helpers\Auth\AuthHelper;
use Helpers\View\ViewHelper;

// template head.
require_once('templates/global/head.php');
// ruta del template de registro.

// Registro de usuario.
function registerAttempt()
{
    $alert_path = 'templates/components/alert.php';

    $auth = new AuthHelper;

    if (isset($_POST['txt_name']) && isset($_POST['txt_email']) && isset($_POST['txt_password'])) {
        $result = $auth->registerUser([
            'name' => $_POST['txt_name'],
            'email' => $_POST['txt_email'],
            'password' => $_POST['txt_password']
        ]);

        if ($result) {
            echo ViewHelper::constructView($alert_path, 'success', 'Usuario registrado.', 'Se registró exitosamente.');
        } else {
            echo ViewHelper::constructView($alert_path, 'primary', 'Ocurrió un error.', 'No se pudo registrar.');
        }
    } else {
        echo ViewHelper::constructView($alert_path, 'primary', 'Ocurrió un error.', 'Falta inregisterFormacion.');
    }
}

function registerForm()
{
    $view_path = 'templates/register.view.php';
    echo ViewHelper::constructView($view_path);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    registerAttempt();
}
registerForm();

// template footer.
require_once('templates/global/footer.php');

<?php

function debuguear($variable): string
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}


function pagina_actual($path): bool
{
    if (isset($_SERVER['PATH_INFO'])) {
        return $_SERVER['PATH_INFO'] == $path;
    } else {
        return '/' == $path;
    }
}

function is_auth(): bool
{
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['nombre']) && !empty($_SESSION);
}

function is_admin(): bool
{
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['admin']) && !empty($_SESSION['admin']);
}

function mensajeAlerta($variable)
{
    switch ($variable) {
        case '1':
            $mensaje = 'Tu PassWord ha sido actualizado correctamente';
            break;
        case '2':
            $mensaje = 'El Instructor ha sido creado correctamente';
        default:
            '# Code...';
            break;
    }

    return $mensaje;
}
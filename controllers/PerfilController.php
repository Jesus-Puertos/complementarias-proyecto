<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class PerfilController
{
    public static function index(Router $router)
    {
        if (!is_auth()) {
            header('Location: /login');
        }

        //checar el  usuario y traer sus datos 

        $usuario = Usuario::find($_SESSION['id']);

        $router->render('perfil/perfil', [
            'titulo' => 'Hola 👋 ' . $usuario->nombre . ' ' . ' un gusto verte de nuevo',
            'usuario' => $usuario
        ]);
    }

    public static function actualizar(Router $router)
    {
        $router->render('perfil/actualizar', [
            'titulo' => 'Hola 👋'
        ]);
    }

}
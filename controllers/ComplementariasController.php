<?php

namespace Controllers;


use MVC\Router;

class ComplementariasController
{

    public static function index(Router $router)
    {
        $router->render('admin/complementarias/index', [
            'titulo' => 'Complementarias de la plataforma'
        ]);
    }
}

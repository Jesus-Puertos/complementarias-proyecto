<?php

namespace Controllers;


use Model\Evento;
use Model\Registro;
use Model\Usuario;
use MVC\Router;

class DashboardController
{

    public static function index(Router $router)
    {
        if (!is_admin()) {
            header('Location: /login');
        }

        //Obtener los ultimos registros
        $registros = Registro::get(5);
        foreach ($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
        }

        //Obetener eventos con mas y menos lugares disponibles
        $menos_disponibles = Evento::ordenarLimite('disponibles', 'ASC', 5);
        $mas_disponibles = Evento::ordenarLimite('disponibles', 'DESC', 5);



        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de administración',
            'registros' => $registros,
            'menos_disponibles' => $menos_disponibles,
            'mas_disponibles' => $mas_disponibles
        ]);
    }
}

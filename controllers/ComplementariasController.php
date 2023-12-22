<?php

namespace Controllers;


use Classes\Paginacion;
use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\Instructor;
use Model\Unidad;
use MVC\Router;
use Model\Modalidad;

class ComplementariasController
{

    public static function index(Router $router)
    {
        if (!is_admin()) {
            header('Location: /login');
        }


        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if (!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/complementarias?page=1');
        }

        $por_pagina = 5;
        $total = Evento::total();
        $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);


        $complementarias = Evento::paginar($por_pagina, $paginacion->offset());

        foreach ($complementarias as $complementaria) {
            $complementaria->categoria = Categoria::find($complementaria->categoria_id);
            $complementaria->modalidad = Modalidad::find($complementaria->modalidad_id);
            $complementaria->dia = Dia::find($complementaria->dia_id);
            $complementaria->hora = Hora::find($complementaria->hora_id);
            $complementaria->unidad = Unidad::find($complementaria->unidad_id);
            $complementaria->instructor = Instructor::find($complementaria->instructor_id);

        }


        $router->render('admin/complementarias/index', [
            'titulo' => 'Complementarias de la plataforma',
            'complementarias' => $complementarias,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router)
    {
        if (!is_admin()) {
            header('Location: /login');
        }


        $alertas = [];

        //'ASC' Para que se ordene de forma ascendente
        $categorias = Categoria::all('ASC');
        $unidades = Unidad::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');
        $modalidades = Modalidad::all('ASC');

        $evento = new Evento;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!is_admin()) {
                header('Location: /login');
            }


            $evento->sincronizar($_POST);

            $alertas = $evento->validar();

            if (empty($alertas)) {
                $resultado = $evento->guardar();

                if ($resultado) {
                    header('Location: /admin/complementarias');
                    return;
                }
            }
        }

        $router->render('admin/complementarias/crear', [
            'titulo' => 'Registrar Complementaria',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'modalidades' => $modalidades,
            'unidades' => $unidades,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento,
        ]);
    }



    public static function editar(Router $router)
    {
        if (!is_admin()) {
            header('Location: /login');
        }


        $alertas = [];

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin/complementarias');
            return;
        }


        //'ASC' Para que se ordene de forma ascendente
        $categorias = Categoria::all('ASC');
        $unidades = Unidad::all('ASC');
        $modalidades = Modalidad::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');

        $evento = Evento::find($id);
        if (!$evento) {
            header('Location: /admin/complementarias');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!is_admin()) {
                header('Location: /login');
            }


            $evento->sincronizar($_POST);

            $alertas = $evento->validar();

            if (empty($alertas)) {
                $resultado = $evento->guardar();

                if ($resultado) {
                    header('Location: /admin/complementarias');
                    return;
                }
            }
        }

        $router->render('admin/complementarias/editar', [
            'titulo' => 'Editar Complementaria',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'modalidades' => $modalidades,
            'unidades' => $unidades,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento,
        ]);
    }


    public static function eliminar()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!is_admin()) {
                header('Location: /login');
            }


            $id = $_POST['id'];
            $complementaria = Evento::find($id);

            if (!isset($complementaria)) {
                header('Location: /admin/complementarias');
                return;
            }

            $resultado = $complementaria->eliminar();

            if ($resultado) {
                header('Location: /admin/complementarias');
                return;
            }

        }
    }
}

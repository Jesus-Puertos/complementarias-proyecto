<?php

namespace Controllers;

use Model\Evento;
use MVC\Router;
use Model\Categoria;
use Model\Dia;
use Model\Hora;
use Model\Instructor;
use Model\Unidad;

class PaginasController
{
    public static function index(Router $router)
    {



        $router->render('paginas/index', [
            'titulo' => 'Inicio'
        ]);
    }

    public static function complementarias(Router $router)
    {



        $router->render('paginas/complementarias', [
            'titulo' => 'Sobre las complementarias'
        ]);
    }

    public static function modos(Router $router)
    {



        $router->render('paginas/modalidades', [
            'titulo' => 'Modalidades de las complementarias'
        ]);
    }

    public static function listaDeComplementarias(Router $router)
    {




        $router->render('paginas/complementarias-lista', [
            'titulo' => 'Lista de las complementarias',

        ]);
    }

    public static function proyectoIntegrador(Router $router)
    {


        $eventos = Evento::ordenar('hora_id', 'ASC');

        $eventos_formateados = [];
        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->unidad = Unidad::find($evento->unidad_id);
            $evento->instructor = Instructor::find($evento->instructor_id);




            if ($evento->dia_id === "1" && $evento->categoria_id === "1") {
                $eventos_formateados['proyecto_l'][] = $evento;
            }

            if ($evento->dia_id === "2" && $evento->categoria_id === "1") {
                $eventos_formateados['proyecto_m'][] = $evento;
            }

            if ($evento->dia_id === "3" && $evento->categoria_id === "1") {
                $eventos_formateados['proyecto_mier'][] = $evento;
            }

            if ($evento->dia_id === "4" && $evento->categoria_id === "1") {
                $eventos_formateados['proyecto_j'][] = $evento;
            }

            if ($evento->dia_id === "5" && $evento->categoria_id === "1") {
                $eventos_formateados['proyecto_v'][] = $evento;
            }

            if ($evento->dia_id === "6" && $evento->categoria_id === "1") {
                $eventos_formateados['proyecto_s'][] = $evento;
            }

            if ($evento->dia_id === "7" && $evento->categoria_id === "1") {
                $eventos_formateados['proyecto_d'][] = $evento;
            }

        }




        $router->render('paginas/proyecto-integrador', [
            'titulo' => 'Proyecto Integrador',
            'eventos' => $eventos_formateados,
        ]);

    }

    public static function compromiso(Router $router)
    {


        $eventos = Evento::ordenar('hora_id', 'ASC');

        $eventos_formateados = [];
        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->unidad = Unidad::find($evento->unidad_id);
            $evento->instructor = Instructor::find($evento->instructor_id);




            if ($evento->dia_id === "1" && $evento->categoria_id === "2") {
                $eventos_formateados['compromiso_l'][] = $evento;
            }

            if ($evento->dia_id === "2" && $evento->categoria_id === "2") {
                $eventos_formateados['compromiso_m'][] = $evento;
            }

            if ($evento->dia_id === "3" && $evento->categoria_id === "2") {
                $eventos_formateados['compromiso_mier'][] = $evento;
            }

            if ($evento->dia_id === "4" && $evento->categoria_id === "2") {
                $eventos_formateados['compromiso_j'][] = $evento;
            }

            if ($evento->dia_id === "5" && $evento->categoria_id === "1") {
                $eventos_formateados['compromiso_v'][] = $evento;
            }

            if ($evento->dia_id === "6" && $evento->categoria_id === "2") {
                $eventos_formateados['compromiso_s'][] = $evento;
            }

            if ($evento->dia_id === "7" && $evento->categoria_id === "2") {
                $eventos_formateados['compromiso_d'][] = $evento;
            }

        }




        $router->render('paginas/compromiso', [
            'titulo' => 'Compromiso Social',
            'eventos' => $eventos_formateados,
        ]);

    }

    public static function curso(Router $router)
    {
        $eventos = Evento::ordenar('hora_id', 'ASC');

        $eventos_formateados = [];
        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->unidad = Unidad::find($evento->unidad_id);
            $evento->instructor = Instructor::find($evento->instructor_id);

            if ($evento->dia_id === "1" && $evento->categoria_id === "3") {
                $eventos_formateados['curso_l'][] = $evento;
            }

            if ($evento->dia_id === "2" && $evento->categoria_id === "3") {
                $eventos_formateados['curso_m'][] = $evento;
            }

            if ($evento->dia_id === "3" && $evento->categoria_id === "3") {
                $eventos_formateados['curso_mier'][] = $evento;
            }

            if ($evento->dia_id === "4" && $evento->categoria_id === "3") {
                $eventos_formateados['curso_j'][] = $evento;
            }

            if ($evento->dia_id === "5" && $evento->categoria_id === "3") {
                $eventos_formateados['curso_v'][] = $evento;
            }

            if ($evento->dia_id === "6" && $evento->categoria_id === "3") {
                $eventos_formateados['curso_s'][] = $evento;
            }

            if ($evento->dia_id === "7" && $evento->categoria_id === "3") {
                $eventos_formateados['curso_d'][] = $evento;
            }


        }

        $router->render('paginas/curso', [
            'titulo' => 'Cursos',
            'eventos' => $eventos_formateados,
        ]);

    }
}
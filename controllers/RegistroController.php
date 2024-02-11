<?php

namespace Controllers;

use Model\EventosRegistros;
use Model\Paquete;
use Model\Registro;
use Model\Usuario;
use MVC\Router;
use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\Instructor;
use Model\Modalidad;
use Model\Unidad;



class RegistroController
{

    public static function crear(Router $router)
    {
        if (!is_auth()) {
            header('Location: /');
            return;
        }

        //Verificar si el usuario ya esta registrado
        $registro = Registro::where('usuario_id', $_SESSION['id']);

        if (isset($registro) && ($registro->paquete_id === "1" || $registro->paquete_id === "2")) {
            header('Location: /boleto?id=' . urlencode($registro->token));
            return;
        }
        $router->render('registro/crear', [
            'titulo' => 'Finalizar registro'
        ]);
    }


    public static function presencial(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!is_auth()) {
                header('Location: /login');
            }
            //Verificar si el usuario ya esta registrado
            $registro = Registro::where('usuario_id', $_SESSION['id']);

            if (isset($registro) && ($registro->paquete_id === "1" || $registro->paquete_id === "2")) {
                header('Location: /boleto?id=' . urlencode($registro->token));
                return;
            }
            $token = substr(md5(uniqid(rand(), true)), 0, 8);

            //crear registros
            $datos = [
                'paquete_id' => 1,
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            ];


            $registro = new Registro($datos);
            $resultado = $registro->guardar();

            if ($resultado) {
                header('Location: /boleto?id=' . urlencode($registro->token));
            }

        }
    }

    public static function virtual(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!is_auth()) {
                header('Location: /login');
            }
            //Verificar si el usuario ya esta registrado
            $registro = Registro::where('usuario_id', $_SESSION['id']);

            if (isset($registro) && ($registro->paquete_id === "2")) {
                header('Location: /boleto?id=' . urlencode($registro->token));
                return;
            }
            $token = substr(md5(uniqid(rand(), true)), 0, 8);

            //crear registros
            $datos = array(
                'paquete_id' => 2,
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            );


            $registro = new Registro($datos);
            $resultado = $registro->guardar();

            if ($resultado) {
                header('Location: /boleto?id=' . urlencode($registro->token));
            }

        }
    }

    public static function boleto(Router $router)
    {

        // Validar la URL
        $id = $_GET['id'];

        if (!$id || !strlen($id) === 8) {
            header('Location: /');
            return;
        }

        // buscarlo en la BD
        $registro = Registro::where('token', $id);
        if (!$registro) {
            header('Location: /');
            return;
        }
        // Llenar las tablas de referencia
        $registro->usuario = Usuario::find($registro->usuario_id);
        $registro->paquete = Paquete::find($registro->paquete_id);

        $router->render('registro/boleto', [
            'titulo' => 'Tu boleto',
            'registro' => $registro
        ]);
    }
    public static function complementarias(Router $router)
    {
        if (!is_auth()) {
            header('Location: /login');
            return;
        }

        $usuario_id = $_SESSION['id'];
        $registro = Registro::where('usuario_id', $usuario_id);

        //Redireccionar a boleto si ya tiene un evento registrado
        if (!$registro) {
            header('Location: /boleto?id=' . urlencode($registro->token));
            return;
        } else if ($registro) {
            $eventos_registrados = EventosRegistros::where('registro_id', $registro->id);
            if ($eventos_registrados) {
                header('Location: /perfil');
                return;
            }
        }

        $eventos = Evento::ordenar('hora_id', 'ASC');

        $eventos_formateados = [];
        $dias = ['1' => 'l', '2' => 'm', '3' => 'mier', '4' => 'j', '5' => 'v', '6' => 's', '7' => 'd'];
        $categorias = ['1' => 'proyecto', '2' => 'curso', '3' => 'compromiso'];

        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->modalidad = Modalidad::find($evento->modalidad_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->unidad = Unidad::find($evento->unidad_id);
            $evento->instructor = Instructor::find($evento->instructor_id);

            if (isset($categorias[$evento->categoria_id])) {
                $clave = $categorias[$evento->categoria_id] . '_' . $dias[$evento->dia_id];
                $eventos_formateados[$clave][] = $evento;
            }
        }

        $categorias = Categoria::all('ASC');

        // Manejando el registro mediante $_POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Revisar que el usuario este autenticado
            if (!is_auth()) {
                header('Location: /login');
                return;
            }

            $eventos = explode(',', $_POST['eventos']);
            if (empty($eventos)) {
                echo json_encode(['resultado' => false]);
                return;
            }

            // Obtener el registro de usuario
            $registro = Registro::where('usuario_id', $_SESSION['id']);
            if (!isset($registro) || ($registro->paquete_id !== "1" && $registro->paquete_id !== "2")) {
                echo json_encode(['resultado' => false]);
                return;
            }

            $eventos_array = [];
            // Validar la disponibilidad de los eventos seleccionados
            foreach ($eventos as $evento_id) {
                $evento = Evento::find($evento_id);
                // Comprobar que el evento exista
                if (!isset($evento) || $evento->disponibles === "0") {
                    echo json_encode(['resultado' => false]);
                    return;
                }
                $eventos_array[] = $evento;
            }

            foreach ($eventos_array as $evento) {
                $evento->disponibles -= 1;
                $evento->guardar();

                // Almacenar el registro
                $datos = [
                    'evento_id' => (int) $evento->id,
                    'registro_id' => (int) $registro->id
                ];

                $registro_usuario = new EventosRegistros($datos);
                $resultado = $registro_usuario->guardar();
            }
            if ($resultado) {
                echo json_encode(['resultado' => $resultado, 'token' => $registro->token]);
                return;
            } else {
                echo json_encode(['resultado' => false]);
                return;
            }


        }

        $router->render('registro/complementarias', [
            'titulo' => 'Elije tus complementarias',
            'eventos' => $eventos_formateados,
            'categorias' => $categorias
        ]);
    }


}



<?php

namespace Controllers;

use Model\Instructor;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class InstructoresController
{

    public static function index(Router $router)
    {


        if (!is_admin()) {
            header('Location: /login');
        }

        $alertas = [];

        $mensaje = $_GET['mensaje'];
        if ($mensaje) {
            Instructor::setAlerta('exito', \mensajeAlerta($mensaje));
        }

        $alertas = Instructor::getAlertas();

        $instructores = Instructor::all();

        // debuguear($instructores);

        $router->render('admin/instructores/index', [
            'titulo' => 'Instuctores de la plataforma',
            'instructores' => $instructores,

        ]);
    }

    public static function crear(Router $router)
    {
        if (!is_admin()) {
            header('Location: /login');
        }

        $alertas = [];

        $instructor = new Instructor;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!is_admin()) {
                header('Location: /login');
            }
            //Leer imagen
            if (!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = './../public/img/instructores';

                // Crear la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0777, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;

                // Guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            $instructor->sincronizar($_POST);

            //validar
            $alertas = $instructor->validar();

            //Guardar el registro
            if (empty($alertas)) {
                //Guardar en la base de datos
                $resultado = $instructor->guardar();
                if ($resultado) {
                    header('Location: /admin/instructores?mensaje=2');
                    exit;
                }
            }
        }

        $router->render('admin/instructores/crear', [
            'titulo' => 'Registrar nuevo instructor',
            'alertas' => $alertas,
            'instructor' => $instructor,
            'redes' => json_decode($instructor->redes)

        ]);
    }


    public static function editar(Router $router)
    {
        if (!is_admin()) {
            header('Location: /login');
        }

        $alertas = [];
        //validar el id
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin/instructores?mensaje=3');
        }

        //Obtener el instructor a editar

        $instructor = Instructor::find($id);
        if (!$instructor) {
            header('Location: /admin/instructores?mensaje=3');
        }

        $instructor->imagen_actual = $instructor->imagen;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!is_admin()) {
                header('Location: /login');
            }

            //Leer imagen
            if (!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = './../public/img/instructores';

                //Eliminar imagen anterior 
                unlink($carpeta_imagenes . '/' . $instructor->imagen_actual . ".png");
                unlink($carpeta_imagenes . '/' . $instructor->imagen_actual . ".webp");

                // Crear la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0777, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;


            } else {
                $_POST['imagen'] = $instructor->imagen_actual;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            $instructor->sincronizar($_POST);

            $alertas = $instructor->validar();

            if (empty($alertas)) {
                if (isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                }
                $resultado = $instructor->guardar();

                if ($resultado) {
                    header('Location: /admin/instructores?mensaje=1');
                }
            }

        }


        $router->render('admin/instructores/editar', [
            'titulo' => 'Actualizar instructor',
            'alertas' => $alertas,
            'instructor' => $instructor,
            'redes' => json_decode($instructor->redes)
        ]);
    }

    public static function eliminar()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!is_admin()) {
                header('Location: /login');
            }

            $id = $_POST['id'];
            $instructor = Instructor::find($id);

            if (isset($instructor)) {
                header('Location: /admin/instructores?mensaje=3');
            }


            //Eliminar imagenes de la carpeta instructores si el instructor ya no existe en la base de datos
            $carpeta_imagenes = './../public/img/instructores';
            unlink($carpeta_imagenes . '/' . $instructor->imagen . ".png");
            unlink($carpeta_imagenes . '/' . $instructor->imagen . ".webp");

            $instructor->eliminar();



            $resultado = $instructor->eliminar();

            if ($resultado) {
                header('Location: /admin/instructores?mensaje=4');
            }

        }
    }
}


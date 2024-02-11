<?php

namespace Controllers;

use Model\EventosRegistros;
use Classes\Paginacion;
use Model\Evento;
use Model\Paquete;
use Model\Registro;
use Model\Unidad;
use Model\Usuario;
use MVC\Router;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RegistradosController
{

    public static function index(Router $router)
    {
        if (!is_admin()) {
            header('Location: /login');
        }
        $pagina_actual = $_GET['page'] ?? 1;
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if (!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/registrados?page=1');
        }

        $registros_por_pagina = 30;

        // Obtener todos los registros y aplicar el filtro
        $registros = Registro::all();

        foreach ($registros as $registro) {
            // Buscar el registro del evento para este registro
            $eventoRegistro = EventosRegistros::where('registro_id', $registro->id);
            // Si encontramos un registro del evento, buscar el evento correspondiente
            if ($eventoRegistro) {
                $registro->evento = Evento::find($eventoRegistro->evento_id);
            }
        }

        $unidad_id = $_GET['unidad_id'] ?? null;

        if ($unidad_id) {
            $registros = array_filter($registros, function ($registro) use ($unidad_id) {
                return $registro->evento && $registro->evento->unidad_id == $unidad_id;
            });
        }
        // Actualizar el total de registros después de aplicar el filtro
        $total = count($registros);

        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if ($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/registrados?page=1');
        }


        //Obtener los registros de la base de datos
        foreach ($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
            $registro->paquete = Paquete::find($registro->paquete_id);
            // Buscar el registro del evento para este registro
            $eventoRegistro = EventosRegistros::where('registro_id', $registro->id);
            // Si encontramos un registro del evento, buscar el evento correspondiente
            if ($eventoRegistro) {
                $registro->evento = Evento::find($eventoRegistro->evento_id);
                if ($registro->evento) {
                    $registro->unidad = Unidad::find($registro->evento->unidad_id);
                }
            }
        }

        $complementarias = Evento::all();
        $unidades = Unidad::all();

        $router->render('admin/registrados/index', [
            'titulo' => 'Alumnos registrados',
            'registros' => $registros,
            'paginacion' => $paginacion->paginacion(),
            'complementarias' => $complementarias,
            'unidades' => $unidades,
            'unidad_id' => $unidad_id,
        ]);
    }


    public static function descargar()
    {
        // Crear un nuevo Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Obtener la hoja activa para trabajar con ella
        $sheet = $spreadsheet->getActiveSheet();

        // Agregar los títulos de las columnas
        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Modalidad');
        $sheet->setCellValue('D1', 'Complementaria');
        $sheet->setCellValue('E1', 'Unidad');
        $sheet->setCellValue('F1', 'Género');
        $sheet->setCellValue('G1', 'Escolaridad');

        // Obtener los registros de la base de datos
        $registros = Registro::all();

        foreach ($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
            $registro->paquete = Paquete::find($registro->paquete_id);
            // Buscar el registro del evento para este registro
            $eventoRegistro = EventosRegistros::where('registro_id', $registro->id);
            // Si encontramos un registro del evento, buscar el evento correspondiente
            if ($eventoRegistro) {
                $registro->evento = Evento::find($eventoRegistro->evento_id);
                if ($registro->evento) {
                    $registro->unidad = Unidad::find($registro->evento->unidad_id);
                }
            }
        }
        // Agregar los datos de los registros a las celdas correspondientes
        foreach ($registros as $i => $registro) {

            $nombre = $registro->usuario ? $registro->usuario->nombre : 'N/A';
            $apellido = $registro->usuario ? $registro->usuario->apellido : 'N/A';
            $email = $registro->usuario ? $registro->usuario->email : 'N/A';
            $paquete = $registro->paquete ? $registro->paquete->nombre : 'N/A';
            $evento = $registro->evento ? $registro->evento->nombre : 'N/A';
            $unidad = $registro->unidad ? $registro->unidad->nombre : 'N/A';
            $genero = $registro->usuario ? $registro->usuario->genero : 'N/A';
            $modalidad = $registro->usuario ? $registro->usuario->modalidad : 'N/A';

            $sheet->setCellValue('A' . ($i + 2), $nombre . ' ' . $apellido);
            $sheet->setCellValue('B' . ($i + 2), $email);
            $sheet->setCellValue('C' . ($i + 2), $paquete);
            $sheet->setCellValue('D' . ($i + 2), $evento);
            $sheet->setCellValue('E' . ($i + 2), $unidad);
            $sheet->setCellValue('F' . ($i + 2), $genero);
            $sheet->setCellValue('G' . ($i + 2), $modalidad);
        }

        // Crear un escritor de Xlsx
        $writer = new Xlsx($spreadsheet);

        // Enviar el archivo al navegador
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="registros.xlsx"');
        $writer->save('php://output');
        exit;
    }
}


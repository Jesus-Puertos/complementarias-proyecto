<?php

namespace Model;

class Evento extends ActiveRecord
{

    protected static $tabla = 'eventos';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'disponibles', 'categoria_id', 'unidad_id', 'dia_id', 'hora_id', 'instructor_id'];

    public $id;
    public $nombre;

    public $descripcion;

    public $disponibles;

    public $categoria_id;

    public $unidad_id;

    public $dia_id;

    public $hora_id;

    public $instructor_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->disponibles = $args['disponibles'] ?? '';
        $this->categoria_id = $args['categoria_id'] ?? '';
        $this->unidad_id = $args['unidad_id'] ?? '';
        $this->dia_id = $args['dia_id'] ?? '';
        $this->hora_id = $args['hora_id'] ?? '';
        $this->instructor_id = $args['instructor_id'] ?? '';

    }

    // Mensajes de validación para la creación de un evento
    public function validar()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if (!$this->descripcion) {
            self::$alertas['error'][] = 'La descripción es Obligatoria';
        }
        if (!$this->categoria_id || !filter_var($this->categoria_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Elige una Categoría';
        }
        if (!$this->unidad_id || !filter_var($this->unidad_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Elige la unidad académica';
        }
        if (!$this->dia_id || !filter_var($this->dia_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Elige el Día de la complementaria';
        }
        if (!$this->hora_id || !filter_var($this->hora_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Elige la hora de la complementaria';
        }
        if (!$this->disponibles || !filter_var($this->disponibles, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Añade una cantidad de Lugares Disponibles';
        }
        if (!$this->instructor_id || !filter_var($this->instructor_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Selecciona la persona encargada de la complementaria';
        }

        return self::$alertas;
    }

}

?>
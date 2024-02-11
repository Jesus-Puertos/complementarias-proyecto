<?php

namespace Model;

class Instructor extends ActiveRecord
{

    protected static $tabla = 'instructores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'ciudad', 'telefono', 'email', 'imagen', 'tags', 'redes'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tags = $args['tags'] ?? '';
        $this->redes = $args['redes'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if (!$this->apellido) {
            self::$alertas['error'][] = 'El Apellido es Obligatorio';
        }
        if (!$this->ciudad) {
            self::$alertas['error'][] = 'El Campo Ciudad es Obligatorio';
        }
        if (!$this->telefono) {
            self::$alertas['error'][] = 'El Telefono es Obligatorio';
        }
        if (!$this->email) {
            self::$alertas['error'][] = 'El Correo es Obligatorio';
        }
        if (!$this->imagen) {
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }
        if (!$this->tags) {
            self::$alertas['error'][] = 'El Campo áreas es obligatorio';
        }

        return self::$alertas;
    }



}
<?php

namespace Model;

class Registro extends ActiveRecord
{

    protected static $tabla = 'registros';
    protected static $columnasDB = ['id', 'paquete_id', 'token', 'usuario_id'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->paquete_id = $args['paquete_id'] ?? null;
        $this->token = $args['token'] ?? '';
        $this->usuario_id = $args['usuario_id'] ?? '';
    }


}
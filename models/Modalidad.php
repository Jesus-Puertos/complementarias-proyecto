<?php

namespace Model;

class Modalidad extends ActiveRecord
{

    protected static $tabla = 'modalidades';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

}

?>
<?php

namespace Model;

class Tipo extends ActiveRecord
{

    protected static $tabla = 'tipos';
    protected static $columnasDB = ['id', 'tipo'];

    public $id;
    public $tipo;

}

?>
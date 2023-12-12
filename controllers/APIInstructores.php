<?php



namespace Controllers;

use Model\Instructor;

class APIInstructores
{

    public static function index()
    {
        $instructores = Instructor::all();

        echo json_encode($instructores);
    }

    public static function instructor()
    {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id || $id < 1) {
            echo json_encode([]);
            return;
        }
        $instructor = Instructor::find($id);

        echo json_encode($instructor, JSON_UNESCAPED_SLASHES);
    }
}
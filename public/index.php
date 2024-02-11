<?php


require_once __DIR__ . '/../includes/app.php';


use Controllers\APIComplementarias;
use Controllers\APIInstructores;
use Controllers\PaginasController;
use Controllers\PerfilController;
use MVC\Router;
use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\ComplementariasController;
use Controllers\InstructoresController;
use Controllers\RegistradosController;
use Controllers\RegistroController;
use Controllers\AsistenciaController;


$router = new Router();


// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

//area de administración
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

$router->get('/admin/instructores', [InstructoresController::class, 'index']);
$router->get('/admin/instructores/crear', [InstructoresController::class, 'crear']);
$router->post('/admin/instructores/crear', [InstructoresController::class, 'crear']);
$router->get('/admin/instructores/editar', [InstructoresController::class, 'editar']);
$router->post('/admin/instructores/editar', [InstructoresController::class, 'editar']);
$router->post('/admin/instructores/eliminar', [InstructoresController::class, 'eliminar']);


$router->get('/admin/complementarias', [ComplementariasController::class, 'index']);
$router->get('/admin/complementarias/crear', [ComplementariasController::class, 'crear']);
$router->post('/admin/complementarias/crear', [ComplementariasController::class, 'crear']);
$router->get('/admin/complementarias/editar', [ComplementariasController::class, 'editar']);
$router->post('/admin/complementarias/editar', [ComplementariasController::class, 'editar']);
$router->post('/admin/complementarias/eliminar', [ComplementariasController::class, 'eliminar']);



$router->get('/api/complementarias-horario', [APIComplementarias::class, 'index']);
$router->get('/api/instructores', [APIInstructores::class, 'index']);
$router->get('/api/instructor', [APIInstructores::class, 'instructor']);


$router->get('/admin/registrados', [RegistradosController::class, 'index']);
$router->get('/admin/registrados/descargar', function () {
    $controller = new RegistradosController();
    $controller->descargar();
});

//Registro de usuarios
$router->get('/finalizar-registro', [RegistroController::class, 'crear']);
$router->post('/finalizar-registro/presencial', [RegistroController::class, 'presencial']);
$router->post('/finalizar-registro/virtual', [RegistroController::class, 'virtual']);

$router->get('/finalizar-registro/complementarias', [RegistroController::class, 'complementarias']);
$router->post('/finalizar-registro/complementarias', [RegistroController::class, 'complementarias']);


//boleto presencial
$router->get('/boleto', [RegistroController::class, 'boleto']);



//Area Publica

$router->get('/', [PaginasController::class, 'index']);
$router->get('/complementarias', [PaginasController::class, 'complementarias']);
$router->get('/modalidades', [PaginasController::class, 'modos']);
$router->get('/complementarias-lista', [PaginasController::class, 'listaDeComplementarias']);
$router->get('/proyecto-integrador', [PaginasController::class, 'proyectoIntegrador']);
$router->get('/compromiso', [PaginasController::class, 'compromiso']);
$router->get('/curso', [PaginasController::class, 'curso']);
$router->get('/404', [PaginasController::class, 'error']);

//Vista del resumen del usuario
$router->get('/perfil', [PerfilController::class, 'index']);
$router->post('/actualizar', [PerfilController::class, 'actualizar']);







$router->comprobarRutas();
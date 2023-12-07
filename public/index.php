<?php



require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\ComplementariasController;
use Controllers\InstructoresController;
use Controllers\RegistradosController;

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

$router->get('/admin/registrados', [RegistradosController::class, 'index']);


$router->comprobarRutas();
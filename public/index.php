<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\EmpleadoController;
use Controllers\PuestoController;
use Controllers\AreaController;
use Controllers\AsignacionController;
use Controllers\DetalleController;




$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);
$router->get('/empleados', [EmpleadoController::class,'index']);
$router->post('/API/empleados/guardar', [EmpleadoController::class,'guardarAPI']);
$router->get('/API/empleados/buscar', [EmpleadoController::class,'buscarAPI']);
$router->post('/API/empleados/modificar', [EmpleadoController::class,'modificarAPI']);
$router->post('/API/empleados/eliminar', [EmpleadoController::class,'eliminarAPI']);

$router->get('/', [AppController::class,'index']);
$router->get('/puestos', [PuestoController::class,'index']);
$router->post('/API/puestos/guardar', [PuestoController::class,'guardarAPI']);
$router->get('/API/puestos/buscar', [PuestoController::class,'buscarAPI']);
$router->post('/API/puestos/modificar', [PuestoController::class,'modificarAPI']);
$router->post('/API/puestos/eliminar', [PuestoController::class,'eliminarAPI']);

$router->get('/', [AppController::class,'index']);
$router->get('/areas', [AreaController::class,'index']);
$router->post('/API/areas/guardar', [AreaController::class,'guardarAPI']);
$router->get('/API/areas/buscar', [AreaController::class,'buscarAPI']);
$router->post('/API/areas/modificar', [AreaController::class,'modificarAPI']);
$router->post('/API/areas/eliminar', [AreaController::class,'eliminarAPI']);

$router->get('/', [AppController::class,'index']);
$router->get('/asignaciones', [AsignacionController::class,'index']);
$router->post('/API/asignaciones/guardar', [AsignacionController::class,'guardarAPI']);
$router->get('/API/asignaciones/buscar', [AsignacionController::class,'buscarAPI']);
$router->post('/API/asignaciones/modificar', [AsignacionController::class,'modificarAPI']);
$router->post('/API/asignaciones/eliminar', [AsignacionController::class,'eliminarAPI']);



$router->get('/detalle', [DetalleController::class, 'index']);




// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();

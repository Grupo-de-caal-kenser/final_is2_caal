<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\EmpleadoController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);
$router->get('/empleados', [EmpleadoController::class,'index']);
$router->post('/API/empleados/guardar', [EmpleadoController::class,'guardarAPI']);
$router->get('/API/empleados/buscar', [EmpleadoController::class,'buscarAPI']);
$router->post('/API/empleados/modificar', [EmpleadoController::class,'modificarAPI']);
$router->post('/API/empleados/eliminar', [EmpleadoController::class,'eliminarAPI']);




// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();

<?php

namespace Controllers;

use Exception;
use Model\Empleado;
use MVC\Router;

class EmpleadoController{
    public static function index(Router $router){
        $empleados = Empleado::all();
        // $empleados2 = Producto::all();
        // var_dump($empleados);
        // exit;
        $router->render('empleados/index', [
           'empleados' => $empleados,
            // 'empleados2' => $empleados2,
        ]);

    }

    public static function guardarAPI(){
        try {
            $empleado = new Empleado($_POST);
            $resultado = $empleado->crear();

            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Registro guardado correctamente',
                    'codigo' => 1
                ]);
            }else{
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
            // echo json_encode($resultado);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function buscarAPI(){
        //$productos = Producto::all();
        $empleado_nombre = $_GET['empleado_nombre'];
        $empleado_dpi = $_GET['empleado_dpi'];

        $sql = "SELECT * FROM empleados where empleado_situacion = 1 ";
        if($empleado_nombre != '') {
            $sql.= " and empleado_nombre like '%$empleado_nombre%' ";
        }
        if($empleado_dpi != '') {
            $sql.= " and empleado_dpi = $empleado_dpi ";
        }
        try {
            
            $empleados = Empleado::fetchArray($sql);
    
            echo json_encode($empleados);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
    public static function modificarAPI(){
        try {
            $empleado = new Empleado($_POST);
            $resultado = $empleado->actualizar();

            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Registro modificado correctamente',
                    'codigo' => 1
                ]);
            }else{
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
            // echo json_encode($resultado);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }



    public static function eliminarAPI(){
           
        try {
            $empleado_id = $_POST['empleado_id'];
            $empleado = Empleado::find($empleado_id);

            $empleado->empleado_situacion = 0;
            $resultado = $empleado->actualizar();
    
            if ($resultado['resultado'] == 1 ){
                echo json_encode([
                    'mensaje' => 'Eliminado correctamente',
                    'codigo' => 1
                ]);
    
            }else{
                echo json_encode([
                    'mensaje' => 'Ocurrió un error al eliminar el registro',
                    'codigo' => 0
                ]);
            }
            
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    
}
}
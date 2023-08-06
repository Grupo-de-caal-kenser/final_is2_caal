<?php

namespace Controllers;

use Exception;
use Model\Asignacion;
use MVC\Router;

class AsignacionController{
    public static function index(Router $router){
        $asignaciones = Asignacion::all();
        $empleados = static::empleados();
        $puestos = static::puestos();
        $areas = static::areas();
        // $asignaciones2 = Producto::all();
        // var_dump($asignaciones);
        // exit;
        $router->render('asignaciones/index', [
           'asignaciones' => $asignaciones,
           'empleados' => $empleados,
           'puestos' => $puestos,
           'areas' => $areas,
            // 'empleados2' => $empleados2,
        ]);

    }

    public static function guardarAPI(){
        try {
            $asignacion = new Asignacion($_POST);
            $resultado = $asignacion->crear();

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
        $empleado_id = $_GET['empleado_id'];
        $puesto_id = $_GET['puesto_id'];

        $sql = "SELECT * FROM asignaciones where asignacion_situacion = 1 ";
        if($empleado_id != '') {
            $sql.= " and empleado_id like '%$empleado_id%' ";
        }
        if($puesto_id != '') {
            $sql.= " and puesto_id = $puesto_id ";
        }
        try {
            
            $asignaciones = Asignacion::fetchArray($sql);
            header('Content-Type:application/json');
    
            echo json_encode($asignaciones);
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
            $asignacion = new Asignacion($_POST);
            $resultado = $asignacion->actualizar();

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
            $asignacion_id = $_POST['asignacion_id'];
            $asignacion = Asignacion::find($asignacion_id);

            $asignacion->asignacion_situacion = 0;
            $resultado = $asignacion->actualizar();
    
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
public  static function empleados()
{
    
    
    $sql = "SELECT * FROM empleados where empleado_situacion = 1  ";
    
    
    
    try {
        
        $empleados = Asignacion::fetchArray($sql);

        if ($empleados){
            
            return $empleados; 
        }else {
            return 0;
        }
    } catch (Exception $e) {
        
    }
}

public  static function puestos()
{
    
    
    $sql = "SELECT * FROM puestos where puesto_situacion = 1 ";
    
    
    
    try {
        
        $puestos = Asignacion::fetchArray($sql);

        if ($puestos){
            
            return $puestos; 
        }else {
            return 0;
        }
    } catch (Exception $e) {
        
    }
}



public  static function areas()
{
    
    
    $sql = "SELECT * FROM areas where area_situacion = 1  ";
    
    
    
    try {
        
        $areas = Asignacion::fetchArray($sql);

        if ($areas){
            
            return $areas; 
        }else {
            return 0;
        }
    } catch (Exception $e) {
        
    }
}
}
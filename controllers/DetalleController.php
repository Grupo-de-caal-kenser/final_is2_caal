<?php
// DetalleController.php

namespace Controllers;

use Exception;
use Model\Empleado;
use Model\Area;
use Model\Asignacion;
use Model\Puesto;
use MVC\Router;

class DetalleController
{
    public static function index(Router $router)
    {
        $empleadosAreas = static::getEmpleadosAreas();
        var_dump($empleadosAreas);
        $router->render('detalle/index', [
            'empleadosAreas' => $empleadosAreas
        ]);
    }

    public static function getEmpleadosAreas()
    {
        $sql = "
            SELECT
                emp.empleado_id,
                emp.empleado_nombre,
                emp.empleado_dpi,
                emp.empleado_edad,
                emp.empleado_sexo,
                pu.puesto_descripcion,
                pu.puesto_sueldo,
                are.area_nombre
            FROM
                empleados emp
                JOIN asignaciones as ON emp.empleado_id = as.empleado_id
                JOIN puestos pu ON as.puesto_id = pu.puesto_id
                JOIN areas are ON as.area_id = are.area_id
            WHERE
                emp.empleado_situacion = 1
                AND as.asignacion_situacion = 1
                AND pu.puesto_situacion = 1
                AND are.area_situacion = 1;
        ";

        try {
            // Ejecutar
            $empleadosAreas = Empleado::fetchArray($sql);

            // resultados por áreas
            $empleadosAreasDetalles = [];
            foreach ($empleadosAreas as $empleadoPorArea) {
                $nombreArea = $empleadoPorArea['area_nombre'];
                if (!isset($empleadosAreasDetalles[$nombreArea])) {
                    $empleadosAreasDetalles[$nombreArea] = [];
                }
                $empleadosAreasDetalles[$nombreArea][] = $empleadoPorArea;
            }

            return $empleadosAreasDetalles;
        } catch (Exception $e) {

            return []; 
        }
    }
}
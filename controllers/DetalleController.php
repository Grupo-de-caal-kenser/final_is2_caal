<?php
// OrganizacionController.php

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
        $empleadosPorAreas = static::getEmpleadosPorAreas();
        ($empleadosPorAreas);
        $router->render('detalle/index', [
            'empleadosPorAreas' => $empleadosPorAreas
        ]);
    }

    public static function getEmpleadosPorAreas()
    {
        $sql = "
        SELECT
            a.area_nombre,
            e.empleado_nombre,
            e.empleado_dpi,
            e.empleado_edad,
            e.empleado_sexo,
            p.puesto_descripcion,
            p.puesto_sueldo
        FROM
            areas a
            LEFT JOIN asignaciones asi ON a.area_id = asi.area_id
            LEFT JOIN empleados e ON asi.empleado_id = e.empleado_id
            LEFT JOIN puestos p ON asi.puesto_id = p.puesto_id
        WHERE
            a.area_situacion = 1
            AND (e.empleado_situacion = 1 OR e.empleado_situacion IS NULL)
            AND (asi.asignacion_situacion = 1 OR asi.asignacion_situacion IS NULL)
            AND (p.puesto_situacion = 1 OR p.puesto_situacion IS NULL);
    ";

        try {
            // Ejecutar el query y obtener los resultados
            $empleadosPorAreas = Empleado::fetchArray($sql);

            // Organizar los resultados por áreas
            $empleadosPorAreasOrganizados = [];
            foreach ($empleadosPorAreas as $empleadoPorArea) {
                $areaNombre = $empleadoPorArea['area_nombre'];
                if (!isset($empleadosPorAreasOrganizados[$areaNombre])) {
                    $empleadosPorAreasOrganizados[$areaNombre] = [];
                }
                $empleadosPorAreasOrganizados[$areaNombre][] = $empleadoPorArea;
            }

            return $empleadosPorAreasOrganizados;
        } catch (Exception $e) {
            // Manejar el error si es necesario
            return []; // Si hay un error, retornar un array vacío
        }
    }
}
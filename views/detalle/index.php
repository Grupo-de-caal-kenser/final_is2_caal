<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-image: url('/final_is2_caal/public/images/ejercito.jpg') !important;
            background-size:cover; 

        }

        .custom-bordered-table {
        border: 4px solid black;
        box-shadow: -1px 2px 4px 4px blue;
        }

        .custom-bordered-table tr {
            border: 2px solid black;
        }

        .custom-bordered-table th {
            border: 2px solid;
        }

        h1 {
        color: black;
        text-shadow: 2px 2px 20px gold;
        }
        h2 {
        border: 1px solid black;
        background-color: #FF3205 ;
        text-shadow: -1px 2px 4px 4px white;
        }

    </style>
</head>
<body>
    <center>
        <div class="row">
            <div class="col-lg-12">
                <a href="/final_is2_caal/" class="btn btn-info">Regresar al formulario</a>
            </div>
        </div>
    </center>
    <h1 class="text-center">Áreas donde están asignados los Empleados</h1>

<div class="row justify-content-center">
<div class="row justify-content-center">
    <div class="col-lg-10">
        <?php foreach ($empleadosPorAreas as $area => $empleados) : ?>
            <center><h2>Area "<?= $area ?> "</h2></center>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>DPI</th>
                        <th>Puesto</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Sueldo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($empleados)) : ?>
                        <tr>
                            <td colspan="7" class="text-center">Sin registro</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($empleados as $indice => $empleado) : ?>
                            <tr>
                                <?php if (empty($empleado['empleado_nombre']) && empty($empleado['empleado_dpi']) && empty($empleado['puesto_descripcion']) && empty($empleado['empleado_edad']) && empty($empleado['empleado_sexo']) && empty($empleado['puesto_sueldo'])) : ?>
                                    <td colspan="7" class="text-center"><h4>Sin registro<h4></td>
                                <?php else : ?>
                                    <td><?= $indice + 1 ?></td>
                                    <td><?= empty($empleado['empleado_nombre']) ? 'Sin registro' : $empleado['empleado_nombre'] ?></td>
                                    <td><?= empty($empleado['empleado_dpi']) ? 'Sin registro' : $empleado['empleado_dpi'] ?></td>
                                    <td><?= empty($empleado['puesto_descripcion']) ? 'Sin registro' : $empleado['puesto_descripcion'] ?></td>
                                    <td><?= empty($empleado['empleado_edad']) ? 'Sin registro' : $empleado['empleado_edad'] ?></td>
                                    <td><?= empty($empleado['empleado_sexo']) ? 'Sin registro' : $empleado['empleado_sexo'] ?></td>
                                    <td><?= empty($empleado['puesto_sueldo']) ? 'Sin registro' : $empleado['puesto_sueldo'] ?></td>
                                <?php endif ?>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table><br>
        <?php endforeach ?>
    </div>
</div>
    <script src="<?= asset('./build/js/detalles/index.js')  ?>"></script>
</body>
</html>
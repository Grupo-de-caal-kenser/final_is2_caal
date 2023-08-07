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
        background-color: white;
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
    </div></center>
<h1 class="text-center"> Áreas donde estan asignados los empleados</h1>

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
                    <?php foreach ($empleados as $indice => $empleado) : ?>
                        <tr>
                            <td><?= $indice + 1 ?></td>
                            <td><?= $empleado['empleado_nombre'] ?></td>
                            <td><?= $empleado['empleado_dpi'] ?></td>
                            <td><?= $empleado['puesto_descripcion'] ?></td>
                            <td><?= $empleado['empleado_edad'] ?></td>
                            <td><?= $empleado['empleado_sexo'] ?></td>
                            <td><?= $empleado['puesto_sueldo'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endforeach ?>
    </div>

</div>
</body>
</html>
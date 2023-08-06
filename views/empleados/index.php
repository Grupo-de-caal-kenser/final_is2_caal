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

    </style>
</head>
<body>
    

<h1 class="text-center">Formulario de empleados</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formularioEmpleado">
        <input type="hidden" name="empleado_id" id="empleado_id">
        <div class="row mb-3">
                <div class="col">
                    <label for="empleado_nombre">Nombre del empleado</label>
                    <input type="text" name="empleado_nombre" id="empleado_nombre" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="empleado_dpi">DPI</label>
                    <input type="number" name="empleado_dpi" id="empleado_dpi" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="empleado_id_puesto">Puesto</label>
                    <select name="empleado_id_puesto" id="empleado_id_puesto" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($puestos as $key => $puesto) : ?>
                            <option value="<?= $puesto['puesto_id'] ?>"><?= $puesto['puesto_descripcion'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col">
                    <label for="empleado_edad">Edad</label>
                    <input type="number" name="empleado_edad" id="empleado_edad" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="empleado_sexo">Género del empleado</label>
                    <select name="empleado_sexo" id="empleado_sexo" class="form-control">
                        <option value="Seleccionar">Seleccionar</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="empleado_id_area">Area</label>
                    <select name="empleado_id_area" id="empleado_id_area" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($areas as $key => $area) : ?>
                            <option value="<?= $area['area_id'] ?>"><?= $area['area_nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" form="formularioEmpleado" id="btnGuardar" data-saludo= "hola" data-saludo2="hola2" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
            </div>
        </div>
    </form>
</div>
<div class="row justify-content-center" id="divTabla">
    <div class="col-lg-8">
        <h2>Listado de Empleados</h2>
        <table class="table table-bordered table-hover" id="tablaEmpleados">
            <thead class="table-dark">
                <tr>
                    <th>NO. </th>
                    <th>NOMBRE</th>
                    <th>DPI</th>
                    <th>PUESTO</th>
                    <th>EDAD</th>
                    <th>GENERO</th>
                    <th>AREA</th>
                    <th>MODIFICAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/empleados/index.js')  ?>"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
        body{
            background-image: url('/final_is2_caal/public/images/ejercito2.jpg') !important;
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
        border: 4px solid black;
        background-color: white;
        text-shadow: -1px 2px 4px 4px white;
        }
        h2 {
        border: 2px solid black;
        background-color: white;
        text-shadow: -1px 2px 4px 4px white;
        }

    </style>
</head>
<body>

<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formularioPuesto">
        <h2 class="text-center">Formulario de puestos</h2>
        <input type="hidden" name="puesto_id" id="puesto_id">
        <div class="row mb-3">
                <div class="col">
                    <label for="puesto_descripcio">Nombre del puesto</label>
                    <input type="text" name="puesto_descripcion" id="puesto_descripcion" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="puesto_sueldo">SUELDO</label>
                    <input type="number" name="puesto_sueldo" id="puesto_sueldo" class="form-control">
                </div>
            </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" form="formularioPuesto" id="btnGuardar" data-saludo= "hola" data-saludo2="hola2" class="btn btn-primary w-100">Guardar</button>
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
        <center><h2>Listado de puestos</h2></center>
        <table class="table table-bordered table-hover" id="tablaPuestos">
            <thead class="table-dark">
                <tr>
                    <th>NO. </th>
                    <th>NOMBRE</th>
                    <th>SUELDO</th>
                    <th>MODIFICAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/puestos/index.js')  ?>"></script>
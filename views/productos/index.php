<h1 class="text-center">Formulario de productos</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formularioProducto">
        <input type="hidden" name="producto_id" id="producto_id">
        <div class="row mb-3">
                <div class="col">
                    <label for="emp_nombre">Nombre del empleado</label>
                    <input type="text" name="emp_nombre" id="emp_nombre" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="emp_dpi">DPI</label>
                    <input type="number" name="emp_dpi" id="emp_dpi" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="emp_id_puesto">Puesto</label>
                    <select name="emp_id_puesto" id="emp_id_puesto" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($puestos as $key => $puesto) : ?>
                            <option value="<?= $puesto['PUE_ID'] ?>"><?= $puesto['PUE_DESCRIPCION'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col">
                    <label for="emp_edad">Edad</label>
                    <input type="number" name="emp_edad" id="emp_edad" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="emp_sexo">Género del Empleado</label>
                    <select name="emp_sexo" id="emp_sexo" class="form-control">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="emp_id_area">Area</label>
                    <select name="emp_id_area" id="emp_id_area" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($areas as $key => $area) : ?>
                            <option value="<?= $area['AREA_ID'] ?>"><?= $area['AREA_NOMBRE'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" form="formularioProducto" id="btnGuardar" data-saludo= "hola" data-saludo2="hola2" class="btn btn-primary w-100">Guardar</button>
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
        <h2>Listado de productos</h2>
        <table class="table table-bordered table-hover" id="tablaProductos">
            <thead class="table-dark">
                <tr>
                    <th>NO. </th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>MODIFICAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/productos/index.js')  ?>"></script>
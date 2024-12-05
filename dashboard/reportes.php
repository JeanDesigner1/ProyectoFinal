<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    


    <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Consulta para obtener los datos
$consulta = "SELECT id, idreporte, idusuario, fecha_reporte, descripcion FROM reportes";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);


?>


<div class="container">
    <h1>Gestión de Reportes</h1>
    <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>

    <table id="tablaReportes" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Reporte</th>
                <th>ID Usuario</th>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="formReportes">
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Usuario:</label>
                        <input type="number" id="idusuario" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Descripción:</label>
                        <textarea id="descripcion" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php require_once "vistas/parte_inferior3.php"?>
<?php require_once "vistas/parte_superiorUSUARIOS.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Página de proveedores</h1>


    <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, idpv, nombre, correo, direccion FROM proveedores";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


    
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaProveedores" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Id Proveedor</th>
                                <th>Nombre</th>
                                <th>Correo</th>                                
                                <th>Direccion</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['idpv'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['correo'] ?></td>
                                <td><?php echo $dat['direccion'] ?></td> 
                                   
                                <td>No Disponible</td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formProveedores">    
            <div class="modal-body">
                
                <div class="form-group">
                <label for="idpv" class="col-form-label">Id Proveedor:</label>
                <input type="number" class="form-control" id="idpv">
                </div>
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre">
                </div> 
                <div class="form-group">
                <label for="correo" class="col-form-label">Contacto:</label>
                <input type="text" class="form-control" id="correo">
                </div>
                <div class="form-group">
                <label for="direccion" class="col-form-label">Direccion:</label>
                <input type="text" class="form-control" id="direccion">
                </div>
                
                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior1USUARIOS.php"?>
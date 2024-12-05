<?php require_once "vistas/parte_superiorUSUARIOS.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Contenido principal</h1>
    
    
    
 <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, idproducto, idproveedor,nombre, descripcion, stock, price, categoria, lote FROM productos";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

$consulta = "SELECT id, idproducto, idproveedor, nombre, descripcion, stock, price, categoria, lote,
             CASE
                 WHEN stock <= 10 THEN 'Alerta Stock Bajo'
                 ELSE ''
             END AS alerta
             FROM productos";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);


?>



<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaProductos" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Id Producto</th>
                                <th>Id Proveedor</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Stock</th>                                
                                <th>Precio</th>  
                                <th>Categoria</th>
                                <th>Lote</th>
                                <th>Alerta</th>

                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                
                                <td><?php echo $dat['idproducto'] ?></td>
                                <td><?php echo $dat['idproveedor'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['descripcion'] ?></td>
                                <td><?php echo $dat['stock'] ?></td>
                                <td><?php echo $dat['price'] ?></td>   
                                <td><?php echo $dat['categoria'] ?></td> 
                                <td><?php echo $dat['lote'] ?></td>  
                                <td><?php echo $dat['alerta'] ?></td>

                                <td>No disponible</td>
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
        <form id="formProductos">    
            <div class="modal-body">
                <div class="form-group">
                <label for="idproducto" class="col-form-label">Id Producto:</label>
                <input type="number" class="form-control" id="idproducto">
                </div>
                <div class="form-group">
                <label for="idproveedor" class="col-form-label">Id Proveedor:</label>
                <input type="number" class="form-control" id="idproveedor">
                </div>
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                <label for="descripcion" class="col-form-label">Descripcion:</label>
                <input type="text" class="form-control" id="descripcion">
                </div>
                <div class="form-group">
                <label for="stock" class="col-form-label">Stock:</label>
                <input type="number" class="form-control" id="stock">
                </div>                
                <div class="form-group">
                <label for="price" class="col-form-label">Precio   :</label>
                <input type="number" class="form-control" id="price">
                </div>
                <div class="form-group">
                <label for="categoria" class="col-form-label">Categoria:</label>
                <input type="text" class="form-control" id="categoria">
                </div>
                <div class="form-group">
                <label for="lote" class="col-form-label">Lote:</label>
                <input type="text" class="form-control" id="lote">
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

 <!-- Modal para Devoluciones -->
<div class="modal fade" id="modalDevolucion" tabindex="-1" role="dialog" aria-labelledby="modalDevolucionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDevolucionLabel">Procesar Devolución</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="formDevolucion">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cantidadDevolucion" class="col-form-label">Cantidad a devolver:</label>
                        <input type="number" class="form-control" id="cantidadDevolucion" min="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Generar Devolución</button>
                </div>
            </form>
        </div>
    </div>
</div>


</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>
<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$idproducto = (isset($_POST['idproducto'])) ? $_POST['idproducto'] : '';
$idproveedor = (isset($_POST['idproveedor'])) ? $_POST['idproveedor'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$stock = (isset($_POST['stock'])) ? $_POST['stock'] : '';
$price = (isset($_POST['price'])) ? $_POST['price'] : '';
$categoria = (isset($_POST['categoria'])) ? $_POST['categoria'] : '';
$lote = (isset($_POST['lote'])) ? $_POST['lote'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

$nuevoStock = (isset($_POST['nuevoStock'])) ? $_POST['nuevoStock'] : 0;

switch($opcion){
    case 1: // Alta
        $consulta = "INSERT INTO productos (idproducto, idproveedor,nombre, descripcion, stock, price, categoria, lote) 
                     VALUES ('$idproducto', '$idproveedor','$nombre', '$descripcion', '$stock', '$price', '$categoria', '$lote')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT id, idproducto, idproveedor,nombre, descripcion, stock, price, categoria, lote 
                     FROM productos 
                     ORDER BY id DESC 
                     LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
        
    case 2: // Modificación
        $consulta = "UPDATE productos 
                     SET idproducto = '$idproducto', idproveedor='$idproveedor',nombre = '$nombre', descripcion = '$descripcion', 
                         stock = '$stock', price = '$price', categoria = '$categoria', lote = '$lote' 
                     WHERE id = '$id'";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        
        $consulta = "SELECT id, idproducto, idproveedor,nombre, descripcion, stock, price, categoria, lote 
                     FROM productos 
                     WHERE id = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
        
    case 3: // Baja
        $consulta = "DELETE FROM productos WHERE id = '$id'";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = ["Mensaje" => "Registro eliminado exitosamente"];
        break;
    case 4: // Devolución
        
        
        $consulta = "UPDATE productos SET stock = '$nuevoStock' WHERE id = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $data = ["success" => true];
        break;
        
}



print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
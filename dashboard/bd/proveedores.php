<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$idpv = (isset($_POST['idpv'])) ? $_POST['idpv'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';


switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO proveedores ( idpv, nombre, correo, direccion) VALUES('$idpv','$nombre', '$correo', '$direccion') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT id, idpv , nombre, correo, direccion FROM proveedores ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE proveedores SET  idpv='$idpv', nombre='$nombre', correo='$correo', direccion='$direccion' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, idpv , nombre, correo, direccion FROM proveedores WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM proveedores WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);                          
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
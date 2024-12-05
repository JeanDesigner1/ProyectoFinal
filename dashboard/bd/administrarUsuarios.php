<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$contrasena = (isset($_POST['contrasena'])) ? $_POST['contrasena'] : '';
$rol = (isset($_POST['rol'])) ? $_POST['rol'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

// Encriptar la contraseña para almacenamiento seguro
$hashed_contrasena = !empty($contrasena) ? md5($contrasena) : null;

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO usuarios ( id, usuario, contrasena, rol) VALUES('$id','$usuario', '$hashed_contrasena', '$rol') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT id, usuario , contrasena, rol  FROM usuarios ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
    if (!empty($contrasena)) {
        // Si se proporciona una nueva contraseña, la encripto
        $hashed_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $consulta = "UPDATE usuarios SET usuario='$usuario', contrasena='$hashed_contrasena', rol='$rol' WHERE id='$id'";
    } else {
        // Si no se modifica la contraseña, no la incluyo en el UPDATE
        $consulta = "UPDATE usuarios SET usuario='$usuario', rol='$rol' WHERE id='$id'";
    }
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();

    // Obtener los datos actualizados para devolverlos
    $consulta = "SELECT id, usuario, rol FROM usuarios WHERE id='$id'"; // Excluye la contraseña aquí
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
       
    case 3://baja
        $consulta = "DELETE FROM usuarios WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);                          
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;




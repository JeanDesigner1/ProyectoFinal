<?php

session_start();

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de datos enviados mediante POST desde AJAX
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$contrasena = (isset($_POST['contrasena'])) ? $_POST['contrasena'] : '';

$pass = md5($contrasena); // Encriptar la clave enviada por el usuario

// Consulta para verificar el usuario y obtener su rol
$consulta = "SELECT id, usuario, rol FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena";
$resultado = $conexion->prepare($consulta); 
$resultado->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$resultado->bindParam(':contrasena', $pass, PDO::PARAM_STR);
$resultado->execute();

if ($resultado->rowCount() >= 1) {
    $data = $resultado->fetch(PDO::FETCH_ASSOC); // Obtén la información del usuario
    $_SESSION["s_usuario"] = $usuario;          // Establece la sesión

    // Retorna el rol junto con otros datos del usuario
    echo json_encode([
        "id" => $data['id'],
        "usuario" => $data['usuario'],
        "rol" => $data['rol']
    ]);
} else {
    $_SESSION["s_usuario"] = null; // No se encontró usuario
    echo json_encode("null");      // Enviar "null" si no se encuentra el usuario
}

$conexion = null;


//usuarios de pruebaen la base de datos
//usuario:admin pass:12345
//usuario:demo pass:demo
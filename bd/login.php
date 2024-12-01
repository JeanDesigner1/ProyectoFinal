<?php

session_start();

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$pass = md5($password); // Encriptar la clave enviada por el usuario

$consulta = "SELECT * FROM admins WHERE usuario='$usuario' AND password='$pass'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

if($resultado->rowCount() >= 1) {
    $data = $resultado->fetch(PDO::FETCH_ASSOC); // Obtén la información del usuario
    $_SESSION["s_usuario"] = $usuario;  // Establece la sesión
    echo json_encode($data); // Enviar los datos en formato JSON
} else {
    $_SESSION["s_usuario"] = null; // No se encontró usuario
    echo json_encode(null); // Enviar null si no se encuentra el usuario
}

$conexion = null;

//usuarios de pruebaen la base de datos
//usuario:admin pass:12345
//usuario:demo pass:demo
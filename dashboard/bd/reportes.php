<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$idreporte = (isset($_POST['idreporte'])) ? $_POST['idreporte'] : '';
$idusuario = (isset($_POST['idusuario'])) ? $_POST['idusuario'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opcion) {
    case 1: // Nuevo reporte
        $consulta = "INSERT INTO reportes (idreporte, idusuario, descripcion) VALUES ('$idreporte', '$idusuario', '$descripcion')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $consulta = "SELECT * FROM reportes ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 2: // Editar reporte
        $consulta = "UPDATE reportes SET idusuario='$idusuario', descripcion='$descripcion' WHERE id='$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $consulta = "SELECT * FROM reportes WHERE id='$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 3: // Borrar reporte
        $consulta = "DELETE FROM reportes WHERE id='$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = array("mensaje" => "Eliminado correctamente");
        break;

    case 4: // Obtener todos los reportes
        $consulta = "SELECT * FROM reportes";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;
?>


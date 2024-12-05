<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$idProducto = isset($_POST['idProducto']) ? $_POST['idProducto'] : '';
$cantidadDevolucion = isset($_POST['cantidadDevolucion']) ? intval($_POST['cantidadDevolucion']) : 0;

// Verificar que el producto existe y tiene suficiente stock
$consulta = "SELECT stock FROM productos WHERE idproducto = ?";
$resultado = $conexion->prepare($consulta);
$resultado->execute([$idProducto]);
$producto = $resultado->fetch(PDO::FETCH_ASSOC);

if ($producto) {
    $stockActual = $producto['stock'];

    if ($cantidadDevolucion > $stockActual) {
        echo json_encode(["status" => "error", "message" => "Cantidad a devolver supera el stock actual."]);
    } else {
        // Restar la cantidad del stock
        $nuevoStock = $stockActual - $cantidadDevolucion;
        $consulta = "UPDATE productos SET stock = ? WHERE idproducto = ?";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute([$nuevoStock, $idProducto]);

        echo json_encode(["status" => "success", "nuevoStock" => $nuevoStock]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Producto no encontrado."]);
}

$conexion = null;
?>

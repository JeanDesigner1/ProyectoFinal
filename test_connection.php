<?php
try {
    // Intentar la conexión a la base de datos
    $conexion = new PDO("mysql:host=localhost;dbname=proyectofinal", "root", "");
    // Configurar el modo de error
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    // Si hay un error, mostrar el mensaje de error
    echo "Error de conexión: " . $e->getMessage();
}
?>

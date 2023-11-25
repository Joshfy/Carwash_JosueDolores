<?php
require "../conexion.php";

// Verificar si se recibió un ID válido a través de la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Preparar la consulta SQL para eliminar el registro
    $sql = "DELETE FROM Customer WHERE ID = ?";
    
    // Preparar una declaración y enlazar el parámetro
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    // Ejecutar la consulta y manejar errores
    if ($stmt->execute()) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    echo "ID no válido.";
}

// Cerrar conexión
$conexion->close();
?>

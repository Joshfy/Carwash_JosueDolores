<?php
// GuardarPI.php

require '../conexion.php';

// Verificar si se enviaron datos mediante el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recoger datos del formulario
    $inventoryID = $_POST["inventoryID"];
    $supplierID = $_POST["supplierID"];

    // Insertar datos en la tabla "inventorysuppliers"
    $sql = "INSERT INTO inventorysuppliers (InventoryID, SupplierID)
            VALUES ('$inventoryID', '$supplierID')";

    if ($conexion->query($sql) === TRUE) {
        echo "Datos guardados exitosamente en la tabla inventorysuppliers.";
    } else {
        echo "Error al guardar los datos: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "Error: No se recibieron datos mediante el formulario.";
}
?>

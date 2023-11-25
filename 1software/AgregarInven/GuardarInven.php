<?php
require '../conexion.php';

// Verificar si se enviaron datos mediante el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recoger datos del formulario
    $idProduct = $_POST["IDproduct"];
    $quantity = $_POST["Quantity"];
    $costs = $_POST["Costs"];
    $idProductReference = $_POST["IDproducts"];

    // Insertar datos en la tabla "inventory"
    $sql = "INSERT INTO inventory (IDproduct, Quantity, Costs, IDproducts)
            VALUES ('$idProduct', '$quantity', '$costs', '$idProductReference')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: DashInven.php");
    } else {
        echo "Error al guardar los datos de inventario: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
}
?>

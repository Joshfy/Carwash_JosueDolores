<?php

require '../conexion.php';

// Verificar si se enviaron datos mediante el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Recoger datos del formulario
        $idProducts = $_POST["IDproducts"];
        $name = $_POST["Name"];
        $descripcion = $_POST["Description"];
        $price = $_POST["Price"];


    // Insertar datos en la base de datos
    $sql = "INSERT INTO store (IDproducts, Name, Description, Price)
            VALUES ('$idProducts', '$name', '$descripcion', '$price')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: DashAlma.php");
    } else {
        echo "Error al guardar el producto: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
}
?>

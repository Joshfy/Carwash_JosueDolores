<?php
require "../conexion.php";

// Verificar si se reciben datos por el método POST

// Procesar datos del formulario
// Procesar datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $middle_name = $_POST["middle_name"];
    $address = $_POST["address"];

    // Verificar si el ID ya existe en la base de datos
    $id_check_query = "SELECT * FROM Customer WHERE ID='$id'";
    $id_check_result = $conexion->query($id_check_query);

    if ($id_check_result->num_rows > 0) {
        echo "Error: El ID ya existe en la base de datos. Por favor, elija otro ID.";
    } else {
        // Insertar datos en la tabla
        $sql = "INSERT INTO Customer (ID, first_name, last_name, middle_name, address) VALUES ('$id', '$first_name', '$last_name', '$middle_name', '$address')";

        if ($conexion->query($sql) === TRUE) {
            echo "Datos almacenados correctamente.";
        } else {
            echo "Error al almacenar datos: " . $conexion->error;
        }
    }
}

// Cerrar conexión
$conexion->close();
?>

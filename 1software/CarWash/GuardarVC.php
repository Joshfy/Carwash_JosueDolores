<?php
require "../conexion.php";

// Verificar si se reciben datos por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $customer_id = $_POST["customer_id"];
    $carwash_id = $_POST["carwash_id"];
    $cost = $_POST["cost"];

    // Verificar si el ID CarWash ya existe en la base de datos
    $check_query = "SELECT COUNT(*) as count FROM CarWashService WHERE ID = $carwash_id";
    $check_result = $conexion->query($check_query);
    $check_data = $check_result->fetch_assoc();

    if ($check_data["count"] > 0) {
        echo "Error: El ID CarWash '$carwash_id' ya existe en la base de datos.";
        exit();
    }

    // Insertar datos en la tabla
    $sql = "INSERT INTO CarWashService (ID, customer_id, cost) VALUES ('$carwash_id', '$customer_id', '$cost')";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir a Pagos.php con el parámetro carwash_id
        header("Location: ../Pagos/Pagos.php?carwash_id=" . $carwash_id);
        exit();
    } else {
        echo "Error al almacenar datos: " . $conexion->error;
    }
}

// Cerrar conexión
$conexion->close();
?>

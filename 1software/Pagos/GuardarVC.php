<?php
require "../conexion.php";

// Verificar si se reciben datos por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $carwash_id = isset($_POST['carwash_id']) ? $_POST['carwash_id'] : null;
    $delivery_id = isset($_POST['delivery_id']) ? $_POST['delivery_id'] : null;
    $payment_id = isset($_POST['payment_id']) ? $_POST['payment_id'] : null; // Nueva línea para recuperar el ID del pago
    $amount_paid = $_POST["amount_paid"];
    $date = $_POST["date"];
    $payment_type = $_POST["payment_type"];
    $service_type = $_POST["service_type"];

    // Inicializar la variable de servicio y su ID
    $service_id = null;

    // Verificar si es CarWash o Delivery
    if ($carwash_id) {
        // Lógica para guardar datos relacionados con CarWash
        $service_id = $carwash_id;
    } elseif ($delivery_id) {
        // Lógica para guardar datos relacionados con Delivery
        $service_id = $delivery_id;
    }

    // Verificar si se tiene un ID de servicio válido
    if ($service_id !== null) {
        // Lógica para insertar datos en la tabla Payments
        $sql = "INSERT INTO Payments (ID, amount_paid, date, payment_type, service_type, service_id) 
                VALUES ('$payment_id', '$amount_paid', '$date', '$payment_type', '$service_type', '$service_id')";

        // Ejecutar la consulta y manejar errores
        if ($conexion->query($sql) === TRUE) {
            echo "Datos almacenados correctamente.";
        } else {
            echo "Error al almacenar datos: " . $conexion->error;
        }
    } else {
        echo "Error: ID de servicio no válido.";
    }
} else {
    // Si el formulario no se envió por el método POST, puedes redirigir o mostrar un mensaje de error
    echo "Error: El formulario no se envió correctamente.";
}

// Cerrar conexión
$conexion->close();
?>

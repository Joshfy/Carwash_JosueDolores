<?php
require "../conexion.php";

// Verificar si se reciben datos por el método POST

// Procesar datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $customer_id = $_POST["customer_id"];
    $customer_address = $_POST["customer_address"];
    $product_id = $_POST["product_id"];
    $total_price = $_POST["total_price"];
    $date = $_POST["date"];

    // Verificar si el cliente y el producto existen antes de insertar
    $customer_check = "SELECT * FROM Customer WHERE ID = $customer_id";
    $product_check = "SELECT * FROM store WHERE IDproducts = $product_id";

    $customer_result = $conexion->query($customer_check);
    $product_result = $conexion->query($product_check);

    if ($customer_result->num_rows > 0 && $product_result->num_rows > 0) {
        // Cliente y producto existen, continuar con la inserción
        $sql = "INSERT INTO Delivery (ID, customer_id, customer_address, product_id, total_price, date) VALUES ('$id', '$customer_id', '$customer_address', '$product_id', '$total_price', '$date')";

        if ($conexion->query($sql) === TRUE) {
            echo "Almacenamiento correcto";

            // Redirigir a Pagos.php con el parámetro $id
            header("Location: ../Pagos/Pagos.php?id=$id");
            exit();
        } else {
            echo "Error al almacenar datos: " . $conexion->error;
        }
    } else {
        echo "Cliente o producto no existen. Verifica los IDs proporcionados.";
    }
}

// Cerrar conexión
$conexion->close();
?>

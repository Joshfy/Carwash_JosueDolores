<?php
require '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar la existencia de las variables
    if (isset($_POST['CarwashID'], $_POST['Name'], $_POST['Address'], $_POST['Email'], $_POST['Telephone'])) {
        // Recuperar los datos del formulario y limpiarlos
        $carwashID = filter_var($_POST['CarwashID'], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
        $address = filter_var($_POST['Address'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
        $telephone = filter_var($_POST['Telephone'], FILTER_SANITIZE_STRING);

        // Preparar la consulta SQL para insertar un nuevo registro en carWash
        $sql = "INSERT INTO carWash (CarwashID, Name, Address, Email, Telephone) VALUES (?, ?, ?, ?, ?)";

        // Preparar una declaración y enlazar los parámetros
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssss", $carwashID, $name, $address, $email, $telephone);

        // Ejecutar la consulta y manejar errores
        if ($stmt->execute()) {
            header("DashBranch.php");
        } else {
            echo "Error al guardar datos: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Faltan parámetros en la solicitud.";
    }
} else {
    echo "";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

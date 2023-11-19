<?php
require "../conexion.php";

// Verificar si se reciben datos por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $id = $_POST["id"];
    $Name = $_POST["Name"];
    $Address = $_POST["Address"];
    $Phone = $_POST["Phone"];
    $Email = $_POST["Email"];

    // Preparar la consulta SQL para insertar datos en la tabla
    $sql = "INSERT INTO   suppliers   (id, Name, Address, Phone, Email) 
            VALUES ('$ID', '$Name', '$Address', '$Phone', '$Email')";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        header("Location: DashProv.php");
    } else {
        echo "Error al guardar datos del proveedor: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>

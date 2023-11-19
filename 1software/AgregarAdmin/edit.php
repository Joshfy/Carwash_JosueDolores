<?php
require '../conexion.php';

// Verificar si se ha recibido el ID por el método GET
if (isset($_GET['id'])) {
    $idEditar = $_GET['id'];

    // Realizar la consulta para obtener los datos del administrador por ID
    $sql = "SELECT * FROM administrator WHERE ID = '$idEditar'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verificar si se ha enviado el formulario de actualización
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recoger los datos del formulario
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $middleName = $_POST["middleName"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
            $carwashID = $_POST["carwashID"];

            // Lógica de actualización en la base de datos
            $sqlActualizar = "UPDATE administrator SET 
                FirstName = '$firstName',
                LastName = '$lastName',
                MiddleName = '$middleName',
                Address = '$address',
                Phone = '$phone',
                CarwashID = '$carwashID'
                WHERE ID = '$idEditar'";

            if ($conexion->query($sqlActualizar) === TRUE) {
                echo "Datos actualizados correctamente.";
            } else {
                echo "Error al actualizar datos: " . $conexion->error;
            }
        }

        // Presentar el formulario de edición
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Administrador</title>
        </head>
        <body>

            <h2>Editar Administrador</h2>
            <form method="POST" action="">
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" value="<?php echo $row['FirstName']; ?>" required><br>

                <label for="lastName">Last Name:</label>
                <input type="text" name="lastName" value="<?php echo $row['LastName']; ?>" required><br>

                <label for="middleName">Middle Name:</label>
                <input type="text" name="middleName" value="<?php echo $row['MiddleName']; ?>"><br>

                <label for="address">Address:</label>
                <input type="text" name="address" value="<?php echo $row['Address']; ?>" required><br>

                <label for="phone">Telephone:</label>
                <input type="text" name="phone" value="<?php echo $row['Phone']; ?>"><br>

                <label for="carwashID">Carwash ID:</label>
                <input type="text" name="carwashID" value="<?php echo $row['CarwashID']; ?>" required><br>

                <button type="submit">Actualizar</button>
            </form>

        </body>
        </html>
        <?php
    } else {
        echo "No se encontró el administrador con el ID proporcionado.";
    }
} else {
    echo "ID no proporcionado.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

    <?php
    require "../conexion.php";
    // Verificar si se reciben datos por el método POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Recoger los datos del formulario
        $ID = $_POST["ID"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $middleName = $_POST["middleName"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $carwashID = $_POST["carwashID"];

        // Aquí puedes realizar la lógica para guardar los datos en la base de datos o hacer cualquier otra acción necesaria

        

        // Preparar la consulta SQL para insertar datos en la tabla
        $sql = "INSERT INTO administrator (ID, firstName, lastName, middleName, address, phone, carwashID)
        VALUES ('$ID', '$firstName', '$lastName', '$middleName', '$address', '$phone', '$carwashID')";

        echo"$";
        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "Datos guardados correctamente.";
            header("Location: DashAdmin.php");
        } else {
            echo "Error al guardar datos: " . $conexion->error;
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
    }
    ?>

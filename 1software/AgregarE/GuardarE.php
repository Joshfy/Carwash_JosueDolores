<?php
require "../conexion.php";

// Verificar si se reciben datos por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $employeeID = $_POST["employeeID"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $middleName = $_POST["middleName"];
    $salary = $_POST["salary"];
    $shift = $_POST["shift"];
    $position = $_POST["position"];

    // Preparar la consulta SQL para insertar datos en la tabla
    $sql = "INSERT INTO Employees (EmployeeID, FirstName, LastName, MiddleName, Salary, Shift, Position)
            VALUES ('$employeeID', '$firstName', '$lastName', '$middleName', '$salary', '$shift', '$position')";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        header("Location: DashE.php");
    } else {
        echo "Error al guardar datos: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>

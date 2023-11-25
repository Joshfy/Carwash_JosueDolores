<?php
// guardar_carwash_empleado.php

require '../conexion.php';

// Verificar si se enviaron datos mediante el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recoger datos del formulario
// Recoger datos del formulario
$carwashID = $_POST["carwashID"];
$employeeID = $_POST["employeeID"];

echo "EmployeeID: " . $employeeID;  // Añade esta línea para verificar el valor de employeeID

// Verificar si el EmployeeID existe en la tabla employees
$verificarExistencia = "SELECT * FROM employees WHERE EmployeeID = '$employeeID'";
// Resto del código...


    // Verificar si el EmployeeID existe en la tabla employees
    $verificarExistencia = "SELECT * FROM employees WHERE EmployeeID = '$employeeID'";
    $resultExistencia = $conexion->query($verificarExistencia);

    if ($resultExistencia) {
        // Comprobar si se encontró algún resultado
        if ($resultExistencia->num_rows > 0) {
            // Insertar datos en la tabla "carwash_has_employees"
            $sql = "INSERT INTO carwash_has_employees (CarwashID, EmployeeID)
                    VALUES ('$carwashID', '$employeeID')";

            if ($conexion->query($sql) === TRUE) {
                header("Location: CarEmploye.php");
            } else {
                echo "Error al guardar los datos: " . $conexion->error;
            }
        } else {
            echo "Error: El EmployeeID no existe en la tabla employees.";
        }
    } else {
        echo "Error en la consulta: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "Error: No se recibieron datos mediante el formulario.";
}
?>

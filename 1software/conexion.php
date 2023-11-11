<?php
// Datos de conexión a la base de datos
$host = "localhost"; // Dirección del servidor de la base de datos
$usuario = "root"; // Nombre de usuario de la base de datos
$contrasena = ""; // Contraseña de la base de datos
$base_de_datos = "Car_cleaning"; // Nombre de la base de datos

// Intentar establecer la conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);
// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}else{
    echo"conexion correcto";

}

// Establecer la codificación de caracteres a UTF-8 (opcional, pero recomendado)

// Si deseas, puedes agregar más configuraciones y funciones de manejo de errores aquí.

?>

<?php
require '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar la existencia de las variables
    if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['token'])) {
        // Recuperar los datos del formulario y limpiarlos
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $token = filter_var($_POST['token'], FILTER_SANITIZE_STRING);

        // Verificar si el token existe en la tabla tokens
        $tokenExists = false;
        $checkTokenQuery = "SELECT COUNT(*) FROM tokens WHERE token = ?";
        $checkTokenStmt = $conexion->prepare($checkTokenQuery);
        $checkTokenStmt->bind_param("s", $token);
        $checkTokenStmt->execute();
        $checkTokenStmt->bind_result($tokenCount);
        $checkTokenStmt->fetch();
        $checkTokenStmt->close();

        if ($tokenCount > 0) {
            $tokenExists = true;
        }

        // Insertar el usuario solo si el token existe
        if ($tokenExists) {
            // Preparar la consulta SQL para insertar un nuevo usuario
            $sql = "INSERT INTO Users (name, email, password, token) VALUES (?, ?, ?, ?)";

            // Preparar una declaración y enlazar los parámetros
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ssss", $name, $email, $password, $token);

            // Ejecutar la consulta y manejar errores
            if ($stmt->execute()) {
                echo "Usuario registrado con éxito.";
            } else {
                echo "Error al registrar el usuario: " . $stmt->error;
            }

            // Cerrar la declaración y la conexión a la base de datos
            $stmt->close();
        } else {
            echo "No puedes registrarte porque no tienes un token autenticado.";
        }

        $conexion->close();
    } else {
        echo "Faltan parámetros en la solicitud.";
    }
} else {
    echo "";
}
?>

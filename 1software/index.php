<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylet.css">
    <title>Iniciar Sesión</title>
</head>
<body>

<?php
include './conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar los datos del formulario
    $email = filter_var($_POST['email'], );
    $password = $_POST['password'];

    // Verificar las credenciales en la base de datos
    $sql = "SELECT * FROM Users WHERE email = ? AND password = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    // Si se encuentra un usuario con las credenciales proporcionadas, redirigir a Dashboard.php
    if ($result->num_rows > 0) {
        header("Location: Dashboard.php");
        exit();
    } else {
        echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }
}

$conexion->close();
?>

<form class="login" method="POST" action="">
  <input type="text" name="email" placeholder="Email">
  <input type="password" name="password" placeholder="Password">
  <button type="submit">Entrar</button>
</form>

<a href="./User/RegistrarUser.php" target="_blank">Registrarse</a>

</body>
</html>

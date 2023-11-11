<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylet.css">
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Bienvenido al Registro</h2>
<form class="login" method="POST" action="GuardarUser.php">
    <input type="text" name="name" placeholder="Nombre">
    <input type="text" name="email" placeholder="Correo Electrónico">
    <input type="text" name="token" placeholder="Digita el token dado">
    <input type="password" name="password" placeholder="Contraseña">
    <button type="submit">Registrarse</button>
</form>

<a href="https://codepen.io/davinci/" target="_blank">check my other pens</a>
</body>
</html>

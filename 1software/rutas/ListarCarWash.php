<!DOCTYPE html>
<html>
  <head>
    <title>Sidebar Dashboard CSS Learning</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
      <link rel="stylesheet" href="DashB.css">
    </head>
  <body>
    <div class="dashboard">
    <input type="checkbox" id="check"/>
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>Car <span>Wash</span></h3>
      </div>
      <div class="right_area">
        <a href="#" class="logout_btn">close</a>
      </div>
    </header>
    <div class="sidebar">
      <div class="profile-div">
        <img src="https://i.pinimg.com/736x/f2/b1/61/f2b1618c5c371bdab6073571f6e8b007.jpg" class="profile_image" alt=""/>
        <h4>Josue</h4>
      </div>
      <a href="../Dashboard.php">
        <i class="fas fa-desktop"></i>
        <span>Dashboard</span>
      </a>
      <a href="#">
      <i class='fas fa-shopping-cart'></i>
        <span>AgregarCarwash</span>
      </a>
      <a href="#">
        <i class="fas fa-cogs"></i>
        <span>Component</span>   
       </a>
      <a href="#">
        <i class="fas fa-table"></i>
        <span>Tables</span>   
      </a>
      <a href="#">
        <i class="fas fa-th"></i>
        <span>Forms</span>  
      </a>
      <a href="#">
        <i class="fas fa-info-circle"></i>
        <span>About</span>  
      </a>
      <a href="#">
        <i class="fas fa-sliders-h"></i>
        <span>Settings</span>  
      </a>

      <div class="Contenedor">
      <?php
require '../conexion.php';

// Preparar la consulta SQL para obtener todos los registros de carWash
$sql = "SELECT * FROM carWash";

// Ejecutar la consulta
$result = $conexion->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    echo "<h2>Listado de Datos</h2>";
    echo "<table border='1'>
            <tr>
                <th>Carwash ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Telephone</th>
            </tr>";

    // Iterar sobre los resultados y mostrarlos en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['CarwashID'] . "</td>
                <td>" . $row['Name'] . "</td>
                <td>" . $row['Address'] . "</td>
                <td>" . $row['Email'] . "</td>
                <td>" . $row['Telephone'] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No hay datos en la tabla carWash.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

      

  </body>
</html>
<!DOCTYPE html>
<html>

<head>
  <title>Sidebar Dashboard CSS Learning</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" href="DashP.css">
</head>

<body>zzz
  <div class="dashboard">
    <input type="checkbox" id="check" />
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
  </div>
  <div class="general">
    <div class="sidebar">
      <div class="profile-div">
        <img src="https://i.pinimg.com/736x/f2/b1/61/f2b1618c5c371bdab6073571f6e8b007.jpg" class="profile_image" alt="" />
        <h4>Josue</h4>
      </div>
      <a href="../Dashboard.php">
        <i class="fas fa-desktop"></i>
        <span>Inicio</span>
      </a>
      <a href="">
        <i class='fas fa-shopping-cart'></i>
        <span>Agregar Carwash</span>
      </a>
      <a href="../AgregarAdmin/DashAdmin.php">
        <i class="fas fa-cogs"></i>
        <span>Agregar Administrador</span>
      </a>
      <a href="../AgregarE/DashE.php">
        <i class="fas fa-table"></i>
        <span>Agregar Empleado</span>
      </a>
      <a href="../AgregarP/DashProv.php">
        <i class="fas fa-th"></i>
        <span>Agregar Proveedor</span>
      </a>
      <a href="../AgregarAlmacen/DashAlma.php">
        <i class="fas fa-th"></i>
        <span>Agregar Almacen</span>
      </a>
      <a href="../AgregarInven/DashInven.php">
        <i class="fas fa-th"></i>
        <span>Agregar Inventario</span>
      </a>
      <a href="#">
        <i class="fas fa-info-circle"></i>
        <span>About</span>
      </a>
      <a href="#">
        <i class="fas fa-sliders-h"></i>
        <span>Settings</span>
      </a>
      

    </div>


    <div class="Contenedor">
      <div class="content-form">
        <button id="btn-abrir">listar</button>
       
        <h2>Add Supplier</h2>


        <form action="GuardaP.php" method="post" class="Formulario">
          <div class="ContentInput">
            <div class="label1">
              <label for="id">ID:</label>
              <input type="text" id="id" name="id" required>

              <label for="Name">Name:</label>
              <input type="text" id="Name" name="Name" required>

              <label for="Address">Address:</label>
              <input type="text" id="Address" name="Address" required>

              <label for="Phone">Phone:</label>
              <input type="tel" id="Phone" name="Phone" required>
            </div>
            <div class="label2">
              <label for="Email">Email:</label>
              <input type="email" id="Email" name="Email" required>

              <input type="submit" value="Add Supplier">
            </div>
          </div>
        </form>




      </div>
      <div id="modal" class="modal">
          <div class="content-modal">

            <button class="close">Cerrar</button>
            <div class="lista-administradores">
            <?php
require '../conexion.php';

// Verificar si se ha enviado el formulario de eliminación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar'])) {
    $idEliminar = $_POST['id_eliminar'];

    // Lógica de eliminación
    $sqlEliminar = "DELETE FROM suppliers WHERE id = '$idEliminar'";
    if ($conexion->query($sqlEliminar) === TRUE) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . $conexion->error;
    }
}

// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_editar'])) {
    $idEditar = $_POST['id_editar'];

    // Redirigir a la página de edición con el ID
    header("Location: editar_supplier.php?id=$idEditar");
    exit();
}

// Preparar la consulta SQL para obtener todos los registros de proveedores
$sql = "SELECT * FROM suppliers";

// Ejecutar la consulta
$result = $conexion->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    echo "<h2>Listado de Proveedores</h2>";
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>";

    // Iterar sobre los resultados y mostrarlos en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['Name'] . "</td>
            <td>" . $row['Address'] . "</td>
            <td>" . $row['Phone'] . "</td>
            <td>" . $row['Email'] . "</td>
            <td>
                &nbsp;
                <form method='POST' action=''>
                    <input type='hidden' name='id_eliminar' value='" . $row['id'] . "'>
                    <button type='submit' name='eliminar'>Eliminar</button>
                </form>
                
                &nbsp;
                <a href='ProvInven.php?id=" . $row['id'] . "'>Añadir un Inventario</a>
            </td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No hay datos en la tabla suppliers.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>







            </div>
            
            
            


          </div>


        </div>



      </section>

      <script>
        //Modal
        const btnAbrir = document.getElementById("btn-abrir");
        const modal = document.getElementById("modal");
        modal.style.display = "none";

        btnAbrir.addEventListener("click", () => {
          modal.style.display = "block";
        });
        ////close modal

        modal.style.display = "none";

        btnAbrir.addEventListener("click", () => {
          modal.style.display = "block";
        });

        const btnCerrar = document.querySelector(".close");

        btnCerrar.addEventListener("click", () => {
          modal.style.display = "none";
        });
      </script>

</body>

</html>
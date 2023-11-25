<!DOCTYPE html>
<html>

<head>
  <title>Agregar Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" href="DashA.css">
</head>

<body>
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
    <span>Home</span>
</a>
<a href="../Realizar Ventas/DashVC.php">
    <i class='fas fa-shopping-cart'></i>
    <span>Make Sale</span>
</a>
<a href="">
    <i class='fas fa-shopping-cart'></i>
    <span>Add Car Wash</span>
</a>
<a href="../AgregarAdmin/DashAdmin.php">
    <i class="fas fa-cogs"></i>
    <span>Add Administrator</span>
</a>
<a href="../AgregarE/DashE.php">
    <i class="fas fa-table"></i>
    <span>Add Employee</span>
</a>
<a href="../AgregarP/DashProv.php">
    <i class="fas fa-th"></i>
    <span>Add Supplier</span>
</a>
<a href="../AgregarAlmacen/DashAlma.php">
    <i class="fas fa-th"></i>
    <span>Add Warehouse</span>
</a>
<a href="../AgregarInven/DashInven.php">
    <i class="fas fa-th"></i>
    <span>Add Inventory</span>
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

        <h2>Add Administrator</h2>
        <form action="GuardarA.php" method="post" class="Formulario">
          <div class="ContentInput">
            <div class="label1">
              <label for="firstName">ID_Admin:</label>
              <input type="text" id="ID" name="ID" required>

              <label for="firstName">First Name:</label>
              <input type="text" id="firstName" name="firstName" required>

              <label for="lastName">Last Name:</label>
              <input type="text" id="lastName" name="lastName" required>

              <label for="middleName">Middle Name:</label>
              <input type="text" id="middleName" name="middleName">
            </div>
            <div class="label2">
              <label for="address">Address:</label>
              <input type="text" id="address" name="address" required>

              <label for="phone">Phone:</label>
              <input type="tel" id="phone" name="phone" required>

              <label for="carwashID">Carwash ID:</label>
              <input type="number" id="carwashID" name="carwashID" required>

              <input type="submit" value="Add Administrator">
            </div>
          </div>
        </form>
        <button id="btn-abrir">Abrir modal</button>

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
                $sqlEliminar = "DELETE FROM administrator WHERE ID = '$idEliminar'";
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
                header("Location: edit.php?id=$idEditar");
                exit();
              }

              // Preparar la consulta SQL para obtener todos los registros de administradores
              $sql = "SELECT * FROM administrator";

              // Ejecutar la consulta
              $result = $conexion->query($sql);

              // Verificar si hay resultados
              if ($result->num_rows > 0) {
                echo "<h2>Listado de Administradores</h2>";
                echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Middle Name</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Carwash ID</th>
                <th>Acciones</th>
            </tr>";

                // Iterar sobre los resultados y mostrarlos en la tabla
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                <td>" . $row['ID'] . "</td>
                <td>" . $row['FirstName'] . "</td>
                <td>" . $row['LastName'] . "</td>
                <td>" . $row['MiddleName'] . "</td>
                <td>" . $row['Address'] . "</td>
                <td>" . $row['Phone'] . "</td>
                <td>" . $row['CarwashID'] . "</td>
                <td>
                 
                    &nbsp;
                    <form method='POST' action=''>
                        <input type='hidden' name='id_eliminar' value='" . $row['ID'] . "'>
                        <button type='submit' name='eliminar'>Eliminar</button>
                    </form>
                </td>
            </tr>";
                }

                echo "</table>";
              } else {
                echo "No hay datos en la tabla administrator.";
              }

              // Cerrar la conexión a la base de datos
              $conexion->close();
              ?>
            </div>
            
            

          </div>
          
      
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
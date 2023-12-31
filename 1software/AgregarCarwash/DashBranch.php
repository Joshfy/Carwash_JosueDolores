<!DOCTYPE html>
<html>

<head>
  <title>Sidebar Dashboard CSS Learning</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" href="DashB.css  ">
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
    <section class="General">
      <div class="sidebar">
        <div class="profile-div">
          <img src="https://i.pinimg.com/736x/f2/b1/61/f2b1618c5c371bdab6073571f6e8b007.jpg" class="profile_image"
            alt="" />
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



        <div class="Contenedor">
          <!-- Agrega tu formulario aquí -->
          <h1>Bienvenido al Formulario de Añadir un Nuevo <br> Sucursal del CarWash</h1>
          <p>Por favor, complete el formulario siguiente para añadir un nuevo administrador.</p>
          <button id="btn-abrir">Listarl</button>

          <div id="modal" class="modal">
            <div class="content-modal">
              <button class="close">Cerrar</button>
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
                            <th>Acciones</th>


                        </tr>";

                // Iterar sobre los resultados y mostrarlos en la tabla
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                            <td>" . $row['CarwashID'] . "</td>
                            <td>" . $row['Name'] . "</td>
                            <td>" . $row['Address'] . "</td>
                            <td>" . $row['Email'] . "</td>
                            <td>" . $row['Telephone'] . "</td>
                            <td>
                        
                                            <a href='eliminar.php?id=" . $row['CarwashID'] . "'><i class='fas fa-trash red-icon'></i></a>
                              </td>
                            
                          </tr>";
                }

                echo "</table>";
              } else {
                echo "No hay datos en la tabla carWash.";
              }

              // Cerrar la conexión a la base de datos
              $conexion->close();
              ?>
              <?php
              require '../conexion.php';

              function obtenerUltimoCarwashID()
              {
                global $conexion;

                $getLastIDQuery = "SELECT MAX(CarwashID) AS LastID FROM carWash";
                $lastIDResult = $conexion->query($getLastIDQuery);

                if ($lastIDResult && $lastIDResult->num_rows > 0) {
                  $lastIDRow = $lastIDResult->fetch_assoc();
                  return $lastIDRow['LastID'];
                } else {
                  return 0;
                }
              }

              ?>
            </div>

          </div>
          </a>
          <div class="content-form">

            <form class="Formulario" action="GuardarCarWash.php" method="POST">
              <label for="CarwashID">Carwash ID:</label>
              <input type="text" id="CarwashID" name="CarwashID" value="<?php echo obtenerUltimoCarwashID() + 1; ?>"
                readonly><br>

              <label for="FirstName"> Name:</label>
              <input type="text" hid="Name" name="Name"><br>

              <label for="LastName">Address:</label>
              <input type="text" id="Address" name="Address"><br>

              <label for="MiddleName">Email:</label>
              <input type="text" id="Email" name="Email"><br>

              <label for="Address">Telephone:</label>
              <input type="text" id="Telephone" name="Telephone"><br>

              <input type="submit" value="Guardar">
            </form>
          </div>
        </div>



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
<!DOCTYPE html>
<html>

<head>
  <title>Sidebar Dashboard CSS Learning</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" href="./DashE.css">
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

        <h2>Add Employees with CarWash</h2>
        <form action="guardar_carwash_empleado.php" method="post">
        <label for="carwashID">ID del Carwash:</label>
        <input type="number" id="carwashID" name="carwashID" required><br><br>

        <?php
        // Verificar si employeeID está presente en $_GET y asignar su valor a $employeeID
        $employeeID = isset($_GET['employeeID']) ? $_GET['employeeID'] : null;
        ?>

        <input type="hidden" id="employeeID" name="employeeID" value="<?php echo $employeeID; ?>">
        <input type="submit" value="Guardar">
    </form>


    </div>
    <div id="modal" class="modal">
      <div class="content-modal">
      <button class="close">Cerrar</button>
      <div class="lista-empleados">
      <?php
// listar_carwashes_empleados.php

require '../conexion.php';

// Realizar la consulta para obtener todos los registros de la tabla "carwash_has_employees"
$sql = "SELECT che.*, cw.Name AS CarwashName, e.FirstName AS EmployeeName
        FROM carwash_has_employees che
        JOIN CarWash cw ON che.CarwashID = cw.CarWashID
        JOIN employees e ON che.EmployeeID = e.EmployeeID";
$result = $conexion->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Imprimir la tabla
    echo "<h2>Listado de Empleados con Carwash</h2>";
    echo "<table border='1'>
            <tr>
                <th>Carwash ID</th>
                <th>Carwash Name</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
            </tr>";

    // Iterar sobre los resultados y mostrar cada fila en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["CarwashID"] . "</td>
                <td>" . $row["CarwashName"] . "</td>
                <td>" . $row["EmployeeID"] . "</td>
                <td>" . $row["EmployeeName"] . "</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No hay datos en la tabla carwash_has_employees.";
}

// Cerrar la conexión
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
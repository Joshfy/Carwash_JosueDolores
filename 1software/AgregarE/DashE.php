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
      <a href="../AgregarCarwash/DashBranch.php">
        <i class='fas fa-shopping-cart'></i>
        <span>Agregar Carwash</span>
      </a>
      <a href="#">
        <i class="fas fa-cogs"></i>
        <span>Agregar Administrador</span>
      </a>
      <a href="#">
        <i class="fas fa-table"></i>
        <span>Agregar Empleado</span>
      </a>
      <a href="#">
        <i class="fas fa-th"></i>
        <span>Agregar Proveedor</span>
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
        <h2>Add Employees</h2>
        <form action="GuardarE.php" method="post" class="Formulario">
          <div class="ContentInput">
            <div class="label1">
              <label for="employeeID">Employee ID:</label>
              <input type="text" id="employeeID" name="employeeID" required>

              <label for="firstName">First Name:</label>
              <input type="text" id="firstName" name="firstName" required>

              <label for="lastName">Last Name:</label>
              <input type="text" id="lastName" name="lastName" required>

              <label for="middleName">Middle Name:</label>
              <input type="text" id="middleName" name="middleName">
            </div>
            <div class="label2">
              <label for="salary">Salary:</label>
              <input type="text" id="salary" name="salary" required>

              <label for="shift">Shift:</label>
              <input type="text" id="shift" name="shift" required>

              <label for="position">Position:</label>
              <input type="text" id="position" name="position" required>

              <input type="submit" value="Add Employee">
            </div>
          </div>
          <p><a href="#" id="toggleList">Listar</a></p>
        </form>
      </div>

      <div class="lista-empleados">
            <?php
            require '../conexion.php';

            // Preparar la consulta SQL para obtener todos los registros de empleados
            $sql = "SELECT * FROM Employees";

            // Ejecutar la consulta
            $result = $conexion->query($sql);

            // Verificar si hay resultados
            if ($result->num_rows > 0) {
              echo "<h2>Listado de Empleados</h2>";
              echo "<table border='1'>
                    <tr>
                        <th>Employee ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Salary</th>
                        <th>Shift</th>
                        <th>Position</th>
                        <th>Acciones</th>
                    </tr>";

              // Iterar sobre los resultados y mostrarlos en la tabla
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['EmployeeID'] . "</td>
                        <td>" . $row['FirstName'] . "</td>
                        <td>" . $row['LastName'] . "</td>
                        <td>" . $row['MiddleName'] . "</td>
                        <td>" . $row['Salary'] . "</td>
                        <td>" . $row['Shift'] . "</td>
                        <td>" . $row['Position'] . "</td>
                        <td>
                            <a href='editar_empleado.php?id=" . $row['EmployeeID'] . "'>Editar</a>
                            &nbsp;
                            <a href='eliminar_empleado.php?id=" . $row['EmployeeID'] . "'>Eliminar</a>
                        </td>
                    </tr>";
              }

              echo "</table>";
            } else {
              echo "No hay datos en la tabla Employees.";
            }

            // Cerrar la conexión a la base de datos
            $conexion->close();
            ?>
      </div>

    </div>
    </section>

    <script>
      document.getElementById("toggleList").addEventListener("click", function() {
        // Obtiene el elemento con la clase "lista-administradores"
        var listaEmpleados = document.querySelector(".lista-empleados");

        // Cambia la visibilidad de la lista
        listaEmpleados.style.display = (listaEmpleados.style.display === "none") ? "block" : "none";
      });
    </script>

</body>

</html>
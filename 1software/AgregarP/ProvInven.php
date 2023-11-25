<!DOCTYPE html>
<html>

<head>
  <title>Sidebar Dashboard CSS Learning</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" href="./DashP.css">
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

      <h2>Añadir a InventorySuppliers</h2>
    <form action="GuardarPI.php" method="post">
        <label for="inventoryID">ID del Producto (de la tabla inventory):</label>
        <input type="number" id="inventoryID" name="inventoryID" required><br><br>

        <!-- Puedes agregar más campos según la estructura de tu tabla inventorysuppliers -->

        <input type="hidden" id="supplierID" name="supplierID" value="<?php echo $_GET['id']; ?>">
        <input type="submit" value="Guardar">
    </form>


    </div>
    <div id="modal" class="modal">
      <div class="content-modal">
      <button class="close">Cerrar</button>
      <div class="lista-empleados">
      <?php
// ListarDatos.php

require '../conexion.php';

// Consultar datos en la tabla "inventorysuppliers" y "suppliers"
$sql = "SELECT i.InventoryID, i.SupplierID, s.Name AS SupplierName 
        FROM inventorysuppliers i
        JOIN suppliers s ON i.SupplierID = s.ID";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Mostrar los datos en una tabla HTML
    echo "<table border='1'>";
    echo "<tr><th>InventoryID</th><th>SupplierID</th><th>SupplierName</th></tr>";

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["InventoryID"] . "</td>";
        echo "<td>" . $fila["SupplierID"] . "</td>";
        echo "<td>" . $fila["SupplierName"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No hay datos en la tabla inventorysuppliers.";
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
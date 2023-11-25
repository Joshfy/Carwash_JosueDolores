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
      <a href="../Realizar Ventas/DashVC.php">
        <i class='fas fa-shopping-cart'></i>
        <span>Realizar Venta</span>
      </a>
      <a href="../AgregarCarwash/DashBranch.php">
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
        <h2>Formulario de delivery</h2>

        <?php
// Recuperar el ID del cliente de la URL

$customer_id = isset($_GET['id']) ? $_GET['id'] : null;

// Verificar si se proporcionó un ID de cliente válido

if ($customer_id !== null && is_numeric($customer_id)) {
require "../conexion.php";
  

    // Obtener la dirección del cliente
    $customer_query = "SELECT address FROM Customer WHERE ID = $customer_id";
    $customer_result = $conexion->query($customer_query);

    // Verificar si se encontró el cliente
    if ($customer_result->num_rows > 0) {
        $customer_data = $customer_result->fetch_assoc();
        $customer_address = $customer_data['address'];
    } else {
        // Manejar el caso en que no se encuentra el cliente
        $customer_address = "";
        echo "No se encontró la dirección del cliente.";
    }

    // Cerrar conexión
    $conexion->close();
    ?>
    <form action="GuardarDeli.php" method="post">
        <div class="ContentInput">
            <label for="id">ID del Delivery:</label>
            <input type="number" name="id" required>

            <label for="customer_id">ID del Cliente:</label>
            <input type="number" name="customer_id" value="<?php echo $customer_id; ?>" readonly>

            <label for="customer_address">Dirección de Entrega:</label>
            <input type="text" name="customer_address" value="<?php echo $customer_address; ?>" required>

            <label for="product_id">ID del Producto:</label>
            <input type="number" name="product_id" required>

            <label for="total_price">Precio Total:</label>
            <input type="number" step="0.01" name="total_price" required>

            <label for="date">Fecha de Entrega:</label>
            <input type="date" name="date" required>

            <input type="submit" value="Guardar">
        </div>
    </form>
<?php
    } else {
        // Mostrar un mensaje de error si no se proporciona un ID de cliente válido
        echo "Error: ID de cliente no válido.";
    }
    ?>
      </div>
      <div id="modal" class="modal">
          <div class="content-modal">

            <button class="close">Cerrar</button>
            

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
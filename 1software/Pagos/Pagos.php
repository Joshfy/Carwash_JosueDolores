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
        <h2>Formulario de Pagos</h2>
        <?php
require "../conexion.php";

// Obtener el último ID de Payments
$sql_last_id = "SELECT MAX(ID) AS last_id FROM Payments";
$result_last_id = $conexion->query($sql_last_id);

// Verificar si hay resultados y obtener el último ID
$last_id = 1; // Valor predeterminado si no hay registros en la tabla Payments
if ($result_last_id->num_rows > 0) {
    $row_last_id = $result_last_id->fetch_assoc();
    $last_id = $row_last_id['last_id'] + 1; // Incrementar el último ID
}
?>

<?php
// Recuperar el ID CarWash de la URL
$carwash_id = isset($_GET['carwash_id']) ? $_GET['carwash_id'] : null;

// Recuperar el ID de entrega de la URL si no se proporciona el carwash_id
$delivery_id = (!$carwash_id && isset($_GET['id'])) ? $_GET['id'] : null;

// Verificar que el ID CarWash o Delivery sea un número entero
if (!is_numeric($carwash_id) && !is_numeric($delivery_id)) {
    // Manejar el caso en el que ni el ID CarWash ni el Delivery son números válidos
    echo "ID no válido.";
    // Puedes redirigir al usuario a otra página o realizar alguna acción adicional según tus necesidades
    exit;
}

?>

<?php if ($carwash_id): ?>
    <p>Carwash_ID: <?php echo $carwash_id; ?></p>
<?php elseif ($delivery_id): ?>
    <p>Delivery_ID: <?php echo $delivery_id; ?></p>
<?php endif; ?>

<form action="GuardarVC.php" method="post">
  <div class="ContentInput">
      <?php if ($carwash_id): ?>
          <input type="hidden" name="carwash_id" value="<?php echo $carwash_id; ?>" />
      <?php elseif ($delivery_id): ?>
          <input type="hidden" name="delivery_id" value="<?php echo $delivery_id; ?>" />
      <?php endif; ?>

      
      <label for="payment_id">ID de Payments:</label>
      <input type="text" name="payment_id" value="<?php echo $last_id; ?>" required readonly>
      
      <label for="amount_paid">Monto Pagado:</label>
      <input type="number" step="0.01" name="amount_paid" required>

      <label for="date">Fecha:</label>
      <input type="date" name="date" required>

      <label for="payment_type">Tipo de Pago:</label>
      <select name="payment_type" required>
          <option value="Efectivo">Efectivo</option>
          <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
          <!-- Agrega más opciones según tus necesidades -->
      </select>

      <label for="service_type">Tipo de Servicio:</label>
      <?php if ($carwash_id): ?>
          <select name="service_type" required>
              <option value="CarWash">CarWash</option>
              <!-- Agrega más opciones según tus necesidades -->
          </select>
      <?php elseif ($delivery_id): ?>
          <select name="service_type" required>
              <option value="Delivery">Delivery</option>
              <!-- Agrega más opciones según tus necesidades -->
          </select>
      <?php endif; ?>

      <input type="submit" value="Guardar Pago">
    </div>
</form>



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
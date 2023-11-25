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
        <button id="btn-abrir">listar</button>
        <h2>Formulario de Cliente</h2>
        <?php
            // Configuración de la conexión a la base de datos
            require "../conexion.php";

            // Obtener el último ID de la tabla Customer
            $query = "SELECT MAX(ID) AS max_id FROM Customer";
            $result = $conexion->query($query);

            // Verificar si se encontró el último ID
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $last_id = $row["max_id"] + 1; // Incrementar en 1 para el nuevo ID
            } else {
                $last_id = 1; // Establecer un valor predeterminado si no hay registros en la tabla
            }

            // Cerrar conexión
            $conexion->close();
            ?>

        <form onsubmit="procesarYRedirigir(); return false;">
        <div class="ContentInput">
          <label for="id">ID:</label>
          <input type="number" name="id" id="id" value="<?php echo $last_id; ?>" required readonly>

          <label for="first_name">Nombre:</label>
          <input type="text" name="first_name" required>

          <label for="last_name">Apellido:</label>
          <input type="text" name="last_name" required>

          <label for="middle_name">Segundo Apellido:</label>
          <input type="text" name="middle_name">

          <label for="address">Dirección:</label>
          <input type="text" name="address" required>
          <div class ="opciones">
            <label>Opción:</label>
            <input type="radio" name="opcion" value="delivery" checked> Delivery
            <input type="radio" name="opcion" value="carwash"> Carwash
          </div>
        </div>

          <input type="submit" value="Guardar">

    </form>


      </div>
      <div id="modal" class="modal">
          <div class="content-modal">

            <button class="close">Cerrar</button>
            <?php
require "../conexion.php";

// Consultar todos los registros de la tabla Customer
$sql = "SELECT * FROM Customer";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Segundo Nombre</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>";

    // Iterar sobre los resultados y mostrarlos en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ID']}</td>
                <td>{$row['first_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['middle_name']}</td>
                <td>{$row['address']}</td>
                <td><a href='eliminar_registro.php?id={$row['ID']}'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No hay registros en la tabla.";
}

// Cerrar conexión
$conexion->close();
?>

<style>
      table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: blue;
        }

        th, td {
          padding: 15px;
        text-align: left;
        border: 3px solid #727574ba;
        }

        th {
            background-color: #e9b43de8;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
</style>

            

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
         <script>
        function procesarYRedirigir() {
            var opcion = document.querySelector('input[name="opcion"]:checked').value;
            var id = document.getElementById("id").value;

            // Enviar datos al archivo GuardarVC.php usando AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "GuardarVC.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
            var data = "id=" + id +
                       "&first_name=" + encodeURIComponent(document.querySelector('input[name="first_name"]').value) +
                       "&last_name=" + encodeURIComponent(document.querySelector('input[name="last_name"]').value) +
                       "&middle_name=" + encodeURIComponent(document.querySelector('input[name="middle_name"]').value) +
                       "&address=" + encodeURIComponent(document.querySelector('input[name="address"]').value);

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Procesamiento completo, ahora redirigir
                    if (opcion === "delivery") {
                        window.location.href = "../Delivery/Delivery.php?id=" + id;
                    } else if (opcion === "carwash") {
                        window.location.href = "../Carwash/CarWash.php?id=" + id;
                    }
                }
            }

            xhr.send(data);
        }
    </script>

</body>

</html>
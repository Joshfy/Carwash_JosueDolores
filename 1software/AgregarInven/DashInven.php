<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard Inicio</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
      <link rel="stylesheet" href="./DashInven.css">
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
    </div>
    <div class="general">
      <div class="sidebar">
        <div class="profile-div">
            <img src="https://i.pinimg.com/736x/f2/b1/61/f2b1618c5c371bdab6073571f6e8b007.jpg" class="profile_image" alt=""/>
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

          <div id="content-form">
          <h2>Formulario de Inventario</h2>
          <form action="GuardarInven.php" method="post">
              <label for="idProduct">ID del Producto:</label>
              <input type="number" id="idProduct" name="IDproduct" required><br><br>

              <label for="quantity">Cantidad:</label>
              <input type="number" id="quantity" name="Quantity" required><br><br>

              <label for="costs">Costo:</label>
              <input type="number" id="costs" name="Costs" required><br><br>

              <label for="idProductReference">ID del Producto (Referencia de Store):</label>
              <input type="number" id="idProductReference" name="IDproducts" required><br><br>

              <input type="submit" value="Guardar Inventario">
          </form>



          </div>
             

            

        </div>
        <div id="modal" class="modal">
              <div class="content-modal">
               <button class="close">Cerrar</button>
               <div class="list-products">
                <h2>Lista de productos  </h2>
               <?php
           require '../conexion.php';
           
           // Realizar la consulta para obtener todos los registros del inventario
           $sql = "SELECT * FROM inventory";
           $result = $conexion->query($sql);
           
           // Verificar si hay resultados
           if ($result->num_rows > 0) {
               // Imprimir la tabla
               echo "<table border='1'>
                       <tr>
                           <th>ID del Producto</th>
                           <th>Cantidad</th>
                           <th>Costo</th>
                           <th>ID del Producto (Referencia de Store)</th>
                       </tr>";
           
               // Iterar sobre los resultados y mostrar cada fila en la tabla
               while ($row = $result->fetch_assoc()) {
                   echo "<tr>
                           <td>" . $row["IDproduct"] . "</td>
                           <td>" . $row["Quantity"] . "</td>
                           <td>" . $row["Costs"] . "</td>
                           <td>" . $row["IDproducts"] . "</td>
                       </tr>";
               }
           
               echo "</table>";
           } else {
               echo "No hay datos en el inventario.";
           }
           
           // Cerrar la conexión
           $conexion->close();
           ?>
           
               </div>


              </div>
 
            </div>

          
             
            
        </div>
 </section>
 <script>
    document.addEventListener('DOMContentLoaded', function () {
      const animateNumbers = (targetProductos, targetUsuarios, targetVentas, duration) => {
        const totalFrames = 60;

        const incrementProductos = Math.ceil(targetProductos / totalFrames);
        const incrementUsuarios = Math.ceil(targetUsuarios / totalFrames);
        const incrementVentas = Math.ceil(targetVentas / totalFrames);

        const intervalProductos = setInterval(() => {
          const productosElement = document.getElementById('productos');
          productosElement.textContent = Math.min(
            parseInt(productosElement.textContent) + incrementProductos,
            targetProductos
          );
        }, duration / totalFrames);

        const intervalUsuarios = setInterval(() => {
          const usuariosElement = document.getElementById('usuarios');
          usuariosElement.textContent = Math.min(
            parseInt(usuariosElement.textContent) + incrementUsuarios,
            targetUsuarios
          );
        }, duration / totalFrames);

        const intervalVentas = setInterval(() => {
          const ventasElement = document.getElementById('ventas');
          ventasElement.textContent = Math.min(
            parseInt(ventasElement.textContent) + incrementVentas,
            targetVentas
          );
        }, duration / totalFrames);

        setTimeout(() => {
          clearInterval(intervalProductos);
          clearInterval(intervalUsuarios);
          clearInterval(intervalVentas);
        }, duration);
      };

      animateNumbers(30, 50, 100, 4000);
    });
    
    
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
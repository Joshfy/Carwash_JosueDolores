<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard Inicio</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
      <link rel="stylesheet" href="./css/Dash.css">
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
        <a href="Dashboard.php">
        <i class="fas fa-desktop"></i>
        <span>Inicio</span>
        </a>
        <a href="./AgregarCarwash/DashBranch.php">
        <i class='fas fa-shopping-cart'></i>
        <span>Agregar Carwash</span>
        </a>
        <a href="./AgregarAdmin/DashAdmin.php">
        <i class="fas fa-cogs"></i>
        <span>Agregar Administrador</span>
        </a>
        <a href="./AgregarE/DashE.php">
        <i class="fas fa-table"></i>
        <span>Agregar Empleado</span>
        </a>
        <a href="./AgregarP/DashProv.php">
        <i class="fas fa-th"></i>
        <span>Agregar Proveedor</span>
        <a href="./AgregarP/DashProv.php">
        <i class="fas fa-th"></i>
        <span>Agregar Inventario</span>
        </a>
        <a href="#">
        <i class="fas fa-th"></i>
        <span>Agregar a</span>
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
          <div id="content">
          <h2>Estamos en el Home</h2>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque accusamus possimus
            porro at voluptatum perferendis earum sequi distinctio? Rerum modi minima
            expedita quasi eligendi voluptas debitis earum quibusdam ad cupiditate.
          </p>
          <div id="columns">
            <div class="column">
              <h3>Productos Totales</h3>
              <p class="neon-number" id="productos">0</p>
            </div>
            <div class="column">
              <h3>Usuarios</h3>
              <p class="neon-number" id="usuarios">0</p>
            </div>
            <div class="column">
              <h3>Ventas Realizadas</h3>
              <p class="neon-number" id="ventas">0</p>
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
  </script>

  </body>
</html>
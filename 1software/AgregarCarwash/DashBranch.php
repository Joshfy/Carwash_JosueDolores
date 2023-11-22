<!DOCTYPE html>
<html>
  <head>
    <title>Sidebar Dashboard CSS Learning</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
      <link rel="stylesheet" href="DashB.css  ">
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
    <section class="General">
      <div class="sidebar">
        <div class="profile-div">
          <img src="https://i.pinimg.com/736x/f2/b1/61/f2b1618c5c371bdab6073571f6e8b007.jpg" class="profile_image" alt=""/>
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
      

      <div class="Contenedor">
        <!-- Agrega tu formulario aquí -->
        <h2>Formulario para guardar datos en Carwash</h2>
        <button id="btn-abrir">Abrir modal</button>

        <div id="modal" class="modal">
          <div class="content-modal">
          <button class="close">Cerrar</button>


          </div>

        </div>

        <form action="ListCarWash.php" method="POST">
            <label for="CarwashID">Carwash ID:</label>
            <input type="text" id="CarwashID" name="CarwashID"><br>

            <label for="FirstName"> Name:</label>
            <input type="text" id="Name" name="Name"><br>

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
       document.getElementById("toggleList").addEventListener("click", function() {
            // Obtiene el elemento con la clase "lista-administradores"
            var listaAdministradores = document.querySelector(".lista-administradores");

            // Cambia la visibilidad de la lista
            listaAdministradores.style.display = (listaAdministradores.style.display === "none") ? "block" : "none";
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
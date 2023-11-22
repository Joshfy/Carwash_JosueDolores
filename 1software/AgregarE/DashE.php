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
      </div>
      </form>
      <button id="btn-abrir">Abrir modal</button>

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
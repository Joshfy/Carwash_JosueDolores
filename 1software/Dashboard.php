<!DOCTYPE html>
<html>
  <head>
    <title>Sidebar Dashboard CSS Learning</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
      <link rel="stylesheet" href="./css/Dash.css">
    </head>
  <body>
    <input type="checkbox" id="check"/>
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>Car <span>Wash</span></h3>
      </div>
      <div class="right_area">
        <a href="Dashboard.php" class="logout_btn">close</a>
      </div>
    </header>
    <nav class="sidebar">
      <div class="profile-div">
        <img src="https://i.pinimg.com/736x/f2/b1/61/f2b1618c5c371bdab6073571f6e8b007.jpg" class="profile_image" alt=""/>
        <h4>Josue</h4>
      </div>
      <a href="#">
        <i class="fas fa-desktop"></i>
        <span>Dashboard</span>
      </a>
      <a href="./rutas/DashBranch.php">
      <i class='fas fa-shopping-cart'></i>
        <span>branch offices</span>
      </a>
      <a href="#">
        <i class="fas fa-cogs"></i>
        <span>Component</span>   
       </a>
      <a href="#">
        <i class="fas fa-table"></i>
        <span>Tables</span>   
      </a>
      <a href="#">
        <i class="fas fa-th"></i>
        <span>Forms</span>  
      </a>
      <a href="#">
        <i class="fas fa-info-circle"></i>
        <span>About</span>  
      </a>
      <a href="#">
        <i class="fas fa-sliders-h"></i>
        <span>Settings</span>  
      </a>
</nav>
   <main>
    <div class= "content"></div>
    <h1>gohla</h1>
   </main>
  </body>
</html>
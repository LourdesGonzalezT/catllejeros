<?php
include "header.php";
 ?>
<!-- Aquí termina el header y empieza el contenido ppal -->
<main class="main-login">

    <!--Login -->
    <div class="container-fluid p-2">
        <h1 class="text-center">Login</h1>
        <?php

if(isset($_GET['register']) == 'true'){
    echo "<div class='form-control bg-success text-light'>Hola!! Bienvenido te has registrado correctamente, puedes loguearte aquí</div>";
}

if(isset($_GET['logout']) == 'true'){
  echo "<div class='form-control bg-success text-light'>Has cerrado sesión</div>";
}

if(isset($_GET['errorPassword']) == 'true'){
    echo "<div class='form-control bg-danger text-light'>Contraseña incorrecta</div>";
  }

?>
    <div class="container login p-6">
        <form class="row g-3" action="controllers/admins/login-admin.php" enctype="multipart/form-data" method="POST">
            <div class="col-12">
                <label for="adminEmail" class="form-label">Email</label>
                <input type="email" class="form-control" name="adminEmail" id="adminEmail">
            </div>
            <div class="col-12">
                <label for="adminPassword" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="adminPassword" id="adminPassword">
            </div>
            <div class="col-12">
                <button type="submit" class="btn loginbtn" name="btnLoginAdmin">Accede</button>
            </div>
        </form>
    </div>
    </div>
   
</main>

<?php
include "footer.php";
 ?>
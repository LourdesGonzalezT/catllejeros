<?php 
session_start();
include "header.php";
 ?>

<?php 
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);
?>

<?php
include "controllers/admins/register-admin.php";
?>


<main class="main-adminForm">
    <!-- FORMULARIO REGISTRO DE ADMINISTRADORES -->
    <div class="container-register p-5">
        <div class="container adminForm">
        <h5 class="text-center">Formulario para registrar administradores</h5>
        <?php
              if(isset($_GET["name"]) == 'true')
              {
                  echo "<div class='alert alert-danger' id='temporal'>El nombre de administrador ya está registrado. Por favor, elige otro.</div>";
              }
              if(isset($_GET["email"]) == 'true')
              {
                  echo "<div class='alert alert-danger' id='temporal'>El email ya está registrado. Por favor, elige otro.</div>";
              }
            ?>  
        <form class="row g-3" action="" enctype="multipart/form-data" method="POST">
            <div class="col-12">
                <label for="adminName" class="form-label">Nombre de Administrador</label>
                <input type="text" class="form-control" name="adminName" id="adminName">
            </div>
            <div class="col-12">
                <label for="adminEmail" class="form-label">Email</label>
                <input type="email" class="form-control" name="adminEmail" id="adminEmail">
            </div>
            <div class="col-12">
                <label for="adminPassword" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="adminPassword" id="adminPassword">
            </div>
            <div class="col-12">
                <button type="submit" class="btn registerbtn" name="btnRegisterAdmin">Registrar
                    Administrador</button>
            </div>
        </form>
    </div>
    </div>
</main>

<?php
include "footer.php"
 ?>
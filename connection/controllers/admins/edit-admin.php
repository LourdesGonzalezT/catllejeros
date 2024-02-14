<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if (isset($_POST["btneditAdmin"])) {
    $admin_Id = $_POST['adminId'];
    $name = $_POST["adminName"];
    $email = $_POST["adminEmail"];
    $password = $_POST["adminPassword"];

        $edit = $connection->query("UPDATE admins SET adminName='$name', adminEmail = '$email', adminPassword='$password' WHERE adminId='$admin_Id' ");
        if ($edit == 1) {
            echo "<div id='mensaje' class='alert alert-success'>¡Administrador modificado con éxito!</div>";
        } else {
            echo "<div id='mensaje' class='alert alert-danger'>Error al modificar el administrador</div>";
        }
    }
?>
<!-- Para que no nos envíe otra vez el formulario cuando recargemos la página y tengamos un elemento duplicado -->
<!-- <script>
    history.replaceState(null, null, location.pathname);
</script> -->
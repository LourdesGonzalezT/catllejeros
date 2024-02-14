<?php 
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);
?>

<?php
if(isset($_POST["btnRegisterAdmin"])){
   //Aseguramos que los campos no estén vacíos (excepto la imagen)
    if(!empty($_POST["adminName"]) AND !empty($_POST["adminEmail"]) AND !empty($_POST["adminPassword"])) {

        // Recogemos los campos del formulario en variables
        $name = $_POST["adminName"];
        $email = $_POST["adminEmail"];
        //Creamos la variable password
        $password = $_POST["adminPassword"];
        //Ahora le aplicamos la función de hashear el password
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
       // Insertamos el registro en la base de datos
       $register = "INSERT INTO admins(adminName, adminEmail, adminPassword ) VALUES ('$name', '$email', '$password_hashed')";

       if($connection->query($register) == TRUE) {
        //Redirigir al usuario a la página de inicio de sesión
        // header("Location: ../login.php");
        header("Location: login-form.php?register=true"); //así mandamos la info de que se ha registrado correctamente
        //Salir del script para evitar que se ejecute más código
        exit(); //
        }else{
        //Si hay un error en la consulta, mostrar el mensaje de error
        echo "Error: " .$register . "<br>" . $connection->error;
        }
    
   } else {
       echo "<div class='alert alert-danger'>Por favor, completa todos los campos</div>";
   }
}

//Cerrar la conexión a la base de datos
$connection->close();

?>
<!-- Script para que no aparezca la ventana de enviar. Para que no nos envíe otra vez el formulario cuando recargemos la página y tengamos un elemento duplicado-->
<!-- <script>
history.replaceState(null, null, location.pathname);
</script> -->
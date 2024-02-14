<?php 
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);
?>

<?php
if(isset($_POST["btnRegisterAdmin"])){
   //Aseguramos que los campos no estén vacíos (excepto la imagen)
    if(!empty($_POST["adminName"]) AND !empty($_POST["adminEmail"]) AND !empty($_POST["adminPassword"])) {
    // Recoger los datos del formulario en variables y limpiarlos
    // Escapar caracteres especiales en el nombre obtenido del formulario para evitar inyección SQL
        $name = mysqli_real_escape_string($connection, $_POST['adminName']);
        $email = mysqli_real_escape_string($connection, $_POST['adminEmail']);
        //Creamos la variable password aplicandole la función de hashear el password
        $password = password_hash($_POST['adminPassword'], PASSWORD_DEFAULT); 

  // Verificar si el correo electrónico ya está registrado
  $verifyEmail = "SELECT * FROM admins WHERE adminEmail = '$email'";
  $verifyEmail_result = mysqli_query($connection, $verifyEmail);

  if (!$verifyEmail_result) {
      // Error en la consulta SQL
      echo "Error: " . mysqli_error($connection);
  } else {
      // Verificar si el correo electrónico ya está en uso
      if (mysqli_num_rows($verifyEmail_result) > 0) {
          // El correo electrónico ya está en uso
          header('Location: registerAdmin-form.php?email=true');
          exit;
      }

      // Verificar si el nombre de usuario ya está registrado
      $verifyAdmin = "SELECT * FROM admins WHERE adminName = '$name'";
      $verifyAdmin_result = mysqli_query($connection, $verifyAdmin);

      if (!$verifyAdmin_result) {
          // Error en la consulta SQL
          echo "Error: " . mysqli_error($connection);
      } else {
          // Verificar si el nombre de usuario ya está en uso
          if (mysqli_num_rows($verifyAdmin_result) > 0) {
              // El nombre de usuario ya está en uso
              header('Location: registerAdmin-form.php?name=true');
              exit;
          }

       // Insertamos el registro en la base de datos
       $register = "INSERT INTO admins(adminName, adminEmail, adminPassword ) VALUES ('$name', '$email', '$password')";

       if($connection->query($register) == TRUE) {
        //Redirigir al usuario a la página de inicio de sesión
        header("Location: login-form.php?register=true"); //así mandamos la info de que se ha registrado correctamente
        //Salir del script para evitar que se ejecute más código
        exit(); //
        }else{
        //Si hay un error en la consulta, mostrar el mensaje de error
        echo "Error: " .$register . "<br>" . $connection->error;
        }
    }
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
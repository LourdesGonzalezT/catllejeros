<?php
//Iniciamos o reanudamos la sesión
session_start();

//Borramos la información registrada de la sesión
session_destroy();

//Redirigimos al usuario a la página de inicio de sesión
header('Location: ../../login-form.php?logout=true');
?>
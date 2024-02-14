<?php
    session_start();
?>

<?php
//Llamamos al archivo que contine la conexión a la bbdd
require_once('../../connection/connection.php');

//Para validar el formulario y comprobar que el botón login ha sido pulsado
if(isset($_POST['btnLoginAdmin'])){

//Obtenemos los valores de los campos del login y los almacenamos en estas variables   
$email = $_POST["adminEmail"];
$password = $_POST["adminPassword"];

//Creamos la variable con la consulta
// $login = "SELECT * FROM admins WHERE adminEmail = '$email' AND adminPassword = '$password' ";
$login = "SELECT * FROM admins WHERE adminEmail = '$email'";

//Ejecutamos la consulta
$result = $connection->query($login);

//Vemos cuántas filas nos saca la consulta
$number_registers = mysqli_num_rows($result);

//Condicional para saber si hay registros(distinto de cero)
if($result->num_rows > 0){
    //Obtiene la siguiente fila de resultados como un array asociativo
    $data = $result->fetch_assoc();
    //Verifica si la contraseña proporcionada coincide con la contraseña almacenada en la base de datos
    if(password_verify($password, $data['adminPassword'])){
        //Si la contraseña es correcta, inicia sesión y redirige a la página de inicio
        //Establece la variable de sesión 'logeddin' coomo verdadera
        $_SESSION['loggedin'] = true;
        //Almacena el nombre de usuario en la variable de sesión 'name'
        $_SESSION['name'] = $data['adminName'];
        header("Location: ../../index.php");
        exit();
    }else {
        // echo "Usuario no encontrado";
        header("Location: ../../login-form.php?errorPassword=true");
    }

}else {
    echo "Usuario no encontrado";
}
}

?>















<!-- 

//Inicia o se reanuda la sesión
session_start();
//Usuario y contraseña de ejemplo
$usuario_valido = 'admin';
$pass_valido = 'admin';

//Almacenamos los datos del formulario en variables
if(isset($_POST['enviar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

//Verificamos el password y la contraseña
    if($username === $usuario_valido && $password === $pass_valido){
//Creamos unos valores de inicio de sesión
        $_SESSION['nombre'] = 'Lourdes';
        $_SESSION['mensaje'] = 'Hola, este es un mensaje de prueba';
//Publico un mensaje de bienvenida al usuario 
        // echo "Hola, " . $_SESSION['nombre'] . "te has conectado corectamente.";
        header('Location: index.php');
    }else {

    //Si no mete los valores correctos se lanza un mensaje de error
        echo "Credenciales no válidas.";
    }
} -->
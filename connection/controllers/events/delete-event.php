<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
?>

<?php
include "../../connection/connection.php";

if(!empty($_GET['id_oneEvent'])){
    $id_oneEvent=$_GET['id_oneEvent'];
// Recogemos la id, a través del método GET que se ha enviado al pulsar el botón eliminar

    if($connection) {
        //le decimos que de esa id, que borre todos los campos para lo cual tenemos que hacer una consulta que será de borrado (DELETE)
    $delete=$connection->query("DELETE FROM events WHERE
    eventId=$id_oneEvent");
        //Hacemos un if para validar si la consulta se realizó correctamente o no
    if($delete==1){
        echo '<div class="alert alert-success"> evento borrado
correctamente</div>';
        // Aquí estamos realizando una redireccion refrescando todo para volver a un index limpio.
        header("refresh:4; url=../../index.php");
        }else{
            echo '<div class="alert alert-danger"> Error al borrar
    evento</div>';
        }
    } else {
        echo '<div class="alert alert-danger"> Error de conexión</div>';
    }
}
?>
<script>
    history.replaceState(null,null,location.pathname);
</script>
<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
?>

<?php
include "../../connection/connection.php";

if(!empty($_GET['id_oneCat'])){
    $id_oneCat=$_GET['id_oneCat'];
// Recogemos la id, a través del método GET que se ha enviado al pulsar el botón eliminar

    if($connection) {
        //le decimos que de esa id, que borre todos los campos para lo cual tenemos que hacer una consulta que será de borrado (DELETE)
    $deleteCat=$connection->query("DELETE FROM cats WHERE
    catId=$id_oneCat");
        //Hacemos un if para validar si la consulta se realizó correctamente o no
    if($deleteCat==1){
        echo '<div class="alert alert-success"> gato borrado
correctamente</div>';
        // Aquí estamos realizando una redireccion refrescando todo para volver a un index limpio.
        header("refresh:4; url=../../index.php");
        }else{
            echo '<div class="alert alert-danger"> Error al borrar
    gato</div>';
        }
    } else {
        echo '<div class="alert alert-danger"> Error de conexión</div>';
    }
}
?>
<script>
    history.replaceState(null,null,location.pathname);
</script>
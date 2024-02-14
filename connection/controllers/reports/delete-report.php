<?php
include "../../connection/connection.php";

if(!empty($_GET['id_oneReport'])){
    $id_oneReport=$_GET['id_oneReport'];
// Recogemos la id, a través del método GET que se ha enviado al pulsar el botón eliminar

    if($connection) {
        //le decimos que de esa id, que borre todos los campos para lo cual tenemos que hacer una consulta que será de borrado (DELETE)
    $delete=$connection->query("DELETE FROM reports WHERE
    reportId=$id_oneReport");
        //Hacemos un if para validar si la consulta se realizó correctamente o no
    if($delete==1){
        echo '<div class="alert alert-success"> noticia borrada
correctamente</div>';
        // Aquí estamos realizando una redireccion refrescando todo para volver a un index limpio.
        header("refresh:4; url=../../index.php");
        }else{
            echo '<div class="alert alert-danger"> Error al borrar
    noticia</div>';
        }
    } else {
        echo '<div class="alert alert-danger"> Error de conexión</div>';
    }
}
?>
<script>
    history.replaceState(null,null,location.pathname);
</script>
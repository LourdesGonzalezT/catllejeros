<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if (isset($_POST["btneditEvent"])) {
    $event_Id = $_POST['eventId'];
    $eventImage_path = $_POST['eventImage_path'];
    $eventName = $_POST["eventName"];
    $eventDate = $_POST["eventDate"];
    $eventAddress = $_POST["eventAddress"];
    $eventDescription = $_POST["eventDescription"];
    
    // Variables que hacen referencia a la imagen
    $eventImage = $_FILES["eventImage"]["tmp_name"];
    $imgEventName = $_FILES["eventImage"]["name"];
    $imgEventType = strtolower(pathinfo($imgEventName, PATHINFO_EXTENSION));
    $imgDirectory = "images/eventsImages/";

    if(is_file($eventImage)) {
        if($imgEventType == "jpg" or $imgEventType == "jpeg" or $imgEventType == "png" or $imgEventType == "webp") {
            // Borramos la imagen anterior
            unlink($eventImage_path);
            // Almacenamos la imagen en la carpeta
            $new_eventImgPath = $imgDirectory . $event_Id . '-'. $imgEventName;

            if(move_uploaded_file($eventImage, $new_eventImgPath)){
                // Almacenamos la imagen en la base de datos
                $edit = $connection->query("UPDATE events SET eventName='$eventName', eventDate = '$eventDate', eventAddress='$eventAddress', eventDescription='$eventDescription', eventImage_path='$new_eventImgPath' WHERE eventId='$event_Id' ");

                if($edit == 1) {
                    echo "<div class='alert alert-success'>Evento modificado con éxito</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error al modificar imagen</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Error al subir imagen</div>";
            }
        } else {
            echo "<div id='mensaje' class='alert alert-danger'>Formato de imagen no válido</div>";
        }
    } else {
        // No se subió una nueva imagen, solo actualizar otros campos
        $edit = $connection->query("UPDATE events SET eventName='$eventName', eventDate = '$eventDate', eventAddress='$eventAddress', eventDescription='$eventDescription' WHERE eventId='$event_Id' ");
        if ($edit == 1) {
            echo "<div id='mensaje' class='alert alert-success'>¡Evento modificado con éxito!</div>";
            header("Location: index.php");
        } else {
            echo "<div id='mensaje' class='alert alert-danger'>Error al modificar el evento</div>";
        }
    }
}
?>
<!-- Para que no nos envíe otra vez el formulario cuando recargemos la página y tengamos un elemento duplicado -->
<!-- <script>
    history.replaceState(null, null, location.pathname);
</script> -->
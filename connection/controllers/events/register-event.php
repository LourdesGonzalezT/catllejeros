<?php 
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);
?>
<?php
if(isset($_POST["btnRegisterEvent"])){
    // Aseguramos que los campos no estén vacíos (excepto la imagen)
    if(!empty($_POST["eventName"]) AND !empty($_POST["eventDate"]) AND !empty($_POST["eventAddress"]) AND !empty($_POST["eventDescription"])) {
        // Recogemos los campos del formulario en variables
        $eventName = $_POST["eventName"];
        $eventDate = $_POST["eventDate"];
        $eventAddress = $_POST["eventAddress"];
        $eventDescription = $_POST["eventDescription"];
        
        // Verificamos si se proporcionó una imagen
        if(isset($_FILES["eventImage"]) && $_FILES["eventImage"]["error"] == UPLOAD_ERR_OK) {
            // Variables que hacen referencia a la imagen
            $eventImage = $_FILES["eventImage"]["tmp_name"];
            $imgEventName = $_FILES["eventImage"]["name"];
            $imgEventType = strtolower(pathinfo($imgEventName, PATHINFO_EXTENSION));
            $imgDirectory = "images/eventsImages/";
            
            // Establecemos los formatos admitidos
            if($imgEventType == "jpg" || $imgEventType == "jpeg" || $imgEventType == "png" || $imgEventType == "webp" ) {
                // Insertamos el registro en la base de datos
                $register = $connection->query("INSERT INTO events(eventName, eventDate, eventAddress, eventDescription, eventImage_path) VALUES ('$eventName', '$eventDate', '$eventAddress','$eventDescription', '')");
                
                if($register){
                    // Obtenemos el id del nuevo registro
                    $idRegister = $connection->insert_id;
    
                    // Construimos la ruta de la imagen
                    $eventImage_path = $imgDirectory . $idRegister .'-'. $imgEventName;
                    
                    // Actualizamos la ruta de la imagen en la base de datos
                    $updateEventImage = $connection->query("UPDATE events SET eventImage_path='$eventImage_path' WHERE eventId='$idRegister'");
                    
                    if($updateEventImage){
                        // Movemos la imagen al servidor
                        if (move_uploaded_file($eventImage, $eventImage_path)) {
                            echo "<div class='alert alert-success'>Felicidades, evento registrado con éxito</div>";
                        } else {
                            echo "<div class='alert alert-warning'>Error al mover el archivo</div>";
                        }
                    } else {
                        echo "<div class='alert alert-warning'>Error al actualizar la ruta en la base de datos</div>";
                    }
                } else {
                    echo "<div class='alert alert-warning'>Error al registrar el evento</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Por favor, introduce un formato de imagen válido</div>";
            }
        } else {
            // Si no se proporcionó una imagen, insertamos el registro pero sin nada relativo a la imagen
            $register = $connection->query("INSERT INTO events(eventName, eventDate, eventAddress, eventDescription) VALUES ('$eventName', '$eventDate', '$eventAddress','$eventDescription')");
            
            if($register){
                echo "<div class='alert alert-success'>Felicidades, evento registrado con éxito</div>";
            } else {
                echo "<div class='alert alert-warning'>Error al registrar el evento</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger'>Por favor, completa todos los campos</div>";
    }
}
?>
<!-- Script para que no aparezca la ventana de enviar. Para que no nos envíe otra vez el formulario cuando recargemos la página y tengamos un elemento duplicado-->
<script>
history.replaceState(null, null, location.pathname);
</script>
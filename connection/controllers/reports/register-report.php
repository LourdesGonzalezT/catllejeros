<?php 
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);
?>

<?php
if(isset($_POST["btnRegisterReport"])){
    //Aseguramos que los campos no estén vacíos (excepto la imagen)
    if(!empty($_POST["title"]) AND !empty($_POST["reportDate"]) AND !empty($_POST["information"])) {
        // Recogemos los campos del formulario en variables
        $title = $_POST["title"];
        $reportDate = $_POST["reportDate"];
        $information = $_POST["information"];
        
          // Verificamos si se proporcionó una imagen
          if(isset($_FILES["reportImage"]) && $_FILES["reportImage"]["error"] == UPLOAD_ERR_OK) {
        // Variables que hacen referencia a la imagen
        $reportImage = $_FILES["reportImage"]["tmp_name"];
        $imgReportName = $_FILES["reportImage"]["name"];
        $imgReportType = strtolower(pathinfo($imgReportName, PATHINFO_EXTENSION));
        $imgDirectory = "images/reportsImages/";
        
        // Establecemos los formatos admitidos
        if($imgReportType == "jpg" || $imgReportType == "jpeg" || $imgReportType == "png" || $imgReportType == "webp" ) {
            // Insertamos el registro en la base de datos
            $register = $connection->query("INSERT INTO reports(title, reportDate, information, reportImage_path) VALUES ('$title', '$reportDate', '$information', '')");
            
            if($register){
                // Obtenemos el id del nuevo registro
                $idRegister = $connection->insert_id;

                // Construimos la ruta de la imagen
                $reportImage_path = $imgDirectory . $idRegister .'-'. $imgReportName;
                
                // Actualizamos la ruta de la imagen en la base de datos
                $updateReportImage = $connection->query("UPDATE reports SET reportImage_path='$reportImage_path' WHERE reportId='$idRegister'");
                
                if($updateReportImage){
                    // Movemos la imagen al servidor
                    if (move_uploaded_file($reportImage, $reportImage_path)) {
                        echo "<div class='alert alert-success'>Felicidades, noticia registrada con éxito</div>";
                    } else {
                        echo "<div class='alert alert-warning'>Error al mover el archivo</div>";
                    }
                } else {
                    echo "<div class='alert alert-warning'>Error al actualizar la ruta en la base de datos</div>";
                }
            } else {
                echo "<div class='alert alert-warning'>Error al registrar la noticia</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Por favor, introduce un formato de imagen válido</div>";
        }
    } else {
        // Si no se proporcionó una imagen, insertamos el registro pero sin nada relativo a la imagen
        $register = $connection->query("INSERT INTO reports(title, reportDate, information) VALUES ('$title', '$reportDate', '$information')");
        if($register){
            echo "<div class='alert alert-success'>Felicidades, noticia registrada con éxito</div>";
        } else {
            echo "<div class='alert alert-warning'>Error al registrar la noticia</div>";
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

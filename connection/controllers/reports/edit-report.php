<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if (isset($_POST["btneditReport"])) {
    $report_id = $_POST['reportId'];
    $reportImage_path = $_POST['reportImage_path'];
    $title = $_POST["title"];
    $reportDate = $_POST["reportDate"];
    $information = $_POST["information"];
    
    // Variables que hacen referencia a la imagen
    $reportImage = $_FILES["reportImage"]["tmp_name"];
    $imgReportName = $_FILES["reportImage"]["name"];
    $imgReportType = strtolower(pathinfo($imgReportName, PATHINFO_EXTENSION));
    $imgDirectory = "images/reportsImages/";

    if(is_file($reportImage)) {
        if($imgReportType == "jpg" or $imgReportType == "jpeg" or $imgReportType == "png" or $imgReportType == "webp") {
            // Borramos la imagen anterior
            unlink($reportImage_path);
            // Almacenamos la imagen en la carpeta
            $new_reportImgPath = $imgDirectory . $report_id . '-'. $imgReportName;

            if(move_uploaded_file($reportImage, $new_reportImgPath)){
                // Almacenamos la imagen en la base de datos
                $edit = $connection->query("UPDATE reports SET title='$title', reportDate = '$reportDate',  information='$information', reportImage_path='$new_reportImgPath' WHERE reportId='$report_id' ");

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
        $edit = $connection->query("UPDATE reports SET title='$title', reportDate = '$reportDate',  information='$information' WHERE reportId='$report_id' ");
        if ($edit == 1) {
            echo "<div id='mensaje' class='alert alert-success'>¡Noticia modificado con éxito!</div>";
            header("Location: index.php");
        } else {
            echo "<div id='mensaje' class='alert alert-danger'>Error al modificar la noticia</div>";
        }
    }
}
?>
<!-- Para que no nos envíe otra vez el formulario cuando recargemos la página y tengamos un elemento duplicado -->
<!-- <script>
    history.replaceState(null, null, location.pathname);
</script> -->
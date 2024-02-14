<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include "header.php";
include "controllers/reports/edit-report.php";
?>

<?php 
    
            $id_oneReport = $_GET['id_oneReport'];
            $sql = $connection->query("SELECT * FROM reports WHERE reportId = '$id_oneReport'");
            ?>
<main class="main-details">

    <!-- Report details -->
    <div class="container-fluid p-4">
        <div class="container">
        <?php while($data = $sql->fetch_object()) { ?>
        <div class="card mb-3 p-5">
            <div class="row g-2">
                <div class="col-md-6">
                    <div class="card-body p-4">
                        <h5 class="card-title"><?=$data->title?></h5>
                        <p class="card-text"><?=$data->information?></p>
                        <p class="card-text"><small class="text-body-secondary"><?=$data->reportDate?></small></p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editReport">
                            Editar
                        </button>
                        <a onclick="return confirmaBorrar()"
                            href="controllers/reports/delete-report.php?id_oneReport=<?= $data->reportId ?>"
                            class="btn btn-danger">Borrar</a>
                        <script>
                        function confirmaBorrar() {
                            respuesta = confirm("¿Estás seguro de que quieres eliminar la noticia?");
                            return respuesta;
                        }
                        </script>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src=<?=$data->reportImage_path?>  class="img-fluid rounded" alt="...">
                </div>
            </div>
        </div>
        <?php 
            }
         ?>
        </div>
       
    </div>
    <!-- Report details end -->

    <?php include "reports-section.php"; ?>

    <!-- FORMULARIO PARA EDITAR NOTICIAS-->
    <!-- Button trigger modal -->

    <?php if (isset($_GET['id_oneReport'])) {
        $idReportToEdit = $_GET['id_oneReport'];
        $sqlReportToEdit = $connection->query("SELECT * FROM reports WHERE reportId = '$idReportToEdit'");
    ?>
    <!-- Modal -->
    <div class="modal fade" id="editReport" tabindex="-1" aria-labelledby="editReportLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editReportForm">Formulario para editar noticia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php while($dataReport = $sqlReportToEdit->fetch_object()){ ?>
                    <form class="row g-3" action="" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="reportId" value="<?=$dataReport->reportId?>">
                        <input type="hidden" value="<?=$dataReport->reportImage_path ?>" name="reportImage_path">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Título de la noticia</label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="<?=$dataReport->title ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="reportDate" class="form-label">Fecha</label>
                            <input type="date" class="form-control" name="reportDate" id="reportDate"
                                value="<?=$dataReport->reportDate ?>">
                        </div>
                        <div class="col-12">
                            <label for="information" class="form-label">Descripción de la noticia</label>
                            <textarea class="form-control" name="information" id="information" cols="30"
                                rows="3"><?=$dataReport->information ?></textarea>
                        </div>
                        <div class="col-12">
                            <label for="reportImage" class="form-label">Imagen de la noticia</label>
                            <img src="<?= $dataReport->reportImage_path ?>" alt="Imagen actual" style="max-width: 30%;">
                            <input type="file" class="form-control" name="reportImage" id="reportImage">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" name="btneditReport">Editar Noticia</button>
                        </div>
                    </form>
                </div>
                <?php } ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

</main>
<?php
include "footer.php"
?>
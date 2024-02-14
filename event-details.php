<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include "header.php";
include "controllers/events/edit-event.php";
?>
<?php
    $id_oneEvent = $_GET['id_oneEvent'];
    $sql = $connection->query("SELECT * FROM events WHERE eventId = '$id_oneEvent'");
            ?>

<main class="main-details">
    <div class="container-fluid p-4">
        <div class="container">
            <?php while($data = $sql->fetch_object()){ ?>
                <div class="card mb-3 p-5">
            <div class="row g-2">
                <div class="col-md-6">
                        <img src="<?= $data->eventImage_path ?>" class="img-fluid rounded" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"><?=$data->eventName?></h5>
                            <h2 class="card-title"><?= (new DateTime($data->eventDate))->format('d-m-Y') ?></h2>
                            <h2 class="card-title"><?=$data->eventAddress ?></h2>
                            <p class="card-text"><?=$data->eventDescription ?></p>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editEvent">
                                Editar
                            </button>
                            <a onclick="return confirmaBorrar()"
                                href="controllers/events/delete-event.php?id_oneEvent=<?= $data->eventId ?>"
                                class="btn btn-danger">Eliminar</a>
                            <script>
                            function confirmaBorrar() {
                                respuesta = confirm("¿Estás seguro de que quieres eliminar la noticia?");
                                return respuesta;
                            }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            }
         ?>
        </div>
    </div>

    <?php include "events-section.php"; ?>


    <!-- FORMULARIO PARA EDITAR EVENTOS -->
    <!-- Button trigger modal -->

    <?php if (isset($_GET['id_oneEvent'])) {
        $idEventToEdit = $_GET['id_oneEvent'];
        $sqlEventToEdit = $connection->query("SELECT * FROM events WHERE eventId = '$idEventToEdit'");
    ?>
    <!-- Modal -->
    <div class="modal fade" id="editEvent" tabindex="-1" aria-labelledby="editEventLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editEventForm">Formulario para editar evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php while($dataEvent = $sqlEventToEdit->fetch_object()){ ?>
                    <form class="row g-3" action="" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="eventId" value="<?=$dataEvent->eventId?>">
                        <input type="hidden" value="<?=$dataEvent->eventImage_path ?>" name="eventImage_path">
                        <div class="col-md-6">
                            <label for="eventName" class="form-label">Nombre del evento</label>
                            <input type="text" class="form-control" name="eventName" id="eventName"
                                value="<?=$dataEvent->eventName ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="eventDate" class="form-label">Fecha</label>
                            <input type="date" class="form-control" name="eventDate" id="eventDate"
                                value="<?=$dataEvent->eventDate ?>">
                        </div>
                        <div class="col-12">
                            <label for="eventAddress" class="form-label">Dirección del evento</label>
                            <input type="text" class="form-control" name="eventAddress" id="eventAddress"
                                value="<?=$dataEvent->eventAddress ?>">
                        </div>
                        <div class="col-12">
                            <label for="eventDescription" class="form-label">Descripción del evento</label>
                            <textarea class="form-control" name="eventDescription" id="eventDescription" cols="30"
                                rows="3"><?=$dataEvent->eventDescription ?></textarea>
                        </div>
                        <div class="col-12">
                            <label for="eventImage" class="form-label">Imagen del evento</label>
                            <img src="<?= $dataEvent->eventImage_path ?>" alt="Imagen actual" style="max-width: 30%;">
                            <input type="file" class="form-control" name="eventImage" id="eventImage">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" name="btneditEvent">Editar evento</button>
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
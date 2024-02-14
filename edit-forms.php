<?php
include "header.php";
 ?>
<?php 
    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);
?>
<?php
include "controllers/cats/register-cat.php";
include "controllers/reports/register-report.php";
include "controllers/events/register-event.php";
include "controllers/admins/register-admin.php";
?>

<main>
    <h1>
    Esta es la página para editar cositas
    </h1>
    <!-- FORMULARIO REGISTRO DE GATOS -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerCat">
    Registrar gato
</button>

<!-- Modal -->
<div class="modal fade" id="registerCat" tabindex="-1" aria-labelledby="registerCatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registerCatForm">Formulario de registro de gatetes</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="" enctype="multipart/form-data" method="POST">
                    <div class="col-12">
                        <label for="catName" class="form-label">Nombre del gatete</label>
                        <input type="text" class="form-control" name="catName" id="catName">
                    </div>
                    <div class="col-md-6">
                        <label for="age" class="form-label">Edad</label>
                        <input type="text" class="form-control" name="age" id="age">
                    </div>

                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="macho">
                            <label class="form-check-label" for="macho">
                                Macho
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="hembra" checked>
                            <label class="form-check-label" for="hembra">
                                Hembra
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="aboutCat" class="form-label">Información del gatete</label>
                        <textarea class="form-control" name="aboutCat" id="aboutCat" cols="30" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="image1" class="form-label">Imagen1 del gatete</label>
                        <input type="file" class="form-control" name="image1" id="image1">
                    </div>
                    <div class="col-12">
                        <label for="image2" class="form-label">Imagen2</label>
                        <input type="file" class="form-control" name="image2" id="image2">
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="btnRegisterCat">Registrar gatete</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- FORMULARIO REGISTRO DE NOTICIAS -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerReport">
    Registrar Noticia
</button>

<!-- Modal -->
<div class="modal fade" id="registerReport" tabindex="-1" aria-labelledby="registerReportLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registerReportForm">Formulario de registro de noticias</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="" enctype="multipart/form-data" method="POST">
                    <div class="col-md-6">
                        <label for="title" class="form-label">Título de la noticia</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="col-md-6">
                        <label for="reportDate" class="form-label">Fecha</label>
                        <input type="date" class="form-control" name="reportDate" id="reportDate">
                    </div>
                    <div class="col-12">
                        <label for="information" class="form-label">Información de la noticia</label>
                        <textarea class="form-control" name="information" id="information" cols="30" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="reportImage" class="form-label">Imagen de la noticia</label>
                        <input type="file" class="form-control" name="reportImage" id="reportImage">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="btnRegisterReport">Registrar noticia</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- FORMULARIO REGISTRO DE EVENTOS -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerEvent">
    Editar 
</button>

<!-- Modal -->
<div class="modal fade" id="registerEvent" tabindex="-1" aria-labelledby="registerEventLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registerEventForm">Formulario de registro de eventos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="" enctype="multipart/form-data" method="POST">
                    <div class="col-md-6">
                        <label for="eventName" class="form-label">Nombre del evento</label>
                        <input type="text" class="form-control" name="eventName" id="eventName">
                    </div>
                    <div class="col-md-6">
                        <label for="eventDate" class="form-label">Fecha</label>
                        <input type="date" class="form-control" name="eventDate" id="eventDate">
                    </div>
                    <div class="col-12">
                        <label for="eventAddress" class="form-label">Dirección del evento</label>
                        <input type="text" class="form-control" name="eventAddress" id="eventAddress">
                    </div>
                    <div class="col-12">
                        <label for="eventDescription" class="form-label">Descripción del evento</label>
                        <textarea class="form-control" name="eventDescription" id="eventDescription" cols="30" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="eventImage" class="form-label">Imagen del evento</label>
                        <input type="file" class="form-control" name="eventImage" id="eventImage">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="btnRegisterEvent">Registrar evento</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO REGISTRO DE ADMMINISTRADORES -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerAdmin">
    Registrar Administrador
</button>

<!-- Modal -->
<div class="modal fade" id="registerAdmin" tabindex="-1" aria-labelledby="registerAdminLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registerAdminForm">Formulario de registro de administrador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="" enctype="multipart/form-data" method="POST">
                    <div class="col-12">
                        <label for="adminName" class="form-label">Nombre de Administrador</label>
                        <input type="text" class="form-control" name="adminName" id="adminName">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="col-12">
                        <label for="adminPassword" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="adminPassword" id="adminPassword">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="btnRegisterAdmin">Registrar Administrador</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


</main>

<?php
include "footer.php"
 ?>
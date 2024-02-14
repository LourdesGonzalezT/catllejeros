<?php 
session_start();
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
?>


<main class="main-registers">
    <div class="container-register">
        <div class="row text-center">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-lg-4 g-2 container-registerCards">
                <div class="col col-md-4 card-container">
                    <div class="card h-100">
                        <img src="images\imgWeb\catRegister.jpg" class="card-img-top" alt="cat-avatar">
                        <div class="card-body">
                            <h5 class="card-title">Formulario para registrar gat@</h5>
                            <button type="button" class="btn registerbtn" data-bs-toggle="modal"
                                data-bs-target="#registerCat">
                                Registrar Gato
                            </button>

                        </div>
                    </div>
                </div>
                <div class="col col-md-4 card-container">
                    <div class="card h-100">
                        <img src="images\imgWeb\cat-toys.jpg" class="card-img-top" alt="cat avatar with toys">
                        <div class="card-body">
                            <h5 class="card-title">Formulario para registrar eventos</h5>
                            <button type="button" class="btn registerbtn" data-bs-toggle="modal"
                                data-bs-target="#registerEvent">
                                Registrar Evento
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col col-md-4 card-container">
                    <div class="card h-100">
                        <img src="images\imgWeb\paperCat.jpg" class="card-img-top" alt="cat-avatar">
                        <div class="card-body">
                            <h5 class="card-title">Formulario para registrar noticias</h5>
                            <button type="button" class="btn registerbtn" data-bs-toggle="modal"
                                data-bs-target="#registerReport">
                                Registrar Noticia
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- FORMULARIO REGISTRO DE GATOS -->
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
                                <input class="form-check-input" type="radio" name="sex" id="macho" value="macho">
                                <label class="form-check-label" for="macho">
                                    Macho
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="hembra" value="hembra">
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
                            <button type="submit" class="btn registerbtn" name="btnRegisterCat">Registrar
                                gatete</button>
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
                            <textarea class="form-control" name="eventDescription" id="eventDescription" cols="30"
                                rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="eventImage" class="form-label">Imagen del evento</label>
                            <input type="file" class="form-control" name="eventImage" id="eventImage">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn registerbtn" name="btnRegisterEvent">Registrar
                                evento</button>
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
                            <textarea class="form-control" name="information" id="information" cols="30"
                                rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="reportImage" class="form-label">Imagen de la noticia</label>
                            <input type="file" class="form-control" name="reportImage" id="reportImage">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn registerbtn" name="btnRegisterReport">Registrar
                                noticia</button>
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
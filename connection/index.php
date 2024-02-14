<?php 
session_start();
include "header-index.php"; ?>
<?php
 $sqlCats=$connection->query("SELECT * FROM cats ORDER BY catId DESC");
 $sqlReports=$connection->query("SELECT * FROM reports");
 $sqlEvents=$connection->query("SELECT * FROM events ORDER BY eventId DESC");
 ?>
<!-- Aquí termina el header y empieza el contenido ppal -->
<main class="main-index">
    <!-- Welcome Section -->
    <section>
    <!-- <?= $_SESSION['name'] ?> -->
    <!-- <?= isset($_SESSION) ? $_SESSION['name'] : ''?> -->
        <div class="container-fluid py-6 my-6 mt-4">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="text-center">
                            <small class="pill rounded-pill px-4 py-1" id="home">Bienvenid@</small>
                        </div>
                        <h1 class="display-1 mb-4 animated bounceInDown">En la asociación <span
                                class="brandWelcome1">Cat</span><span class="brandWelcome2">llejeros</span> intentamos
                            mejorar la vida de los gatos de la
                            calle</h1>
                        <a href=""
                            class="btn helpbtn border-0 rounded-pill py-3 px-4 px-md-5 me-4 animated bounceInLeft">Ayúdanos</a>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <img src="images/imgWeb/cat1.webp" class="img-fluid rounded animated zoomIn" alt="image-cats">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Section End -->

   <?php include "cats-section.php"; ?>

   <?php include "events-section.php"; ?>

   <?php include "reports-section.php"; ?>

    <section id="services-section">
        <!-- Service Start -->
        <div class="container p-2">
            <div class="container p-3 service">
                <div class="text-center">
                    <small class="pill rounded-pill px-4 py-1">Nuestros
                        servicios</small>
                    <h1 class="display-5 mb-5">¿Qué hacemos?</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="bg-light rounded service-item">
                            <div class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-icon text-center">
                                    <img class="serviceIcon mb-4" src="images/icons/shieldCat-icon.svg" alt="">
                                    <h4 class="mb-3">Gestión CER</h4>
                                    <p class="mb-4">Capturar-Esterilizar-Retornar gatos callejeros</p>
                                    <a href="#" class="btn serviceInfo px-4 py-2 rounded-pill">Más info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.3s">
                        <div class="bg-light rounded service-item">
                            <div class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-icon text-center">
                                    <img class="serviceIcon mb-4" src="images/icons/paw-icon.svg" alt="">
                                    <h4 class="mb-3">Casas de Acogida</h4>
                                    <p class="mb-4">Contamos con casas de acogida para proteger gatos con necesidades
                                    </p>
                                    <a href="#" class="btn serviceInfo px-4 py-2 rounded-pill">Más info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.5s">
                        <div class="bg-light rounded service-item">
                            <div class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-icon text-center">
                                    <img class="serviceIcon mb-4" src="images/icons/hand-icon.svg" alt="">
                                    <h4 class="mb-3">Adopción Responsable</h4>
                                    <p class="mb-4">Gestionamos adopciones para que los gatitos lleguen a un hogar
                                        ideal.</p>
                                    <a href="#" class="btn serviceInfo px-4 py-2 rounded-pill">Más info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.7s">
                        <div class="bg-light rounded service-item">
                            <div class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-icon text-center">
                                    <img class="serviceIcon mb-4" src="images/icons/medical-icon.svg" alt="">
                                    <h4 class="mb-3">Servicios Veterinarios</h4>
                                    <p class="mb-4">Contamos con importantes convenios con centros veterinarios
                                        colaboradores</p>
                                    <a href="#" class="btn serviceInfo px-4 py-2 rounded-pill">Más info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Start -->
    <section id="contact-section">
        <div class="container p-3">
            <div class="container">
                <div class="text-center">
                    <small class="pill rounded-pill px-4 py-1">contacto</small>
                    <div class="container-fluid py-6 my-6 mb-0 bg-light">
                        <div class="container">
                            <div class="row g-4 d-flex justify-content-center align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="">
                                        <h3><span class="brandWelcome1">Cat</span><span
                                                class="brandWelcome2">llejeros</span>
                                        </h3>
                                        <p class="lh-lg mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Odit
                                            quae
                                            mollitia modi, doloremque, natus voluptas tempore ea totam facilis
                                            architecto
                                            excepturi
                                            odio.</p>
                                        <div class="icons-container">
                                            <a class="btn socialBtn btn-sm-square me-2 rounded-circle" href="">
                                                <img src="images/icons/facebook.svg" alt="">
                                            </a>
                                            <a class="btn socialBtn btn-sm-square me-2 rounded-circle" href="">
                                                <img src="images/icons/instagram.svg" alt="">
                                            </a>
                                            <a class="btn socialBtn btn-sm-square me-2 rounded-circle" href="">
                                                <img src="images/icons/x-twitter.svg" alt="">
                                            </a>
                                            <a class="btn socialBtn btn-sm-square me-2 rounded-circle" href="">
                                                <img src="images/icons/linkedin.svg" alt="">
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="">
                                        <div class="d-flex flex-column contact-data">
                                            <p><img class="contact-icon" src="images/icons/location.svg" alt=""> Calle
                                                París, 5,
                                                Parla</p>
                                            <p><img class="contact-icon" src="images/icons/whatsapp.svg" alt=""> (+012)
                                                3456 7890 123</p>
                                            <p><img class="contact-icon" src="images/icons/envelope.svg" alt="">
                                                info@example.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact End -->
</main>


<?php
include "footer.php";
 ?>
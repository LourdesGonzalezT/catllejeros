 
 <?php  $sqlCats=$connection->query("SELECT * FROM cats ORDER BY catId DESC"); ?>
 
 <!-- Cats Section -->
 <section id="cats-section">
        <div class="container p-4 mt-4 mb-4">
            <div class="container-fluid bg-light py-6 my-6 mt-4 pb-5">
                <div class="text-center">
                    <small class="pill rounded-pill px-4 py-1">Gatos
                        en adopción</small>
                    <h3 class="display-5 mb-5">Estos son los zarpitas que están disponibles para adoptar</h3>
                </div>
                <div class="row g-4">
                    <?php while ($dataCats = $sqlCats->fetch_object()) { ?>
                    <div class="col-lg-3 col-md-6 cardCatsSection">
                        <div class="cat-item rounded">
                            <img class="img-fluid rounded-top" src="<?=$dataCats->image1_path ?>" alt="cat4">
                            <a href="cat-details.php?id_oneCat=<?= $dataCats->catId?>">
                                <div class="cat-textContent  py-3 rounded-bottom">
                                    <p class="cat-text">Nombre: <span class="cat-span"><?=$dataCats->catName ?></span>
                                    </p>
                                    <p class="cat-text mb-0">Edad: <?=$dataCats->age?> Sexo: <?=$dataCats->sex ?></p>
                                </div>
                            </a>

                            <div class="cat-icon d-flex flex-column justify-content-center m-4">
                                <a class="cat-link btn rounded-circle mb-2"
                                    href="cat-details.php?id_oneCat=<?= $dataCats->catId?>" class="card-link"
                                    name="btndetailsCats" value="ok"><img class="pow" src="images\icons\paw-solid.svg"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Cats Section End -->
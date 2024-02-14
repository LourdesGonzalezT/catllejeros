<?php  $sqlReports=$connection->query("SELECT * FROM reports");?>

   <!-- Sección de noticias -->
   <section id="reports-section">
        <div class="container p-4 mb-4">
            <div class="container p-3 mb-4 reports-section">
                <small class="pill rounded-pill px-4 py-1">Noticias</small>
                <div class="row g-4">
                    <?php while ($dataReports = $sqlReports->fetch_object()) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 cardReportsSection">
                        <a class= "report-card" href="report-details.php?id_oneReport=<?= $dataReports->reportId?>">
                            <div class="report-card">
                                <div class="text-box">
                                    <div class="image-box">
                                        <img src="<?=$dataReports->reportImage_path?>"
                                            alt="" />
                                    </div>
                                    <div class="text-container">
                                        <h6><?=$dataReports->title?></h6>
                                        <p><?=$dataReports->information?></p>
                                    </div>
                                </div>
                                <div class="card-link-wrapper">
                                    <a href="report-details.php?id_oneReport=<?= $dataReports->reportId?>"
                                        class="card-link btnReport" name="btndetailsReport" value="ok">Ver detalles</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
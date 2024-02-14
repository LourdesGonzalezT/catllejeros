  <?php $sqlEvents=$connection->query("SELECT * FROM events ORDER BY eventId DESC"); ?>
  
  <!-- SECCIÓN EVENTOS -->
  <section id="events-section">
        <div class="container p-2 mt-4 mb-4">
            <div class="container p-2 mt-4 mb-4">
            <div class="text-center">
                        <small class="pill rounded-pill px-4 py-1">Eventos</small>
                    </div>

                <div class="container-fluid eventContainer py-6 my-6 mt-0 pb-4">
                   
                    <ul class="events-cards">
                        <?php while ($dataEvents = $sqlEvents->fetch_object()) { ?>
                        <li class="eventCard">
                            <div>
                                <h3 class="card-title"><?=$dataEvents->eventName?></h3>
                                <div class="card-content">
                                    <p><?= (new DateTime($dataEvents->eventDate))->format('d-m-Y') ?></p>
                                </div>
                            </div>
                            <div class="card-link-wrapper">
                                <a href="event-details.php?id_oneEvent=<?= $dataEvents->eventId?>" class="card-link"
                                    name="btndetailsEvent" value="ok">Ver
                                    detalles</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section> 
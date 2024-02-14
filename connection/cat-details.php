<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include "header.php";
include "controllers/cats/edit-cat.php";
?>

<?php 
    
            $id_oneCat = $_GET['id_oneCat'];
            $sql = $connection->query("SELECT * FROM cats WHERE catId = '$id_oneCat'");
            ?>
<main class="main-details">
    <div class="container-details">
    <!-- Cat details start -->
    <div class="container-fluid p-4">
        <div class="container">
        <?php while($data = $sql->fetch_object()) { ?>
        <div class="card mb-3 p-5">
            <div class="row g-2 justify-content-center">
                <div class="col-md-4">
                    <img src="<?=$data->image1_path?>" class="img-fluid detailsImg rounded" alt="...">
                </div>
                 <div class="col-md-4">
                    <img src="<?=$data->image2_path?>" class="img-fluid detailsImg rounded" alt="...">
                </div>
                <div class="col-md-4">
                    <div class="card-body p-4">
                        <h5 class="card-title"><?=$data->catName?></h5>
                        <p class="card-text"><?=$data->aboutCat?></p>
                        <p class="card-text"><small class="text-body-secondary"><?=$data->age?></small></p>
                        <p class="card-text"><small class="text-body-secondary"><?=$data->sex?></small></p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCat">
                            Editar
                        </button>
                        <a onclick="return confirmaBorrar()"
                            href="controllers/cats/delete-cat.php?id_oneCat=<?= $data->catId ?>"
                            class="btn btn-danger">Borrar</a>
                        <script>
                        function confirmaBorrar() {
                            respuesta = confirm("¿Estás seguro de que quieres eliminar este gato de la base de datos?");
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
    <!-- Cat details end -->
    
       <!-- Cat details 2 start -->
    <!-- <div class="container-fluid p-4">
        <div class="container-details">
        <?php while($data = $sql->fetch_object()) { ?>
        <div class="card mb-3 p-5">
            <div class="row g-2">
                <div class="col-md-6">
                    <img src="<?=$data->image1_path?>" class="img-fluid detailsImg rounded" alt="...">
                </div>
                <div class="col-md-6">
                    <div class="card-body p-4">
                        <h5 class="card-title"><?=$data->catName?></h5>
                        <p class="card-text"><?=$data->aboutCat?></p>
                        <p class="card-text"><small class="text-body-secondary"><?=$data->age?></small></p>
                        <p class="card-text"><small class="text-body-secondary"><?=$data->sex?></small></p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCat">
                            Editar
                        </button>
                        <a onclick="return confirmaBorrar()"
                            href="controllers/cats/delete-cat.php?id_oneCat=<?= $data->catId ?>"
                            class="btn btn-danger">Borrar</a>
                        <script>
                        function confirmaBorrar() {
                            respuesta = confirm("¿Estás seguro de que quieres eliminar este gato de la base de datos?");
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
    </div> -->
    <!-- Cat details end -->



    <!-- About End -->
    <!-- FORMULARIO PARA EDITAR gatos -->
    <!-- Button trigger modal -->

    <?php if (isset($_GET['id_oneCat'])) {
        $idCatToEdit = $_GET['id_oneCat'];
        $sqlCatToEdit = $connection->query("SELECT * FROM cats WHERE catId = '$idCatToEdit'");
    ?>
    <!-- Modal -->
    <div class="modal fade" id="editCat" tabindex="-1" aria-labelledby="editCatLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editCatForm">Formulario para editar evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php while($dataCat = $sqlCatToEdit->fetch_object()){ ?>
                    <form class="row g-3" action="" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="catId" value="<?=$dataCat->catId?>">
                        <input type="hidden" value="<?=$dataCat->image1_path ?>" name="image1_path">
                        <input type="hidden" value="<?=$dataCat->image2_path ?>" name="image2_path">
                        <div class="col-12">
                            <label for="catName" class="form-label">Nombre del gatete</label>
                            <input type="text" class="form-control" name="catName" id="catName"
                                value="<?=$dataCat->catName ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="age" class="form-label">Edad</label>
                            <input type="text" class="form-control" name="age" id="age" value="<?=$dataCat->age ?>">
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="macho" value="macho" required>
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
                            <textarea class="form-control" name="aboutCat" id="aboutCat" cols="30"
                                rows="3"><?=$dataCat->aboutCat ?></textarea>
                        </div>
                        <div class="col-12">
                            <label for="image1" class="form-label">Imagen 1 del gatete</label>
                            <img src="<?= $dataCat->image1_path ?>" alt="Imagen actual" style="max-width: 30%;">
                            <input type="file" class="form-control" name="image1" id="image1">
                        </div>
                        <div class="col-12">
                            <label for="image2" class="form-label">Imagen 2 del gatete</label>
                            <img src="<?= $dataCat->image2_path ?>" alt="Imagen actual" style="max-width: 30%;">
                            <input type="file" class="form-control" name="image2" id="image2">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" name="btneditCat">Editar gato</button>
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
    </div>

    <div class="container-details">
    <?php include "cats-section.php"; ?>
        </div>

</main>

<?php
include "footer.php"
?>
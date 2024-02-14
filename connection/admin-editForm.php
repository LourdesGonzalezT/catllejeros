<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include "header.php"
?>
<?php
include "controllers/admins/edit-admin.php"
?>

<?php  $sqlAdmins=$connection->query("SELECT * FROM admins ORDER BY adminId DESC"); ?>

<main class="admins">
    <div class="container-fuid">
    <div class="row">
    <div class="col-sm-6">
        <?php if (isset($_GET['adminId'])) {
            // $id_oneAdmin = $_GET['adminId'];
            // $sql = $connection->query("SELECT * FROM admins WHERE adminId = $id_oneAdmin");
            while($data = $sql->fetch_object()){?>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?=$data->adminName?></h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editAdmin">
                                Editar
                            </button>
      </div>
    </div>
  </div>
  <?php 
            }
        } ?>
</div>
    </div>

    
    <!-- FORMULARIO PARA EDITAR admins -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editAdmin">
        Editar
    </button>
    <?php if (isset($_GET['adminId'])) {
        $idAdminToEdit = $_GET['adminId'];
        $sqlAdminEdit = $connection->query("SELECT * FROM admins WHERE adminId = '$idAdminToEdit'");
    ?>
    <!-- Modal -->
    <div class="modal fade" id="editAdmin" tabindex="-1" aria-labelledby="editAdminLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editAdminForm">Formulario para editar Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php while($dataAdmin = $sqlAdminEdit->fetch_object()){ ?>
                    <form class="row g-3" action="" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="adminId" value="<?=$dataAdmin->adminId?>">
                        <div class="col-md-6">
                            <label for="adminName" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="adminName" id="adminName" value="<?=$dataAdmin->adminName ?>">
                        </div>
                        <div class="col-12">
                            <label for="adminEmail" class="form-label">Email</label>
                            <textarea class="form-control" name="adminEmail" id="adminEmail" cols="30"
                                rows="3"><?=$dataAdmin->adminEmail ?></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" name="btneditAdmin">Editar Admin</button>
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
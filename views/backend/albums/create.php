<?php
include '../../../header.php';

?>

<!-- Bootstrap form to create a new statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création nouveau Album</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/albums/create.php' ?>" method="post">
                <div class="form-group">
                    <label for="nomA">Nom de l'album</label>
                    <input id="nomA" name="nomA" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="dtSortieAlb">Date de sortie</label>
                    <input id="dtSortieA" name="dtSortieA" class="form-control" type="date" />
                </div>
                <div class="form-group">
                    <label for="nomLabelA">Nom du label</label>
                    <input id="nomLabelA" name="nomLabelA" class="form-control" type="text" />
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-moyen">List</a>
                    <button type="submit" class="btn btn-clair">Confirmer create ?</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include '../../../header.php';

?>

<!-- Bootstrap form to create a new statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création nouveau Groupe</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/groupes/create.php' ?>" method="post">
                <div class="form-group">
                    <label for="nomGp">Nom du groupe</label>
                    <input id="" name="nomGp" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="dtCreaGp">Date de création</label>
                    <input id="dtCreaGp" name="dtCreaGp" class="form-control" type="date" />
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
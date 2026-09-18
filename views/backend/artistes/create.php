<?php
include '../../../header.php';

?>

<!-- Bootstrap form to create a new statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création nouveau Artiste</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/artistes/create.php' ?>" method="post">
                <div class="form-group">
                    <label for="nomArt">Nom de l'artiste</label>
                    <input id="nomArt" name="nomArt" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="prenomArt">Prénom de l'artiste</label>
                    <input id="prenomArt" name="prenomArt" class="form-control" type="text" />
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
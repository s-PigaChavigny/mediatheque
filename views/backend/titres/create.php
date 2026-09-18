<?php
include '../../../header.php';

?>

<!-- Bootstrap form to create a new statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création d'un nouveau titre</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/titres/create.php' ?>" method="post">
                <div class="form-group">
                    <label for="NomTit">Nom du titre</label>
                    <input id="NomTit" name="NomTit" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="dureeTit">Durée du titre</label>
                    <input id="dureeTit" name="dureeTit" class="form-control" type="text" />
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
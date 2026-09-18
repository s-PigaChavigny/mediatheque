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
                <div class="form-group">
                    <label for="idArt">Artiste</label>
                    <select id="idArt" name="idArt" class="form-control">
                        <option value="">Sélectionnez un artiste</option>
                        <?php
                        $artistes = sql_select("ARTISTE", "*");

                        foreach($artistes as $artiste) { ?>
                            <option value="<?php echo $artiste['idArt']; ?>"><?php echo $artiste['nomArt'] . ' ' . $artiste['prenomArt']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="idGp">Groupe</label>
                    <select id="idGp" name="idGp" class="form-control">
                        <option value="">Sélectionnez un groupe</option>
                        <?php
                        $groupes = sql_select("GROUPE", "*");

                        foreach($groupes as $groupe) { ?>
                            <option value="<?php echo $groupe['idGp']; ?>"><?php echo $groupe['nomGp']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-success">Confirmer create ?</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include '../../../header.php';

if(isset($_GET['idAlb'])){
    $idAlb = $_GET['idAlb'];
    $nomA = sql_select("album", "nomA", "idAlb = $idAlb")[0]['nomA'];
    $dtSortieA = sql_select("album", "dtSortieA", "idAlb = $idAlb")[0]['dtSortieA'];
    $nomLabelA = sql_select("album", "nomLabelA", "idAlb = $idAlb")[0]['nomLabelA'];
    $idArt = sql_select("album", "idArt", "idAlb = $idAlb")[0]['idArt'];
    $idGp = sql_select("album", "idGp", "idAlb = $idAlb")[0]['idGp'];
}
?>

<!-- Bootstrap form to edit a statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edition Album</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to edit a  statut -->
            <form action="<?php echo ROOT_URL . '/api/albums/update.php' ?>" method="post">
                <div class="form-group">
                    <label for="idAlb">Id de l'album</label>
                    <input id="idAlb" name="idAlb" class="form-control" type="text" value="<?php echo($idAlb); ?>" readonly />
                    <label for="nomA">Nom de l'album</label>
                    <input id="nomA" name="nomA" class="form-control" type="text" value="<?php echo($nomA); ?>" />
                    <label for="dtSortieA">Date de sortie</label>
                    <input id="dtSortieA" name="dtSortieA" class="form-control" type="date" value="<?php echo($dtSortieA); ?>" />
                    <label for="nomLabelA">Nom du label</label>
                    <input id="nomLabelA" name="nomLabelA" class="form-control" type="text" value="<?php echo($nomLabelA); ?>" />
                    <label for="idGp">Groupe</label>
                    <select id="idArt" name="idArt" class="form-control">
                        <option value="">Sélectionnez un artiste</option>
                        <?php
                        $artistes = sql_select("ARTISTE", "*");
                        foreach($artistes as $artiste) { ?>
                            <option value="<?php echo $artiste['idArt']; ?>" <?php if($artiste['idArt'] == $idArt) echo 'selected'; ?>><?php echo $artiste['nomArt'] . ' ' . $artiste['prenomArt']; ?></option>
                        <?php } ?>
                    </select>
                    <label for="idGp">Groupe</label>
                    <select id="idGp" name="idGp" class="form-control">
                        <option value="">Sélectionnez un groupe</option>
                        <?php
                        $groupes = sql_select("GROUPE", "*");
                        foreach($groupes as $groupe) { ?>
                            <option value="<?php echo $groupe['idGp']; ?>" <?php if($groupe['idGp'] == $idGp) echo 'selected'; ?>><?php echo $groupe['nomGp']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-moyen">List</a>
                    <button type="submit" class="btn btn-clair">Confirmer edit ?</button>
                </div>
            </form>
        </div>
    </div>
</div>
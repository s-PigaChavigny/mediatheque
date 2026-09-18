<?php
include '../../../header.php';

if(isset($_GET['idArt'])){
    $idArt = $_GET['idArt'];
    $nomArt = sql_select("artiste", "nomArt", "idArt = $idArt")[0]['nomArt'];
    $prenomArt = sql_select("artiste", "prenomArt", "idArt = $idArt")[0]['prenomArt'];
    $idGp = sql_select("artiste", "idGp", "idArt = $idArt")[0]['idGp'];
    $nomGp = sql_select("groupe", "nomGp", "idGp = $idGp")[0]['nomGp'];
}
?>

<!-- Bootstrap form to edit a statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edition Artiste</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to edit a  statut -->
            <form action="<?php echo ROOT_URL . '/api/artistes/update.php' ?>" method="post">
                <div class="form-group">
                    <label for="idArt">Id de l'artiste</label>
                    <input id="idArt" name="idArt" class="form-control" type="text" value="<?php echo($idArt); ?>" readonly />
                    <label for="nomArt">Nom de l'artiste</label>
                    <input id="nomArt" name="nomArt" class="form-control" type="text" value="<?php echo($nomArt); ?>" />
                    <label for="prenomArt">Prénom de l'artiste</label>
                    <input id="prenomArt" name="prenomArt" class="form-control" type="text" value="<?php echo($prenomArt); ?>" />
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
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-warning">Confirmer edit ?</button>
                </div>
            </form>
        </div>
    </div>
</div>
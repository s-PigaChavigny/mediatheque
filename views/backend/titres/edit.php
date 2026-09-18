<?php
include '../../../header.php';

if(isset($_GET['idTit'])){
    $idTit = $_GET['idTit'];
    $nomTit = sql_select("titre", "nomTit", "idTit = $idTit")[0]['nomTit'];
    $dureeTit = sql_select("titre", "dureeTit", "idTit = $idTit")[0]['dureeTit'];
    $idAlb = sql_select("titre", "idAlb", "idTit = $idTit")[0]['idAlb'];
}
?>

<!-- Bootstrap form to edit a statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edition Titre</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to edit a  statut -->
            <form action="<?php echo ROOT_URL . '/api/titres/update.php' ?>" method="post">
                <div class="form-group">
                    <label for="idTit">Id du titre</label>
                    <input id="idTit" name="idTit" class="form-control" type="text" value="<?php echo($idTit); ?>" readonly />
                    <label for="nomTit">Nom du titre</label>
                    <input id="nomTit" name="nomTit" class="form-control" type="text" value="<?php echo($nomTit); ?>" />
                    <label for="dureeTit">Durée du titre</label>
                    <input id="dureeTit" name="dureeTit" class="form-control" type="text" value="<?php echo($dureeTit); ?>" />
                    <label for="idAlb">Album</label>
                    <select id="idAlb" name="idAlb" class="form-control">
                        <option value="">Sélectionnez un album</option>
                        <?php
                        $albums = sql_select("ALBUM", "*");
                        foreach($albums as $album) { ?>
                            <option value="<?php echo $album['idAlb']; ?>" <?php if($album['idAlb'] == $idAlb) echo 'selected'; ?>><?php echo $album['nomA']; ?></option>
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
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
                    <label for="nomTit">Nom du titre</label>
                    <input id="nomTit" name="nomTit" class="form-control" type="text" autofocus="autofocus" />
                </div>
                <div class="form-group">
                    <label for="dureeTit">Durée du titre</label>
                    <input id="dureeTit" name="dureeTit" class="form-control" type="text" />
                </div>
                <div class="form-group">
                    <label for="idAlb">Album</label>
                    <select id="idAlb" name="idAlb" class="form-control">
                        <option value="">Sélectionnez un album</option>
                        <?php
                        $albums = sql_select("ALBUM", "*");
                        foreach($albums as $album) { ?>
                            <option value="<?php echo $album['idAlb']; ?>"><?php echo $album['nomA']; ?></option>
                        <?php } ?>
                    </select>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-success">Confirmer create ?</button>
                </div>
            </form>
        </div>
    </div>
</div>
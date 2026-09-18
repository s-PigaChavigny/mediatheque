<?php
include '../../../header.php';

if(isset($_GET['idGp'])){
    $idGp = $_GET['idGp'];
    $nomGp = sql_select("groupe", "nomGp", "idGp = $idGp")[0]['nomGp'];
    $dtCreaGp = sql_select("groupe", "dtCreaGp", "idGp = $idGp")[0]['dtCreaGp'];
}
?>

<!-- Bootstrap form to edit a statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edition Groupe</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to edit a  statut -->
            <form action="<?php echo ROOT_URL . '/api/groupes/update.php' ?>" method="post">
                <div class="form-group">
                    <label for="idGp">Id du groupe</label>
                    <input id="idGp" name="idGp" class="form-control" type="text" value="<?php echo($idGp); ?>" readonly disabled />
                    <label for="nomGp">Nom du groupe</label>
                    <input id="nomGp" name="nomGp" class="form-control" type="text" value="<?php echo($nomGp); ?>" />
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
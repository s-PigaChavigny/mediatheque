<?php
include '../../../header.php';


if(isset($_GET['idTit'])){
    $idTit = $_GET['idTit'];
    $titre = sql_select("TITRE", "nomTit, dureeTit", "idTit = $idTit");

    if(!$titre) {
        $_SESSION['error_message'] = "Titre non trouvé.";
        header('Location: list.php');
        exit();
    }
    
} else {
    header('Location: list.php');
    exit();
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression Artiste</h1>
            
            <?php if(isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/titres/delete.php' ?>" method="post">
                <div class="form-group">
                    <label for="idTit">Id du titre</label>
                    <input id="idTit" name="idTit" class="form-control" type="text" value="<?php echo($idTit); ?>" readonly="readonly" />
                </div>
                <div class="form-group">
                    <label for="nomTit">Nom du titre</label>
                    <input id="nomTit" name="nomTit" class="form-control" type="text" value="<?php echo($titre[0]['nomTit']); ?>" readonly="readonly" disabled />
                </div>
                <div class="form-group">
                    <label for="dureeTit">Durée du titre</label>
                    <input id="dureeTit" name="dureeTit" class="form-control" type="text" value="<?php echo($titre[0]['dureeTit']); ?>" readonly="readonly" disabled />
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce titre ?');">
                        Confirmer la suppression
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
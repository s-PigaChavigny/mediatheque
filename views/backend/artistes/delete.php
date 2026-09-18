<?php
include '../../../header.php';


if(isset($_GET['idArt'])){
    $idArt = $_GET['idArt'];
    $artiste = sql_select("ARTISTE", "nomArt, prenomArt, idGp", "idArt = $idArt");

    if(!$artiste) {
        $_SESSION['error_message'] = "Artiste non trouvé.";
        header('Location: list.php');
        exit();
    }
    
    $albumWithArt = sql_select('ALBUM', 'COUNT(*) as count', "idArt = $idArt");
    $albumCount = $albumWithArt[0]['count'] ?? 0;
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

            <?php if($albumCount > 0): ?>
                <div class="alert alert-warning" role="alert">
                    <strong>⚠️ Attention !</strong> Cet Artiste est utilisé par <strong><?php echo $albumCount; ?></strong> album(s). La suppression n'est pas possible tant que des éléments sont associés à cet artiste.
                </div>
            <?php endif; ?>
        </div>

        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/artistes/delete.php' ?>" method="post">
                <div class="form-group">
                    <label for="idArt">Id de l'artiste</label>
                    <input id="idArt" name="idArt" class="form-control" type="text" value="<?php echo($idArt); ?>" readonly="readonly" />
                </div>
                <div class="form-group">
                    <label for="nomArt">Nom de l'artiste</label>
                    <input id="nomArt" name="nomArt" class="form-control" type="text" value="<?php echo($artiste[0]['nomArt']); ?>" readonly="readonly" disabled />
                </div>
                <div class="form-group">
                    <label for="prenomArt">Prénom de l'artiste</label>
                    <input id="prenomArt" name="prenomArt" class="form-control" type="text" value="<?php echo($artiste[0]['prenomArt']); ?>" readonly="readonly" disabled />
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-moyen">List</a>
                    
                    <?php if($albumCount === 0): ?>
                        <button type="submit" class="btn btn-fonce" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet.te artiste ?');">
                            Confirmer la suppression
                        </button>
                    <?php else: ?>
                        <button type="button" class="btn btn-fonce" disabled>Suppression impossible</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>
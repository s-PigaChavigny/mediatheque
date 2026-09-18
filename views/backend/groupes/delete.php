<?php
include '../../../header.php';


if(isset($_GET['idGp'])){
    $idGp = $_GET['idGp'];
    $groupe = sql_select("GROUPE", "nomGp", "idGp = $idGp");

    if(!$groupe) {
        $_SESSION['error_message'] = "Groupe non trouvé.";
        header('Location: list.php');
        exit();
    }
    
    $libGp = $groupe[0]['nomGp'];
    
    $artistWithGp = sql_select('ARTISTE', 'COUNT(*) as count', "idGp = $idGp");
    $artistCount = $artistWithGp[0]['count'] ?? 0;
    
    $albumWithGp = sql_select('ALBUM', 'COUNT(*) as count', "idGp = $idGp");
    $albumCount = $albumWithGp[0]['count'] ?? 0;
} else {
    header('Location: list.php');
    exit();
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression Groupe</h1>
            
            <?php if(isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
                </div>
            <?php endif; ?>

            <?php if($artistCount > 0 || $albumCount > 0): ?>
                <div class="alert alert-warning" role="alert">
                    <strong>⚠️ Attention !</strong> Ce Groupe est utilisé par <strong><?php echo $artistCount; ?></strong> artiste(s) et <strong><?php echo $albumCount; ?></strong> album(s). La suppression n'est pas possible tant que des éléments sont associés à ce groupe.
                </div>
            <?php endif; ?>
        </div>

        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/groupes/delete.php' ?>" method="post">
                <div class="form-group">
                    <label for="idGp">Id du groupe</label>
                    <input id="idGp" name="idGp" class="form-control" type="text" value="<?php echo($idGp); ?>" readonly="readonly" />
                </div>
                <div class="form-group">
                    <label for="libGp">Nom du groupe</label>
                    <input id="libGp" name="libGp" class="form-control" type="text" value="<?php echo($libGp); ?>" readonly="readonly" disabled />
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-moyen">List</a>
                    
                    <?php if($artistCount === 0 && $albumCount === 0): ?>
                        <button type="submit" class="btn btn-fonce" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce groupe ?');">
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
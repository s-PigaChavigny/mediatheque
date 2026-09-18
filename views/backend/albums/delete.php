<?php
include '../../../header.php';


if(isset($_GET['idAlb'])){
    $idAlb = $_GET['idAlb'];
    $album = sql_select("ALBUM", "nomA", "idAlb = $idAlb");

    if(!$album) {
        $_SESSION['error_message'] = "Album non trouvé.";
        header('Location: list.php');
        exit();
    }
    
    $libAlb = $album[0]['nomA'];
    
    $TitreWithAlb = sql_select('TITRE', 'COUNT(*) as count', "idAlb = $idAlb");
    $titreCount = $TitreWithAlb[0]['count'] ?? 0;
    
    $LikeWithAlb = sql_select('LIKES', 'COUNT(*) as count', "idAlb = $idAlb");
    $likeCount = $LikeWithAlb[0]['count'] ?? 0;
} else {
    header('Location: list.php');
    exit();
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression Album</h1>
            
            <?php if(isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
                </div>
            <?php endif; ?>

            <?php if($titreCount > 0 || $likeCount > 0): ?>
                <div class="alert alert-warning" role="alert">
                    <strong>⚠️ Attention !</strong> Ce Album est utilisé par <strong><?php echo $titreCount; ?></strong> titre(s) et <strong><?php echo $likeCount; ?></strong> like(s). La suppression n'est pas possible tant que des éléments sont associés à ce album.
                </div>
            <?php endif; ?>
        </div>

        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/albums/delete.php' ?>" method="post">
                <div class="form-group">
                    <label for="idAlb">Id de l'album</label>
                    <input id="idAlb" name="idAlb" class="form-control" type="text" value="<?php echo($idAlb); ?>" readonly="readonly" />
                </div>
                <div class="form-group">
                    <label for="libAlb">Nom de l'album</label>
                    <input id="libAlb" name="libAlb" class="form-control" type="text" value="<?php echo($libAlb); ?>" readonly="readonly" disabled />
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    
                    <?php if($titreCount === 0 && $likeCount === 0): ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet album ?');">
                            Confirmer la suppression
                        </button>
                    <?php else: ?>
                        <button type="button" class="btn btn-danger" disabled>Suppression impossible</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>
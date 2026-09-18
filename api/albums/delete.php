<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$id = ($_POST['idAlb']);
if(empty($id)){
    header('Location: ../../views/backend/albums/list.php');
    exit();
}

// Check if the album is being used by any title
$titreWithAlb = sql_select('TITRE', 'COUNT(*) as count', "idAlb = $id");
$titreCount = $titreWithAlb[0]['count'] ?? 0;
// Check if the album is being used by any like
$likeWithAlb = sql_select('LIKES', 'COUNT(*) as count', "idAlb = $id");
$likeCount = $likeWithAlb[0]['count'] ?? 0;

if ($titreCount > 0 || $likeCount > 0) {
    // Blocked deletion
    $_SESSION['error_message'] = "Impossible de supprimer cet album : $titreCount titre(s) et $likeCount like(s) utilise(nt) cet album.";
    header('Location: ../../views/backend/albums/delete.php?idAlb=' . $id);
    exit();
}

// Proceed with deletion
sql_delete('ALBUM', "idAlb = $id");
$_SESSION['success_message'] = "Album supprimé avec succès.";

header('Location: ../../views/backend/albums/list.php');
exit();
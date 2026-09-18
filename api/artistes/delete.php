<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$id = ($_POST['idGp']);
if(empty($id)){
    header('Location: ../../views/backend/groupes/list.php');
    exit();
}

// Check if the group is being used by any artist
$artistWithGp = sql_select('ARTISTE', 'COUNT(*) as count', "idGp = $id");
$artistCount = $artistWithGp[0]['count'] ?? 0;
// Check if the group is being used by any album
$albumWithGp = sql_select('ALBUM', 'COUNT(*) as count', "idGp = $id");
$albumCount = $albumWithGp[0]['count'] ?? 0;

if ($artistCount > 0 || $albumCount > 0) {
    // Blocked deletion
    $_SESSION['error_message'] = "Impossible de supprimer ce groupe : $artistCount artiste(s) et $albumCount album(s) utilise(nt) ce groupe.";
    header('Location: ../../views/backend/groupes/delete.php?idGp=' . $id);
    exit();
}

// Proceed with deletion
sql_delete('GROUPE', "idGp = $id");
$_SESSION['success_message'] = "Groupe supprimé avec succès.";

header('Location: ../../views/backend/groupes/list.php');
exit();
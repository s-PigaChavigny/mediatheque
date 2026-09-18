<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$id = ($_POST['idTit']);
if(empty($id)){
    header('Location: ../../views/backend/titres/list.php');
    exit();
}


// Proceed with deletion
sql_delete('TITRE', "idTit = $id");
$_SESSION['success_message'] = "Titre supprimé avec succès.";

header('Location: ../../views/backend/titres/list.php');
exit();
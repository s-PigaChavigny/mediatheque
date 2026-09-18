<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$idTit = ($_POST['idTit']);
$nomTit = ($_POST['nomTit']);
$dureeTit = ($_POST['dureeTit']);

if(empty($nomTit) || empty($dureeTit)){
    header('Location: ../../views/backend/titres/list.php');
}


sql_update('titre', "nomTit = '$nomTit', dureeTit = '$dureeTit'", "idTit = $idTit");

header('Location: ../../views/backend/titres/list.php');
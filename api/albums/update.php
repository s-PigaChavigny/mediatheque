<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$idAlb = ($_POST['idAlb']);
$nomA = ($_POST['nomA']);
$dtSortieA = ($_POST['dtSortieA']);
$nomLabelA = ($_POST['nomLabelA']);
$idArt = ($_POST['idArt']);
$idGp = ($_POST['idGp']);
if(empty($nomA) || empty($dtSortieA) || empty($nomLabelA) || empty($idArt) || empty($idGp)){
    header('Location: ../../views/backend/albums/list.php');
}


sql_update('album', "nomA = '$nomA', dtSortieA = '$dtSortieA', nomLabelA = '$nomLabelA', idArt = $idArt, idGp = $idGp", "idAlb = $idAlb");

header('Location: ../../views/backend/albums/list.php');
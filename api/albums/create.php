<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';


$nomA = ($_POST['nomA']);
$dtSortieA = ($_POST['dtSortieA']);
$nomLabelA = ($_POST['nomLabelA']);
$idArt = ($_POST['idArt']);
$idGp = ($_POST['idGp']);

if(empty($nomA) || empty($dtSortieA) || empty($nomLabelA) || empty($idArt) || empty($idGp)){
    header('Location: ../../views/backend/albums/list.php');
}

sql_insert('album', 'nomA, dtSortieA, nomLabelA, idArt, idGp', "'$nomA', '$dtSortieA', '$nomLabelA', '$idArt', '$idGp'");


header('Location: ../../views/backend/albums/list.php'); 
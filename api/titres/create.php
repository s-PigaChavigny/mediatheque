<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';


$nomTit = ($_POST['nomTit']);
$dureeTit = ($_POST['dureeTit']);
$idAlb = ($_POST['idAlb']);

if(empty($nomTit) || empty($dureeTit)){
    header('Location: ../../views/backend/titres/list.php');
}

sql_insert('titre', 'nomTit, dureeTit, idAlb', "'$nomTit', '$dureeTit', '$idAlb'");


header('Location: ../../views/backend/titres/list.php'); 
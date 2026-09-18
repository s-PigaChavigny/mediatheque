<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';


$nomArt = ($_POST['nomArt']);
$prenomArt = ($_POST['prenomArt']);
$idGp = ($_POST['idGp']);

if(empty($nomArt) || empty($prenomArt)){
    header('Location: ../../views/backend/artistes/list.php');
}

sql_insert('artiste', 'nomArt, prenomArt, idGp', "'$nomArt', '$prenomArt', '$idGp'");


header('Location: ../../views/backend/artistes/list.php'); 
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$idGp = ($_POST['idGp']);
$nomGp = ($_POST['nomGp']);
$dtCreaGp = ($_POST['dtCreaGp']);
if(empty($nomGp) || empty($dtCreaGp)){
    header('Location: ../../views/backend/groupes/list.php');
}


sql_update('groupe', "nomGp = '$nomGp', dtCreaGp = '$dtCreaGp'", "idGp = $idGp");

header('Location: ../../views/backend/groupes/list.php');
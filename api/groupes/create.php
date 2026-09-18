<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';


$nomGp = ($_POST['nomGp']);
$dtCreaGp = ($_POST['dtCreaGp']);

if(empty($nomGp) || empty($dtCreaGp)){
    header('Location: ../../views/backend/groupes/list.php');
}

sql_insert('groupe', 'nomGp, dtCreaGp', "'$nomGp', '$dtCreaGp'");


header('Location: ../../views/backend/groupes/list.php'); 
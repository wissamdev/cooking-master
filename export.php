<?php

/* Fichier CSV */

include 'inc/init.inc.php';

$idDuConcerne = $_SESSION['idMembres'];

$afficheInfo = $pdo->query("SELECT * FROM membres WHERE idMembre = $idDuConcerne");
$informations = $afficheInfo->fetch(PDO ::FETCH_OBJ);

var_dump($informations);

$list = array(
    array('idMembre', 'gravatar', 'login', 'statut', 'prenom', 'nom', 'dateCrea'),
    array($informations->idMembre, $informations->gravatar, $informations->login, $informations->statut,
        $informations->prenom, $informations->nom, $informations->dateCrea),
);

$f = fopen("vosinfos.csv", "w");
foreach ($list as $fields) {
    fputcsv($f, $fields);
}
fclose($f);

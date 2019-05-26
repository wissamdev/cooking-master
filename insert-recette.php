<?php include("inc/init.inc.php") ?>    

<?php

$nomRecette = filter_input(INPUT_POST, 'nomRecette', FILTER_SANITIZE_STRING);
$apropos = filter_input(INPUT_POST, 'apropos', FILTER_SANITIZE_STRING);
$ingredient = filter_input(INPUT_POST, 'ingredient', FILTER_SANITIZE_STRING);
$preparation = filter_input(INPUT_POST, 'preparation', FILTER_SANITIZE_STRING);
$categorie = filter_input(INPUT_POST, 'categorie');
$PreparationTime = filter_input(INPUT_POST, 'PreparationTime', FILTER_SANITIZE_STRING);
$CuissonTime = filter_input(INPUT_POST, 'CuissonTime', FILTER_SANITIZE_STRING);
$difficulte = filter_input(INPUT_POST, 'difficulte');
$prix = filter_input(INPUT_POST, 'prix');
$idMembre = $_SESSION["idMembres"];
$img = 'default.jpg';
$couleur = 'dark';

$addrecette = $pdo->query("INSERT INTO recettes (titre, chapo, img, preparation, ingredient, membre, couleur, dateInsert, categorie, tempsCuisson, tempsPreparation, difficulte, prix) VALUES ('$nomRecette', '$apropos', '$img', '$preparation', '$ingredient', '$idMembre', '$couleur', NOW(), '$categorie', '$CuissonTime', '$PreparationTime', '$difficulte','$prix')");

if ($addrecette) {
    header('Location: index.php?submitted=success');
    exit();
} else {
    var_dump($addrecette);
}


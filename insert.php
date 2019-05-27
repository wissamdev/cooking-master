<?php include("inc/init.inc.php") ?>
<?php

// Requete pour S'incrire 

$nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
$prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
$pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
$pass = sha1(filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING));
$gravatar = 'xxx.png';
$statut = 'membre';

$uniquepseudo = $pdo->query("SELECT login FROM membres WHERE login = '$pseudo'");

if (isset($uniquepseudo)) {

    $result = $pdo->query("INSERT INTO membres (gravatar, login, password, statut, prenom, nom, dateCrea) VALUES ('$gravatar', '$pseudo', '$pass', '$statut', '$prenom','$nom', NOW());");

    if ($result) {
        header('Location: connexion.php?submitted=success');
        exit();
    } else {
        var_dump($result);
    }
} else {
        header('Location: inscription.php?submitted=success');
        exit();    
}
?>
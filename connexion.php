<?php include("inc/header.inc.php") ?>
<?php
/* Requete pour ce connecter */
if (!empty($_POST)) {
    $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
    $pass = sha1(filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING));

    $result = $pdo->query("SELECT * FROM membres WHERE login = '$pseudo' AND password = '$pass'");
    $membres = $result->fetch(PDO::FETCH_OBJ);

    if ($membres == false) {
        ?>
        <div class="alert alert-danger" role="alert">Login ou mot de passe incorrect</div>
        <?php
    } else {
        $_SESSION["idMembres"] = $membres->idMembre;
        $_SESSION["gravatar"] = $membres->gravatar;
        $_SESSION["login"] = $membres->login;
        $_SESSION["statut"] = $membres->statut;
        $_SESSION["prenom"] = $membres->prenom;
        $_SESSION["nom"] = $membres->nom;


        if ($membres->statut == 'membre') {
            header('Location: inc/checklog.php');
        } elseif ($membres->statut == 'admin') {
            header('Location: inc/checklog.php');
        } elseif ($membres->statut == 'block') {
            session_destroy();
            ?>
            <div class="alert alert-danger" role="alert">Compte bloqué ...</div>
            <?php
        }
    }
}
?>



<div class="container-fluid">
    <hr class="featurette-divider">
    <div class="row">

        <div class="col-4 premier"></div>

        <!-- <div class="col-3 offset-3 second"> -->
        <div class="col-4 second">

            <h2 class="featurette-heading">Connexion</h2>
            <hr class="featurette-divider">
            <form action="connexion.php" method="post">
                <div class="form-group">
                    <label for="pseudo">Login</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Entrer Pseudo">
                </div>
                <div class="form-group">
                    <label for="pass">Mot de passe</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                </div><br><br>
                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>

        </div>

        <div class="col-4 trois">

        </div>
    </div>



    <?php include("inc/footer.inc.php") ?>
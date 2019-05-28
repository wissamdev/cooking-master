<?php include("inc/header.inc.php") ?>



<div class="container-fluid">
    <hr class="featurette-divider">
    <div class="row">

        <div class="col-4 premier">

        </div>

        <!-- <div class="col-3 offset-3 second"> -->
        <div class="col-4 second">

            <h2 class="featurette-heading">Veuillez remplir les informations</h2>
            <hr class="featurette-divider">


            <form action="insert.php" method="post">
                <div class="form-group">
                    <label for="nom">Votre Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Votre prenom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom">
                </div>
                <div class="form-group">
                    <label for="pseudo">Votre pseudo</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="pseudo">
                </div>
                <div class="form-group">
                    <label for="pass">Votre mot de passe</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="pass">
                </div><br><br>
                <p>
                    <input class="btn btn-primary" type="submit" value="Envoyer">
                </p>
            </form>

        </div>

        <div class="col-4 trois">

        </div>
    </div>


    <?php include("inc/footer.inc.php") ?>


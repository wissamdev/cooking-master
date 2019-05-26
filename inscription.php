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
                <fieldset>
                    <br>
                    <p>
                    <label for="pseudo">Votre Nom :</label>
                    <input type="text" name="nom" id="nom" placeholder="nom"/>
                    </p>
                    <br>
                    <p>
                    <label for="pseudo">Votre prenom :</label>
                    <input type="text" name="prenom" id="prenom" placeholder="prenom"/>
                    </p>
                    <br>
                    <p>
                    <label for="pseudo">Votre pseudo :</label>
                    <input type="text" name="pseudo" id="pseudo" placeholder="pseudo"/>
                    </p>
                    <br>
                    <p>
                    <label for="pass">Votre mot de passe :</label>
                    <input type="password" name="pass" id="pass" required placeholder='mot de passe'/>
                    </p>
                </fieldset><br>
                <p>
                    <input class="btn btn-primary" type="submit" value="Envoyer">
                </p>

            </form>

        </div>

        <div class="col-4 trois">

        </div>
    </div>


    <?php include("inc/footer.inc.php") ?>


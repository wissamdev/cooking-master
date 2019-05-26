<?php include("inc/header.inc.php") ?>



<div class="container-fluid">
    <hr class="featurette-divider">
    <div class="row">

        <div class="col-4 premier">

        </div>

        <div class="col-4 second">

            <h2 class="featurette-heading">Bonjour <?php echo $_SESSION["prenom"] ?></h2>
            <hr class="featurette-divider">
            <h4 class="featurette-heading2">Modification des informations d'identification</h4>
            <br><br>


            <?php
            $newpseudo = filter_input(INPUT_POST, 'newpseudo', FILTER_SANITIZE_STRING);
            $idMembre = $_SESSION["idMembres"];
            $newpass = sha1(filter_input(INPUT_POST, 'newpass', FILTER_SANITIZE_STRING));

            if (!empty($newpseudo)) {

                $result = $pdo->query("UPDATE membres SET login = '$newpseudo' WHERE idMembre = $idMembre");

                if ($result == true) {
                    ?>
                    <div class = "alert alert-success" role = "alert">
                        Information mise à jour
                    </div>
                    <?php
                }
            } elseif (!empty($_POST['newpass'])) {

                $result2 = $pdo->query("UPDATE membres SET `password` = '$newpass' WHERE idMembre = $idMembre");

                if ($result2 == true) {
                    ?>
                    <div class = "alert alert-success" role = "alert">
                        Information mise à jour
                    </div>
                    <?php
                }
            }
            ?>

            <form action="profile.php" method="post">
                <p>
                <label for="newpseudo">Votre <strong>nouveau</strong> pseudo :</label>
                <input type="text" name="newpseudo" id="newpseudo" placeholder="pseudo"/>
                </p>
                <br><br>
                <br>
                <p>
                <label for="newpass">Votre <strong>nouveau</strong> mot de passe :</label>
                <input type="text" name="newpass" id="newpass" placeholder='mot de passe'/>
                </p><br>
                <p>
                    <input class="btn btn-primary" type="submit" value="Modifier">
                </p>
            </form><br><hr><br>

            <?php
            if (!empty($_POST['delete'])) {

                $pdo->query("DELETE FROM `membres` WHERE idMembre = $idMembre");
                session_destroy();
                header('Location: index.php');
                exit();
            }
            ?>

            <form action="profile.php" method="post">
                <p><strong>Supprimer</strong> mon compte </p>
                <input class="btn btn-danger" name="delete" type="submit" value="Supprimer">
            </form>

        </div>

        <div class = "col-4 trois">

        </div>
    </div>
    <div class="row">
        <div class="col-2 premier"></div>
        <div class="col-4 premier">

            <?php if ($_SESSION["statut"] == 'admin') { ?>

                <hr class="featurette-divider">
                <h4 class="featurette-heading2">Options d'aministrateur (Membre)</h4>
                <br><br>
                <?php
                $block = filter_input(INPUT_POST, 'block', FILTER_SANITIZE_STRING);
                $ban = filter_input(INPUT_POST, 'ban', FILTER_SANITIZE_STRING);
                $membre = filter_input(INPUT_POST, 'membre', FILTER_SANITIZE_STRING);
                $newstatut = filter_input(INPUT_POST, 'newstatut', FILTER_SANITIZE_STRING);

                if (!empty($membre)) {

                    $resultat3 = $pdo->query("SELECT * FROM membres WHERE login = '$membre'");
                    $exist = $resultat3->fetch(PDO::FETCH_OBJ);

                    if ($exist == false) {
                        ?>
                        <div class = "alert alert-danger" role = "alert">
                            identifiant Non Trouvé
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class = "alert alert-success" role = "alert">
                            Statut du membre modifié !
                        </div>
                        <?php
                    }

                    $pdo->query("UPDATE membres SET statut = '$newstatut' WHERE login = '$membre'");
                }
                ?>
                <form action = "profile.php" method = "post">
                    <p>
                    <label for = "membre"><strong>Entrer le pseudo</strong> d'un membre pour 
                        <strong>Modifier</strong> son statut :</label>
                    <input type = "text" name = "membre" id = "membre" placeholder = "statut"/>
                    </p><br>
                    <select name="newstatut" id="prix">
                        <option value="admin">Admin</option>
                        <option value="membre" selected>Membre</option>
                        <option value="block">Block</option>
                    </select><br><br>
                    <p>
                        <input class = "btn btn-danger" type = "submit" value = "Modifier">
                    </p>
                </form>
                <br><hr><br>
                <?php
                if (!empty($ban)) {

                    $resultat = $pdo->query("SELECT * FROM membres WHERE login = '$ban'");
                    $exist = $resultat->fetch(PDO::FETCH_OBJ);

                    if ($exist == false) {
                        ?>
                        <div class = "alert alert-danger" role = "alert">
                            identifiant Non Trouvé
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class = "alert alert-success" role = "alert">
                            Membre Banni !
                        </div>
                        <?php
                    }

                    $pdo->query("DELETE FROM `membres` WHERE login = '$ban'");
                }
                ?>
                <form action = "profile.php" method = "post">
                    <br>
                    <p>
                    <label for = "ban"><strong>Bannir</strong> un membre :</label>
                    <input type = "text" name = "ban" id = "ban" placeholder = "pseudo"/>
                    </p>
                    <br>
                    <p>
                        <input class = "btn btn-danger" type = "submit" value = "Bannir">
                    </p>
                </form>

            <?php } ?>

        </div>
        <div class="col-4 premier"></div>
        <div class="col-2 premier"></div>
    </div>


    <?php include("inc/footer.inc.php") ?>

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
            $newpass = filter_input(INPUT_POST, 'newpass', FILTER_SANITIZE_STRING);

            if (!empty($newpseudo)) {

                // Modification de login 
                $result = $pdo->query("UPDATE membres SET login = '$newpseudo' WHERE idMembre = $idMembre");

                if ($result == true) {
                    ?>
                    <div class = "alert alert-success" role = "alert">
                        Information mise à jour
                    </div>
                    <?php
                }
            } if (!empty($newpass)) {

                // Modification de mot de passe 
                $newpass_crypt = sha1($newpass);
                $result2 = $pdo->query("UPDATE membres SET `password` = '$newpass_crypt' WHERE idMembre = $idMembre");

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
                <div class="form-group">
                    <label for="newpseudo">Votre <strong>nouveau</strong> pseudo</label>
                    <input type="text" class="form-control" id="newpseudo" name="newpseudo" placeholder="pseudo">
                </div>
                <div class="form-group">
                    <label for="newpass">Mot de passe</label>
                    <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Password">
                </div><br><br>
                <p>
                    <input class="btn btn-primary" type="submit" value="Modifier">
                </p>
            </form><br><hr><br>

            <form action="killaccount.php" method="post">
                <input class="btn btn-danger" name="delete" type="submit" value="Supprimer Mon Compte">
            </form>
            <hr class="featurette-divider">
            <a href="vosinfos.csv" class="badge badge-primary">Mes Infos</a><br>

            <!-- RESERVE AUX ADMIN -->

            <?php if ($_SESSION["statut"] == 'admin') { ?>

                <h4 class="featurette-heading2">ADMINISTRATEUR</h4><br><br>    
                <form action = "profile.php" method = "post">
                    <div class="form-group">
                        <label for="viewrecette"><strong>Trouver</strong> une recette</label>
                        <input type="text" class="form-control" id="viewrecette" name="viewrecette" placeholder="recette">
                    </div>
                    <div class="form-group">
                        <label for="viewmembre"><strong>Trouver</strong> un membre</label>
                        <input type="text" class="form-control" id="viewmembre" name="viewmembre" placeholder="membre">
                    </div><br><br>
                    <p>
                        <input class = "btn btn-primary" type = "submit" value = "Trouvez">
                    </p>
                </form><br><br>

                <?php
                $viewrecette = filter_input(INPUT_POST, 'viewrecette', FILTER_SANITIZE_STRING);
                $viewmembre = filter_input(INPUT_POST, 'viewmembre', FILTER_SANITIZE_STRING);

                // Selection recette

                if (!empty($viewrecette)) {
                    ?>

                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr class="lead">
                            <th>IdRecette</th>
                            <th>titre</th>
                            <th>A propos</th>
                            </tr>
                        </thead>
                        <?php
                        $resultat4 = $pdo->query("SELECT * FROM recettes WHERE titre LIKE '%$viewrecette%'");
                        while ($viewrecette = $resultat4->fetch(PDO::FETCH_OBJ)) {
                            ?>
                            <tbody>
                                <tr class="lead">
                                <td><?php echo $viewrecette->idRecette; ?></td>
                                <td><?php echo $viewrecette->titre; ?></td>
                                <td><?php echo $viewrecette->chapo; ?></td>
                                </tr>
                            </tbody>

                        <?php }
                        ?>
                    </table>
                    <?php
                    // Selection membre
                } if (!empty($viewmembre)) {
                    ?>

                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr class="lead">
                            <th>IdMembre</th>
                            <th>login</th>
                            <th>statut</th>
                            <th>prenom</th>
                            <th>nom</th>
                            </tr>
                        </thead>
                        <?php
                        $viewmembreresult = $pdo->query("SELECT * FROM membres WHERE login LIKE '%$viewmembre%'");
                        while ($viewmembre = $viewmembreresult->fetch(PDO::FETCH_OBJ)) {
                            ?>
                            <tbody>
                                <tr class="lead">
                                <td><?php echo $viewmembre->idMembre; ?></td>
                                <td><?php echo $viewmembre->login; ?></td>
                                <td><?php echo $viewmembre->statut; ?></td>
                                <td><?php echo $viewmembre->prenom; ?></td>
                                <td><?php echo $viewmembre->nom; ?></td>
                                </tr>
                            </tbody>

                        <?php }
                        ?>
                    </table>
                <?php }
                ?>


            </div>

            <div class = "col-4 trois">

            </div>
        </div>
        <div class="row">
            <div class="col-6 premier">

                <hr class="featurette-divider">
                <h4 class="featurette-heading2">Options d'aministrateur (Membre)</h4>
                <br><br>
                <?php
                $block = filter_input(INPUT_POST, 'block', FILTER_SANITIZE_STRING);
                $ban = filter_input(INPUT_POST, 'ban', FILTER_SANITIZE_STRING);
                $idMembre = filter_input(INPUT_POST, 'idMembre', FILTER_SANITIZE_STRING);
                $newstatut = filter_input(INPUT_POST, 'newstatut', FILTER_SANITIZE_STRING);
                $prenomMembre = filter_input(INPUT_POST, 'prenomMembre', FILTER_SANITIZE_STRING);
                $nomMembre = filter_input(INPUT_POST, 'nomMembre', FILTER_SANITIZE_STRING);



                if (!empty($idMembre)) {

                    $resultat3 = $pdo->query("SELECT * FROM membres WHERE idMembre = '$idMembre'");

                    if (!empty($prenomMembre)) {

                        $pdo->query("UPDATE membres SET prenom = '$prenomMembre' WHERE idMembre = '$idMembre'");
                    } if (!empty($nomMembre)) {

                        $pdo->query("UPDATE membres SET nom = '$nomMembre' WHERE idMembre = '$idMembre'");
                    } if (!empty($newstatut)) {

                        $pdo->query("UPDATE membres SET statut = '$newstatut' WHERE idMembre = '$idMembre'");
                    } if ($resultat3 == false) {
                        ?>
                        <div class = "alert alert-danger" role = "alert">
                            identifiant Non Trouvé
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class = "alert alert-success" role = "alert">
                            Update !
                        </div>
                        <?php
                    }
                }
                ?>
                <form action = "profile.php" method = "post">
                    <div class="form-group">
                        <label for="idMembre"><strong class='warning'>Entrer idMembre</strong></label>
                        <input type="text" class="form-control" id="idMembre" name="idMembre" placeholder="id">
                    </div>
                    <div class="form-group">
                        <label for="prenomMembre">Votre prenom</label>
                        <input type="text" class="form-control" id="prenomMembre" name="prenomMembre" placeholder="prenom">
                    </div>
                    <div class="form-group">
                        <label for="nomMembre">Votre pseudo</label>
                        <input type="text" class="form-control" id="nomMembre" name="nomMembre" placeholder="nom">
                    </div>
                    <div class="form-group">
                        <label for="newstatut"><strong>Modifier</strong> son statut</label>
                        <select id="newstatut" class="form-control" name="newstatut">
                            <option value="admin">Admin</option>
                            <option value="membre" selected>Membre</option>
                            <option value="block">Block</option>
                        </select>
                    </div><br><br>
                    <p>
                        <input class = "btn btn-danger" type = "submit" value = "Modifier">
                    </p>
                    <br><br>
                    <p>
                    <button type="submit" class="btn btn-danger" name= "ban">Bannir</button>
                    </p>
                </form>
                <br><hr><br>
                <?php
                // Drop membre

                if (!empty($ban)) {

                    if ($resultat3 == false) {
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

                    $pdo->query("DELETE FROM `membres` WHERE idMembre = '$idMembre'");
                }
                ?>


            </div>
            <div class="col-6 second">

                <hr class="featurette-divider">
                <h4 class="featurette-heading2">Options d'aministrateur (Recette)</h4>
                <br><br>

                <?php
                $idRecette = filter_input(INPUT_POST, 'idRecette', FILTER_SANITIZE_STRING);
                $titreRecette = filter_input(INPUT_POST, 'titreRecette', FILTER_SANITIZE_STRING);
                $updateapropos = filter_input(INPUT_POST, 'updateapropos', FILTER_SANITIZE_STRING);
                $updateingredient = filter_input(INPUT_POST, 'updateingredient', FILTER_SANITIZE_STRING);
                $updatepreparation = filter_input(INPUT_POST, 'updatepreparation', FILTER_SANITIZE_STRING);
                $updatecategorie = filter_input(INPUT_POST, 'updatecategorie', FILTER_SANITIZE_STRING);
                $updatePreparationTime = filter_input(INPUT_POST, 'updatePreparationTime', FILTER_SANITIZE_STRING);
                $updateCuissonTime = filter_input(INPUT_POST, 'updateCuissonTime', FILTER_SANITIZE_STRING);
                $updatedifficulte = filter_input(INPUT_POST, 'updatedifficulte', FILTER_SANITIZE_STRING);
                $updateprix = filter_input(INPUT_POST, 'updateprix', FILTER_SANITIZE_STRING);
                $sup = filter_input(INPUT_POST, 'sup', FILTER_SANITIZE_STRING);

                // Modification des donnés des recettes


                if (!empty($idRecette)) {

                    if (!empty($titreRecette)) {

                        $resultat5 = $pdo->query("UPDATE recettes SET titre = '$titreRecette' WHERE idRecette = $idRecette");
                    } if (!empty($updateapropos)) {

                        $resultat6 = $pdo->query("UPDATE recettes SET chapo = '$updateapropos' WHERE idRecette = $idRecette");
                    } if (!empty($updateingredient)) {

                        $resultat7 = $pdo->query("UPDATE recettes SET ingredient = '$updateingredient' WHERE idRecette = $idRecette");
                    } if (!empty($updatepreparation)) {

                        $resultat8 = $pdo->query("UPDATE recettes SET preparation = '$updatepreparation' WHERE idRecette = $idRecette");
                    } if (!empty($updatecategorie)) {

                        $resultat9 = $pdo->query("UPDATE recettes SET categorie = '$updatecategorie' WHERE idRecette = $idRecette");
                    } if (!empty($updatePreparationTime)) {

                        $resultat10 = $pdo->query("UPDATE recettes SET tempsPreparation = '$updatePreparationTime' WHERE idRecette = $idRecette");
                    } if (!empty($updateCuissonTime)) {

                        $resultat11 = $pdo->query("UPDATE recettes SET tempsCuisson = '$updateCuissonTime' WHERE idRecette = $idRecette");
                    } if (!empty($updatedifficulte)) {

                        $resultat12 = $pdo->query("UPDATE recettes SET difficulte = '$updatedifficulte' WHERE idRecette = $idRecette");
                    } if (!empty($updateprix)) {

                        $resultat13 = $pdo->query("UPDATE recettes SET prix = '$updateprix' WHERE idRecette = $idRecette");
                    }
                    ?>
                    <div class = "alert alert-success" role = "alert">
                        Update !
                    </div>
                <?php } ?>

                <form action="profile.php" method="post">


                    <div class="form-group">
                        <label for="idRecette"><strong class='warning' >Entrer idRecette</strong></label>
                        <input type="text" class="form-control" id="idRecette" name="idRecette" placeholder="id">
                    </div>
                    <div class="form-group">
                        <label for="titreRecette"><strong>Modifier</strong> nom de la recette</label>
                        <input type="text" class="form-control" id="titreRecette" name="titreRecette" placeholder="nom">
                    </div>
                    <div class="form-group">
                        <label for="updateapropos"><strong>Modifier</strong> a propos</label>
                        <textarea class="form-control" id="updateapropos" name="updateapropos" placeholder="Ecrire .."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="updateingredient"><strong>Modifier</strong> ingredient</label>
                        <textarea class="form-control" id="updateingredient" name="updateingredient" placeholder="Ecrire .."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="updatepreparation"><strong>Modifier</strong> préparation</label>
                        <textarea class="form-control" id="updatepreparation" name="updatepreparation" placeholder="Ecrire .."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="updatePreparationTime"><strong>Modifier</strong> temps de préparation</label>
                        <input type="text" class="form-control" id="updatePreparationTime" name="updatePreparationTime" placeholder="exemple : 1 h 05 min">
                    </div>
                    <div class="form-group">
                        <label for="updateCuissonTime"><strong>Modifier</strong> temps de cuisson</label>
                        <input type="text" class="form-control" id="updateCuissonTime" name="updateCuissonTime" placeholder="exemple : 1 h 05 min">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="updatecategorie"><strong>Modifier</strong> categorie</label>
                            <select id="updatecategorie" class="form-control" name="updatecategorie">
                                <option value="1" selected>Viande</option>
                                <option value="2">Legume</option>
                                <option value="3">Poisson</option>
                                <option value="4">Fruit</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updatedifficulte"><strong>Modifier</strong> difficulte</label>
                            <select id="updatedifficulte" class="form-control" name="updatedifficulte">
                                <option value="Facile" selected>Facile</option>
                                <option value="Moyen">Moyen</option>
                                <option value="Difficile">Difficile</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="updateprix"><strong>Modifier</strong> prix</label>
                            <select id="updateprix" class="form-control" name="updateprix">
                                <option value="Pas cher" selected>Pas cher</option>
                                <option value="Abordable">Abordable</option>
                                <option value="Cher">Cher</option>
                            </select>
                        </div>
                    </div><br><br>
                    <p>
                        <input class="btn btn-danger" type="submit" value="Modifier">
                    </p>
                    <br><hr><br>
                    <p>
                    <input class = "btn btn-danger" name = "sup" type = "submit" value = "Supprimer">
                    </p>

                </form>
                <?php
                // Drop recette

                if (!empty($sup)) {

                    $resultat14 = $pdo->query("SELECT * FROM recettes WHERE idRecette = '$idRecette'");

                    if ($idRecette == false) {
                        ?>
                        <div class = "alert alert-danger" role = "alert">
                            identifiant Non Trouvé
                        </div>
                        <?php
                    }

                    $pdo->query("DELETE FROM `recettes` WHERE idRecette = '$idRecette'");
                }
                ?>

            <?php } ?>

        </div>
    </div>
</div>


<?php include("inc/footer.inc.php") ?>

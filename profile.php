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

                $result = $pdo->query("UPDATE membres SET login = '$newpseudo' WHERE idMembre = $idMembre");

                if ($result == true) {
                    ?>
                    <div class = "alert alert-success" role = "alert">
                        Information mise à jour
                    </div>
                    <?php
                }
            } if (!empty($newpass)) {

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

            <form action="killaccount.php" method="post">
                <p><strong>Supprimer</strong> mon compte </p>
                <input class="btn btn-danger" name="delete" type="submit" value="Supprimer">
            </form>
            <hr class="featurette-divider">



            <?php if ($_SESSION["statut"] == 'admin') { ?>

                <h4 class="featurette-heading2">ADMINISTRATEUR</h4><br><br>    
                <form action = "profile.php" method = "post">
                    <p>
                    <label for = "find"><strong>Trouver</strong> une recette :</label>
                    <input type = "text" name = "viewrecette" id = "viewrecette" placeholder = "recette"/>
                    </p><br>
                    <p>
                    <label for = "find"><strong>Trouver</strong> un membre :</label>
                    <input type = "text" name = "viewmembre" id = "viewmembre" placeholder = "pseudo"/>
                    </p>
                    <br>
                    <p>
                        <input class = "btn btn-primary" type = "submit" value = "Trouvez">
                    </p>
                </form><br><br>

                <?php
                $viewrecette = filter_input(INPUT_POST, 'viewrecette', FILTER_SANITIZE_STRING);
                $viewmembre = filter_input(INPUT_POST, 'viewmembre', FILTER_SANITIZE_STRING);

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
            <div class="col-2 premier"></div>
            <div class="col-4 premier">

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

                    <p>
                    <label for="idMembre"><strong class='warning'>Entrer idMembre</strong> :</label>
                    <input type="text" name="idMembre" id="idMembre" placeholder="id"/>
                    </p>
                    <br><hr><br>
                    <p>
                    <label for="prenomMembre"><strong>Modifier</strong> prenom du membre :</label>
                    <input type="text" name="prenomMembre" id="prenomMembre" placeholder="prenom"/>
                    </p>
                    <br><hr><br>
                    <p>
                    <label for="nomMembre"><strong>Modifier</strong> nom du membre :</label>
                    <input type="text" name="nomMembre" id="nomMembre" placeholder="nom"/>
                    </p>
                    <br><hr><br>
                    <p>
                    <label for = "membre"> 
                        <strong>Modifier</strong> son statut :</label>
                    </p><br>
                    <select name="newstatut" id="prix">
                        <option value="admin">Admin</option>
                        <option value="membre" selected>Membre</option>
                        <option value="block">Block</option>
                    </select><br><br>
                    <p>
                        <input class = "btn btn-danger" type = "submit" value = "Modifier">
                    </p>
                    <br><hr><br>
                    <p>
                    <label for = "ban"><strong>Bannir</strong> ce membre :</label>
                    <input class = "btn btn-danger" name = "ban" type = "submit" value = "Bannir">
                    </p>
                </form>
                <br><hr><br>
                <?php
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
            <div class="col-4 premier">

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

                    <p>
                    <label for="idRecette"><strong class='warning' >Entrer idRecette</strong> :</label>
                    <input type="text" name="idRecette" id="idRecette" placeholder="id"/>
                    </p>
                    <br><hr><br>
                    <p>
                    <label for="titreRecette"><strong>Modifier</strong> nom de la recette :</label>
                    <input type="text" name="titreRecette" id="titreRecette" placeholder="nom"/>
                    </p>
                    <br><hr><br>
                    <p>
                    <label for="apropos"><strong>Modifier</strong> a propos :</label>
                    <textarea name="updateapropos" id="updateapropos" rows="3" cols="50" 
                              placeholder="Modifier description"></textarea>
                    </p>
                    <br><hr><br>
                    <p>
                    <label for="ingredient"><strong>Modifier</strong> ingredient :</label>
                    <textarea name="updateingredient" id="updateingredient" rows="3" cols="50" 
                              placeholder="Modifier .."></textarea>
                    </p>
                    <br><hr><br>
                    <p>
                    <label for=preparation><strong>Modifier</strong> préparation :</label>
                    <textarea name="updatepreparation" id="updatepreparation" rows="3" cols="50" 
                              placeholder="Modifier .."></textarea>
                    </p>
                    <br><hr><br>
                    <p>
                    <label for="updatecategorie"><strong>Modifier</strong> categorie</label><br />
                    <select name="updatecategorie" id="updatecategorie">
                        <option value="1">Viande</option>
                        <option value="2" selected>Légume</option>
                        <option value="3">Poisson</option>
                        <option value="4">Fruit</option>
                    </select>
                    </p>
                    <br><hr><br>
                    <p>
                    <label for="updatePreparationTime"><strong>Modifier</strong> temps de préparation :</label>
                    <input type="text" name="updatePreparationTime" id="updatePreparationTime" 
                           placeholder="exemple : 35 min"/>
                    </p>
                    <p>
                    <label for="CuissonTime"><strong>Modifier</strong> temps de cuisson :</label>
                    <input type="text" name="updateCuissonTime" id="updateCuissonTime" 
                           placeholder="exemple : 1h 45 min"/>
                    </p>
                    <br><hr><br>
                    <p>
                    <label for="updatedifficulte"><strong>Modifier</strong> difficulté</label><br>
                    <select name="updatedifficulte" id="prix">
                        <option value="Facile">Facile</option>
                        <option value="Moyen" selected>Moyen</option>
                        <option value="Difficile">Difficile</option>
                    </select>
                    </p>
                    <br><hr><br>
                    <p>
                    <label for="updateprix"><strong>Modifier</strong> Prix</label><br>
                    <select name="updateprix" id="prix">
                        <option value="pascher">Pas cher</option>
                        <option value="abordable" selected>Abordable</option>
                        <option value="cher">Cher</option>
                    </select>
                    </p><br><br>
                    <p>
                        <input class="btn btn-danger" type="submit" value="Modifier">
                    </p>

                </form>

            <?php } ?>

        </div>
        <div class="col-2 premier"></div>
    </div>


    <?php include("inc/footer.inc.php") ?>

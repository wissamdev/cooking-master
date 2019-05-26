<?php include("inc/header.inc.php") ?>

<!--  CONTENT  -->
<main role="main">

    <div class="container marketing">

        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1 class="display-4">Recette du jour</h1>
            <p class="lead">Voici la selection des recettes du jour de cooking.</p>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg" href="index.php" role="button">En savoir plus</a>
        </div>


        <!-- START THE FEATURETTES -->

        <div class="row featurette">
            <?php
            //var_dump($_POST[recette]);
            $recette = filter_input(INPUT_POST, 'recette', FILTER_SANITIZE_STRING);
            if (!empty($recette)) {
                //$recette = trim($_POST[recette]);
                $result = $pdo->query("SELECT * FROM recettes r, categories c, membres m WHERE r.titre LIKE '%$recette%' AND r.categorie = c.idCategorie AND r.membre = m.idMembre");
                //$recettes = $result->fetch(PDO::FETCH_OBJ);

                while ($recettes = $result->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    <div class="col-md-7">
                        <h2 class="featurette-heading"><?php echo $recettes->titre; ?></h2><br>
                        <h2 class="featurette-heading2">Publié par :&nbsp; <?php echo $recettes->prenom; ?></h2><br>
                        <h4 class="featurette-heading2"><strong>Catégorie : &nbsp;</strong><?php echo $recettes->nomCategorie; ?></h4><br>
                        <h4 class="featurette-heading2"><img src="images/cuisson.png" alt=""/><strong>&nbsp; Chapo</strong></h4>
                        <p class="lead"><?php echo $recettes->chapo; ?></p><br>
                        <h4 class="featurette-heading2"><img src="images/cuisson.png" alt=""/><strong>&nbsp; Préparation</strong></h4>
                        <p class="lead"><?php echo $recettes->preparation; ?></p><br>
                        <h4 class="featurette-heading2"><img src="images/fourchette.png" alt=""/><strong>&nbsp; Ingrédient</strong></h4>
                        <p class="lead"><?php echo $recettes->ingredient; ?></p><br>
                        <h4 class="featurette-heading2"><img src="images/temps.png" alt=""/> <strong>&nbsp; Temps</strong></h4>
                        <p class="lead">Préparation :&nbsp;<?php echo $recettes->tempsPreparation; ?></p>
                        <p class="lead">Cuisson :&nbsp;<?php echo $recettes->tempsCuisson; ?></p><br>
                        <h4 class="featurette-heading2"><img src="images/prix.png" alt=""/><strong>&nbsp; Prix</strong></h4>
                        <p class="lead"><?php echo $recettes->prix; ?></p>
                        <hr class="featurette-divider">
                    </div>
                    <hr class="featurette-divider">
                    <div class="col-md-5">
                        <img class="imgAcceuil" src="photos/recettes/<?= $recettes->img; ?>">
                    </div>
                    <?php
                }
            }
            ?>
        </div>



        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->

    <?php include("inc/footer.inc.php") ?>

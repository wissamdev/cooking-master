<?php include("inc/header.inc.php"); ?>
<!-- CONTENT -->

<!-- Interval carousel -->
<script>
    $('.carousel').carousel({
        interval: 1000
    });
</script>


<main role="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-1 premier"></div>
            <div class="col-10 second"> 

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        // Carousel requete de selection aléatoire
                        $result = $pdo->query("SELECT * FROM recettes ORDER BY RAND() LIMIT 3");
                        $row = 1;
                        while ($aleatoire = $result->fetch(PDO::FETCH_OBJ)) {
                            ?>
                            <div class="carousel-item <?php
                            if ($row == 1) {
                                echo "active";
                            }
                            ?>">
                                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" 
                                     preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                                    <rect width="100%" height="100%" fill="#777"/></svg>
                                <img src="photos/recettes/<?= $aleatoire->img; ?>" alt="marmelade"/>
                                <div class="container">
                                    <div class="carousel-caption">
                                        <h1 id="titreCarousel" ><?php echo $aleatoire->titre; ?></h1>
                                        <p id="chapoCarousel" ><?php echo $aleatoire->chapo; ?></p>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $row++;
                        }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-1 trois"></div>
        </div>

        <h1 class="title">Recettes du jour !</h1>

        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7 order-md-1">
                        <h2 class="featurette-heading">Bonjour</h2><br>
                            <p class="lead">Vous avez un déjeuner ou un diner à 
                                préparer pour vos invités mais manquez d’inspiration ?
                                Un petit voyage sur cette sélection de recette de 
                                cuisine devrait résoudre votre problème.</p>
                            <p class="lead">L'Entreprise Cooking depuis 8 ans maintenant</p>
                    </div>
                    <div class="col-md-5 order-md-2">
                        <img class="imgAcceuil" 
                             class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" 
                             src="photos/slides/creme-petits-poids.jpg" alt="slide"/>
                    </div>
                </div>
        </div>
</main>


<!-- /END THE FEATURETTES -->

</div><!-- /.container -->
<?php include("inc/footer.inc.php") ?>
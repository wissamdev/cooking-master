<?php include("inc/init.inc.php"); ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <title>Cooking</title>

        <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">

        <!-- Jquery CDN -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
        crossorigin="anonymous"></script>

        <!-- Bootstrap core CSS -->
        <link href="bootstrap/bootstrap-grid.css" rel="stylesheet">
        <link href="bootstrap/bootstrap-reboot.css" rel="stylesheet">
        <link href="bootstrap/bootstrap.css" rel="stylesheet">

        <!-- Bootstrap Javascript -->
        <script src="bootstrap/popper.js"></script>
        <script src="bootstrap/bootstrap.js"></script>
        <script src="bootstrap/bootstrap.bundle.js"></script>


        <!-- Custom style -->
        <link type="text/css" rel="stylesheet" href="style.css" media="all">
    </head>
    <!--  HEADER -->
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo-cooking1.png" alt="logo" width="116px" height="32px"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" 
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Compte
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                if (isset($_SESSION['login'])) {
                                    ?>
                                    <a class="dropdown-item" href="deconnexion.php">Se deconnecter</a>
                                    <a class="dropdown-item" href="profile.php">Gerer mon compte</a>
                                    <?php
                                } else {
                                    ?>
                                    <a class="dropdown-item" href="connexion.php">Se connecter</a>
                                    <a class="dropdown-item" href="inscription.php">Créer un compte</a>
                                    <?php
                                }
                                ?>
                            </div>
                        </li>
                        <?php  if (isset($_SESSION['login'])) { ?>
                            <li class = "nav-item active">
                            <a class = "nav-link" href = "addrecette.php">Déposer une recette</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="membre-detail.php">Membres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Contact</a>
                        </li>
                    </ul>
                    <form class="form-inline mt-2 mt-md-0" action="recette-detail.php" method="post">
                        <input class="form-control mr-sm-2" type="text" placeholder="Chercher une recette" 
                               aria-label="Search" name="recette">
                        <button class="btn btn-outline-light" type="submit">Chercher</button>
                    </form>
                </div>
            </nav>
        </header>
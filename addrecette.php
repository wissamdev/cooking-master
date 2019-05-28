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

            <form action="insert-recette.php" method="post">
                <div class="form-group">
                    <label for="nomRecette">Nom de la recette</label>
                    <input type="text" class="form-control" id="nomRecette" name="nomRecette" placeholder="nom">
                </div>
                <div class="form-group">
                    <label for="apropos">A propos</label>
                    <textarea class="form-control" id="apropos" name="apropos" placeholder="Ecrire .."></textarea>
                </div>
                <div class="form-group">
                    <label for="ingredient">Ingrédient</label>
                    <textarea class="form-control" id="ingredient" name="ingredient" placeholder="Ecrire .."></textarea>
                </div>
                <div class="form-group">
                    <label for="preparation">Préparation</label>
                    <textarea class="form-control" id="preparation" name="preparation" placeholder="Ecrire .."></textarea>
                </div>
                <div class="form-group">
                    <label for="PreparationTime">Temps de préparation</label>
                    <input type="text" class="form-control" id="PreparationTime" name="PreparationTime" placeholder="exemple : 1 h 05 min">
                </div>
                <div class="form-group">
                    <label for="CuissonTime">Temps de cuisson</label>
                    <input type="text" class="form-control" id="CuissonTime" name="CuissonTime" placeholder="exemple : 1 h 05 min">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="categorie">Categorie</label>
                        <select id="inputState" class="form-control" name="categorie">
                            <option value="1" selected>Viande</option>
                            <option value="2">Legume</option>
                            <option value="3">Poisson</option>
                            <option value="4">Fruit</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="difficulte">Difficulte</label>
                        <select id="inputState" class="form-control" name="difficulte">
                            <option value="Facile" selected>Facile</option>
                            <option value="Moyen">Moyen</option>
                            <option value="Difficile">Difficile</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Prix</label>
                        <select id="inputState" class="form-control" name="prix">
                            <option value="Pas cher" selected>Pas cher</option>
                            <option value="Abordable">Abordable</option>
                            <option value="Cher">Cher</option>
                        </select>
                    </div>
                </div><br><br>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>

        </div>

        <div class="col-4 trois">

        </div>
    </div>

    <?php include("inc/footer.inc.php") ?>
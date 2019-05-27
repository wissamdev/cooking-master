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
                <fieldset>
                    <br>
                    <p>
                    <label for="nomRecette"><strong>Nom de la recette</strong> :</label>
                    <input type="text" name="nomRecette" id="nomRecette" placeholder="nom"/>
                    </p>
                    <hr class="featurette-divider">
                    <p>
                    <label for="apropos"><strong>A propos</strong> :</label>
                    <textarea name="apropos" id="apropos" rows="3" cols="50" placeholder="Description"></textarea>
                    </p>
                    <hr class="featurette-divider">
                    <p>
                    <label for="ingredient"><strong>Ingredient</strong> :</label>
                    <textarea name="ingredient" id="ingredient" rows="3" cols="50" 
                              placeholder="Ecrire les ingredients necessaires .."></textarea>
                    </p>
                    <hr class="featurette-divider">
                    <p>
                    <label for=preparation><strong>Préparation</strong> :</label>
                    <textarea name="preparation" id="preparation" rows="3" cols="50" 
                              placeholder="Ecrire les étapes à suivre .."></textarea>
                    </p>
                    <hr class="featurette-divider">
                    <h6><strong>Categorie</strong> :</h6><br>
                    <span>
                        <input type="radio" id="legume" name="categorie" value="2" checked>
                        <label for="legumes">Légume</label>
                        <br>
                        <input type="radio" id="viande" name="categorie" value="1">
                        <label for="viande">Viande</label>
                        <br>
                        <input type="radio" id="poisson" name="categorie" value="3">
                        <label for="poisson">Poisson</label>
                        <br>
                        <input type="radio" id="fruit" name="categorie" value="4">
                        <label for="fruit">Fruit</label>
                        <br>
                    </span>
                    <hr class="featurette-divider">
                    <p>
                    <label for="PreparationTime"><strong>Temps de préparation</strong> :</label>
                    <input type="text" name="PreparationTime" id="PreparationTime" placeholder="exemple : 35 min"/>
                    </p>
                    <p>
                    <label for="CuissonTime"><strong>Temps de cuisson</strong> :</label>
                    <input type="text" name="CuissonTime" id="CuissonTime" placeholder="exemple : 1h 45 min"/>
                    </p>
                    <hr class="featurette-divider">
                    <h6><strong>Difficulté</strong> :</h6><br>
                    <span>
                        <input type="radio" id="facile" name="difficulte" value="Facile" checked>
                        <label for="facile">Facile</label>
                        <br>
                        <input type="radio" id="moyen" name="difficulte" value="Moyen">
                        <label for="moyen">Moyen</label>
                        <br>
                        <input type="radio" id="difficile" name="difficulte" value="Difficile">
                        <label for="difficile">Difficile</label>
                        <br>
                    </span>
                    <hr class="featurette-divider">
                    <p>
                    <label for="prix">Prix</label><br />
                    <select name="prix" id="prix">
                        <option value="pascher">Pas cher</option>
                        <option value="abordable" selected>Abordable</option>
                        <option value="cher">Cher</option>
                    </select>
                    </p>
                </fieldset><br><hr><br>
                <p>
                    <input class="btn btn-primary" type="submit" value="Envoyer">
                </p>
            </form>

        </div>

        <div class="col-4 trois">

        </div>
    </div>

    <?php include("inc/footer.inc.php") ?>
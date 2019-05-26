<?php include("inc/header.inc.php") ?>

<main role="main">
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

        <hr class="featurette-divider">

        <!-- /START THE FEATURETTES -->

        <div class="row featurette">
            <div class="col-md-12">
                <h2 class="featurette-heading">Liste de nos membres.</h2>

                <hr class="featurette-divider">

                <table class="table table-striped" border="solid 1px black" >
                    <tr class="lead">
                    <th>avatar</th>
                    <th>prenom</th>
                    <th>nom</th>
                    <th>date de creation</th>
                    </tr>
                    <?php
                    $result3 = $pdo->query("SELECT * FROM membres");
                    $membres = $result3->fetch(PDO::FETCH_OBJ);

                    while ($membres = $result3->fetch(PDO::FETCH_OBJ)) {
                    ?>

                        <tr class="lead">
                        <td><img src="photos/gravatars/<?=$membres->gravatar;?>"></td>
                        <td><?php echo $membres->prenom; ?></td>
                        <td><?php echo $membres->nom; ?></td>
                        <td><?php echo $membres->dateCrea; ?></td>
                        </tr>

                    <?php }
                    ?>
                </table>
            </div>
        </div>



        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


    <?php include("inc/footer.inc.php") ?>
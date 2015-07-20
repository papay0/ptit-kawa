<?php

if (isset($_POST["envoyer"]) AND (strlen($_POST['description']) <= 50))
{
    $idAlbum = idAlbum($_POST['nomAlbum']);
    addDescriptionINBDD(addslashes($_POST['description']), $idAlbum);
    ?>
    <section class="slice bg-3">
        <div class="w-section inverse">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <p>Information :</p>
                        <ul class="list-check">
                            <li><i class="fa fa-check"></i> Description modifiée !</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
else
{
    ?>
    <section class="slice bg-3">
        <div class="w-section inverse">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <div class="w-section inverse">
                            <div class="w-box sign-in-wr bg-5">
                                <div class="col-md-9">
                                    <!-- Alerts -->
                                    <div class="wp-example" id="alerts">
                                        <h3 class="section-title">Attention </h3>
                                        <div class="alert alert-danger">
                                            <strong>A lire :</strong> la longueur de la description de l'album doit être inférieure ou égale à 50 caractères.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="slice bg-3">
        <div class="w-section inverse">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <div class="w-section inverse">
                            <div class="w-box sign-in-wr bg-5">

                                <div class="form-header">
                                    <h2>Formulaire d'ajout / modification de la description d'un album photo.</h2>
                                </div>
                                <div class="form-body">
                                    <p>
                                        Ce formulaire va : ajouter / modifier la description d'un album photo. <br>
                                        En faite, si la description n'existe pas, elle sera créée.
                                    </p>
                                    <form role="form" class="form-light padding-15" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Titre de l'album auquel on veut ajouter / modifier la description :</label>
                                            <?php
                                            global $bdd;
                                            $reponse = $bdd->query('SELECT (name),(urlname) FROM `album` ORDER BY date_event DESC LIMIT 0, 20');
                                            ?>
                                            <select class="selectpicker" data-style="btn-info" name="nomAlbum" >
                                                <?php
                                                while ($donnees = $reponse->fetch())
                                                {
                                                    echo "<option value=".$donnees['urlname'].">".$donnees['name']."</option>";
                                                }
                                                echo "</select>";
                                                ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Ecrire la description : </label>
                                                <input type="text" name="description" class="form-control" >
                                                <button type="submit" name="envoyer" class="btn btn-two pull-right">Modifier !</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}
?>
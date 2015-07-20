<?php

if (isset ($_POST['titre']) AND isset($_POST['date_event']) AND (strlen($_POST['titre']) != 0) AND (strlen($_POST['date_event']) != 0) AND isset($_POST['urlVideo']) AND (strlen($_POST['urlVideo']) != 0))
{
    $titre = $_POST['titre'];
    $date = $_POST['date_event'];
    $urlVideo = $_POST['urlVideo'];
    addVideoTeaserInBDD($titre, $urlVideo, $date);
    ?>
        <section class="slice bg-3">
            <div class="w-section inverse">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <p>Information :</p>
                            <ul class="list-check">
                                <li><i class="fa fa-check"></i> La video a bien été ajoutée!</li>
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

    <table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
        <tr>
            <td id="ds_calclass"></td>
        </tr>
    </table>

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
                                            <strong>A lire :</strong> Vous devez rentrer une adresse YouTube de la forme www.youtube.com/embed/g4dpR6qVAUY <br>
                                            Avec le <strong>/embed/</strong> !
                                        </div>
                                        <ul class="bullet">
                                            <li>
                                                <a href="images/image_description_site/admin/ajouterTeaser/etape1.png" class="btn btn-xs btn-two">ETAPE 1</a>
                                            </li>
                                            <li>
                                                <a href="images/image_description_site/admin/ajouterTeaser/etape2.png" class="btn btn-xs btn-two">ETAPE 2</a>
                                            </li>
                                        </ul>
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
                                    <h2>Formulaire d'ajout de vidéo :</h2>
                                </div>

                                <div class="form-body">

                                    <p>
                                        Ce formulaire va : ...
                                    </p>
                                    <form role="form" class="form-light padding-15" method="post">
                                        <div class="form-group">
                                            <label>Titre de la vidéo </label>
                                            <input type="text" name="titre" class="form-control" maxlength="250">
                                        </div>
                                        <div class="form-group">
                                            <label>URL de la video AVEC LA BONNE FORME </label>
                                            <input type="text" name="urlVideo" class="form-control" maxlength="250">
                                        </div>
                                        <div class="form-group">
                                            <label>Date de l'évenement : </label>
                                            <input type="text" name="date_event" class="form-control" onclick="ds_sh(this);" />
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-two pull-right">Créer!</button>
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
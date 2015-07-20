<?php

if (isset ($_POST['titre']) AND isset($_POST['date_event']) AND (strlen($_POST['titre']) != 0) AND (strlen($_POST['titre']) <= 45) AND (strlen($_POST['date_event']) != 0))
{

    $originalDate = $_POST['date_event'];
   // $newDate = date("m-d-Y", strtotime($originalDate));
    $titre = $_POST['titre'];
    $urlTitre = transformTo_URL($_POST['titre']);



    if (eventExiste($titre, $originalDate) == FALSE )
    {
        creatEventInBDD($titre, $urlTitre, $originalDate);
        ?>
        <section class="slice bg-3">
            <div class="w-section inverse">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <p>Information :</p>
                            <ul class="list-check">
                                <li><i class="fa fa-check"></i> L'event a bien été créé !</li>
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
                        <div class="col-md-7">
                            <p>Attention !!</p>
                            <ul class="list-check">
                                <li><i class="fa fa-times"></i> <?php  echo "L'event nommé : ". $titre . " existe déjà à la même date!     "; ?><i class="fa fa-times"></i></li>
                            </ul>
                            <p>Choisis un autre nom ...</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }



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
                                            <strong>A lire :</strong> Vous devez rentrer un titre ET une date d'évènement.<br>
                                            De plus, la longueur du titre de l'événement doit être inférieure ou égale à 45 caractères!
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
                                    <h2>Formulaire de création d'événement pour le calendrier</h2>
                                </div>

                                <div class="form-body">

                                    <p>
                                        Ce formulaire va : ...
                                    </p>
                                    <form role="form" class="form-light padding-15" method="post">
                                        <div class="form-group">
                                            <label>Titre de l'événement : </label>
                                            <input type="text" name="titre" class="form-control" maxlength="250">
                                        </div>
                                        <div class="form-group">
                                            <label>Date de l'événement</label>
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
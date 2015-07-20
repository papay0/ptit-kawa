<?php

if (isset ($_POST['titre']) AND isset($_POST['date_event']) AND (strlen($_POST['titre']) != 0) AND (strlen($_POST['date_event']) != 0) AND isset($_POST['dateEvent']) AND (strlen($_POST['dateEvent']) != 0))
{

    $newDate = $_POST['date_event'];
    $pastDate = $_POST['dateEvent'];
    // $newDate = date("m-d-Y", strtotime($originalDate));
    $titre = $_POST['titre'];
    $urlTitre = transformTo_URL($_POST['titre']);
    modifierEvent($pastDate, addslashes($titre), $urlTitre, $newDate);
        ?>
        <section class="slice bg-3">
            <div class="w-section inverse">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <p>Information :</p>
                            <ul class="list-check">
                                <li><i class="fa fa-check"></i> L'event a bien été modifié !</li>
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
                                            <strong>A lire :</strong> Je ne sais pas s'il y a quelque chose de compliqué ici ...
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
                                    <h2>Formulaire de modification d'événement :</h2>
                                </div>

                                <div class="form-body">

                                    <p>
                                        Ce formulaire va : ...
                                    </p>
                                    <form role="form" class="form-light padding-15" method="post">
                                        <div class="form-group">
                                            <label>Selection de l'événement à modifier :  </label>
                                            <?php
                                            global $bdd;
                                            $reponse = $bdd->query('SELECT (titre),(dateEvent),(urlTitre) FROM `event` ORDER BY id DESC LIMIT 0, 20');
                                            ?>
                                            <select class="selectpicker" data-style="btn-info" name="dateEvent" >
                                                <?php
                                                while ($donnees = $reponse->fetch())
                                                {
                                                    echo "<option value=".$donnees['dateEvent'].">".$donnees['titre']." - ".$donnees['dateEvent']."</option>";
                                                }
                                                echo "</select>";
                                                ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Titre du nouvel événement : </label>
                                            <input type="text" name="titre" class="form-control" maxlength="250">
                                        </div>
                                        <div class="form-group">
                                            <label>Date du nouvel événement : </label>
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

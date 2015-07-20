<?php

if (isset($_POST["envoyer"]) AND isset($_POST['dateEvent']) AND (strlen($_POST['dateEvent']) != 0))
{

    $dateEvent = $_POST['dateEvent'];
    deleteEvent($dateEvent);

    ?>
    <section class="slice bg-3">
        <div class="w-section inverse">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <p>Information :</p>
                        <ul class="list-check">
                            <li><i class="fa fa-check"></i> L'album a bien été supprimé !</li>
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

                                <div class="form-header">
                                    <h2>Formulaire de suppression d'événement :</h2>
                                </div>
                                <div class="form-body">
                                    <p>
                                        Ce formulaire va : ...
                                    </p>
                                    <form role="form" class="form-light padding-15" method="post">
                                        <div class="form-group">
                                            <label>Titre de l'événement à supprimer :</label>
                                            <?php
                                            global $bdd;
                                            $reponse = $bdd->query('SELECT (titre),(dateEvent),(urlTitre) FROM `event` ORDER BY id DESC LIMIT 0, 20');
                                            ?>
                                            <select class="selectpicker" data-style="btn-info" name="dateEvent" >
                                                <?php
                                                while ($donnees = $reponse->fetch())
                                                {
                                                    //echo "<option value=".$donnees['dateEvent'].">".$donnees['titre']." - ".$donnees['dateEvent']."</option>";
                                                    echo '<option value="'.$donnees['dateEvent'].'">'.$donnees['titre']." - ".$donnees['dateEvent'].'</option>';
                                                }
                                                echo "</select>";
                                                ?>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" name="envoyer" class="btn btn-two pull-right">Supprimer !</button>
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
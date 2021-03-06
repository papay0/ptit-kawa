<?php

if (isset($_POST["envoyer"]))
{
deleteVideoTeaser($_POST['urlVideo']);

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
                                    <h2>Formulaire de suppression de Teaser</h2>
                                </div>
                                <div class="form-body">
                                    <p>
                                        Ce formulaire va : ...
                                    </p>
                                    <form role="form" class="form-light padding-15" method="post">
                                        <div class="form-group">
                                            <label>Titre de l'album à supprimer :</label>
                                            <?php
                                            global $bdd;
                                            $reponse = $bdd->query('SELECT (name),(urlVideo) FROM `video` ORDER BY date_event DESC LIMIT 0, 20');
                                            ?>
                                            <select class="selectpicker" data-style="btn-info" name="urlVideo" >
                                                <?php
                                                while ($donnees = $reponse->fetch())
                                                {
                                                    echo "<option value=".$donnees['urlVideo'].">".$donnees['name']."</option>";
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
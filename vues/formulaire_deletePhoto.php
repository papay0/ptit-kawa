<?php

if (isset($_POST["envoyer"]) AND isset($_POST['etape2Valide']) AND isset($_POST['nomAlbum']) AND isset($_POST['idAlbum']))
{
    deletePhoto($_POST['nomPhoto'], $_POST['idAlbum']);
    unlink("vues/images/album/".$_POST['nomAlbum']."/".$_POST['nomPhoto']);
    unlink("vues/images/album/".$_POST['nomAlbum']."/min/".$_POST['nomPhoto']);
    //---------
    //echo "vues/images/album/".$_POST['nomAlbum']."/".$_POST['nomPhoto'];
    //---------

    if (photoExistInTableVote("../vues/images/album/".$_POST['nomAlbum']."/".$_POST['nomPhoto']) == true)
    {
        deletePhotoInTableVote("../vues/images/album/".$_POST['nomAlbum']."/".$_POST['nomPhoto']);
    }

    ?>
    <section class="slice bg-3">
        <div class="w-section inverse">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <p>Information :</p>
                        <ul class="list-check">
                            <li><i class="fa fa-check"></i> La photo <?php echo $_POST['nomPhoto']; ?> a bien été supprimée !</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php

}
elseif (isset($_POST["envoyer"]) AND isset($_POST['etape1Valide']))
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
                                    <h2>Formulaire de suppression de photo (Etape 2)</h2>
                                </div>
                                <div class="form-body">
                                    <p>
                                        Ce formulaire va : supprimer la photo du serveur et de la base de donnée.
                                    </p>
                                    <form role="form" class="form-light padding-15" method="post">
                                        <div class="form-group">
                                            <label>Nom de la photo à supprimer : </label>
                                            <?php
                                            global $bdd;
                                            $id_album = idAlbum($_POST['nomAlbum']);
                                            $reponse = $bdd->query('SELECT (name) FROM `photo` WHERE id_album="'.$id_album.'"');
                                            echo "<select name=\"nomPhoto\" >";
                                            while ($donnees = $reponse->fetch())
                                            {
                                                //echo '<option value="'.$donnees['name'].'">'.$donnees[\'name\'].'</option>';
                                                echo '<option value="'.$donnees['name'].'">'.$donnees['name'].'</option>';
                                            }
                                            echo "</select>";
                                            ?>
                                            <input type="hidden"  name="etape2Valide"  value="valide">
                                            <input type="hidden" name="idAlbum" value="<?php echo $id_album ?>" />
                                            <input type="hidden" name="nomAlbum" value="<?php echo $_POST['nomAlbum'] ?>" />
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
                                    <h2>Formulaire de suppression de photo (Etape 1)</h2>
                                </div>
                                <div class="form-body">
                                    <p>
                                        <strong>Etape 1 :</strong> On choisit l'album dans lequel la photo est présente. <br>
                                        <strong>Etape 2 :</strong> On choisit la photo qu'on veut supprimer.
                                    </p>
                                    <form role="form" class="form-light padding-15" method="post">
                                        <div class="form-group">
                                            <label>Titre de l'album dans lequel la photo est présente :</label>
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
                                                <input type="hidden"  name="etape1Valide"  value="valide">

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" name="envoyer" class="btn btn-two pull-right">Continuer !</button>
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
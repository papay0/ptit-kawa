<?php

if (isset($_POST["envoyer"]) AND !empty($_FILES))
{
    $file = $_POST["nomAlbum"];
    $uploadDir = "vues/images/album/".$file."/";
    $ext =  strtolower(substr($_FILES['miniature']['name'], -3));
    $nom =  $_FILES['miniature']['name'];
    if ($ext == "png")
    {
        $nom = (substr($_FILES['miniature']['name'], 0, -3)."jpg");
    }
    $id_album = idAlbum($file);
    if (photoExisteDansAlbumID($nom, $id_album) == TRUE)
    {
        resetMiniaturePhoto($id_album);
        addMiniatureInBDDPhoto($nom);
        ?>
        <section class="slice bg-3">
            <div class="w-section inverse">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <p>Information :</p>
                            <ul class="list-check">
                                <li><i class="fa fa-check"></i> La miniature a bien été modifiée !</li>
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
                            <p>Information :</p>
                            <ul class="list-check">
                                <li><i class="fa fa-times"></i> La photo n'est pas (encore?) dans l'album !</li>
                            </ul>

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
                                            <strong>A lire :</strong> Vous devez bien sûr choisir une photo PARMI celles déjà dans l'album!
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
                                    <h2>Formulaire de modification de miniature de l'album.</h2>
                                </div>
                                <div class="form-body">
                                    <p>
                                        Ce formulaire va : modifier la miniature de l'album.
                                    </p>
                                    <form role="form" class="form-light padding-15" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Titre de l'album auquel on veut changer la miniature :</label>
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
                                                <label>Selectionner la miniature :</label>
                                                <input name="miniature" type="file" > <br>
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
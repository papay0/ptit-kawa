<?php

if (isset ($_POST['Prenom'])  AND (strlen($_POST['Prenom']) != 0) AND isset ($_POST['Nom'])  AND (strlen($_POST['Nom']) != 0) AND isset ($_POST['Message'])  AND (strlen($_POST['Message']) != 0) )
{
$nameAlbum = returnNomJolieAlbumFromUrlname($_GET['album']);
    $namePhoto = returnNomJoliePhotoFromUrlnamePhoto($_GET['photo']);
    ?>
    <center><div class="alert alert-info">
Message envoyé.
                </div></center>


    <br>
    <br>

    <?php

    mail("bar@amicale-insat.fr", "Photo PK | ".$nameAlbum." | ".$namePhoto, "Report Photo : \n\n Prenom formulaire : ".$_POST['Prenom']." \n Nom formulaire : ".$_POST['Nom']."\n Prenom réel : ".$_SESSION['prenom']."\n Nom réel : ".$_SESSION['nom']."\n\n Nom de l'album : ". $nameAlbum." \n Nom de la photo : ". $namePhoto." \n\n Message : \n ".$_POST['Message'] );
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
                                            <strong>A lire :</strong> Vous devez rentrer votre vrai nom et prenom, et écrire un message indiquant pourquoi vous voulez supprimer cette photo. (ou tout autre demande!)
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
                                    <h2>Formulaire de report photo si vous êtes pas content !</h2>
                                </div>

                                <div class="form-body">

                                    <p>
                                        Vous pouvez nous demander d'enlever une photo, mais il faudra argumenter !
                                    </p>
                                    <form role="form" class="form-light padding-15" method="post">
                                        <div class="form-group">
                                            <label>Prenom :  </label>
                                            <input type="text" name="Prenom" class="form-control" maxlength="250">
                                        </div>
                                        <div class="form-group">
                                            <label>Nom :  </label>
                                            <input type="text" name="Nom" class="form-control" maxlength="250">
                                        </div>
                                        <div class="form-group">
                                            <label>Message :  </label>
<!--                                            <input type="text" name="Message" class="form-control" maxlength="250">-->
                                            <textarea name="Message" class="form-control" rows="10" cols="50"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-two pull-right">Envoyer!</button>
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
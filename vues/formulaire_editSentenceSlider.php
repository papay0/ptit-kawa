<?php

if (isset($_POST["envoyer"]) AND isset ($_POST['phrase'])  AND (strlen($_POST['phrase']) != 0))
{
    editSentenceSlider(addslashes($_POST['phrase']));
    ?>
    <section class="slice bg-3">
        <div class="w-section inverse">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <p>Information :</p>
                        <ul class="list-check">
                            <li><i class="fa fa-check"></i> La phrase a bien été modifiée !</li>
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
                                    <h2>Formulaire de modification de la phrase du slider dans la page d'accueil :</h2>
                                </div>

                                <div class="form-body">

                                    <p>
                                        Ce formulaire va : modifier blabla
                                    </p>
                                    <form role="form" class="form-light padding-15" method="post">
                                        <div class="form-group">
                                            <label>Ecrire la nouvelle phrase d'accroche : </label>
                                            <input type="text" name="phrase" class="form-control" maxlength="250">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" name ="envoyer" class="btn btn-two pull-right">Changer!</button>
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

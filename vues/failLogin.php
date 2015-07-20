<section class="slice bg-3">
    <div class="w-section inverse">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <div class="w-section inverse">
                        <div class="w-box sign-in-wr bg-5">

                            <div class="form-header">
                                <h2>Connexion</h2>
                            </div>
                            <div class="form-body">
                                <p>
                                    Veuillez réessayer.
                                </p>



                                <form action="index.php?page=login" style="margin-left: 5%; width: 90%;" role="form"  method="post" accept-charset="utf-8">
                                    <div style="display:none;">
                                        <input type="hidden" name="_method" value="POST"/>
                                    </div>
                                    <div class="form-group required">
                                        <label>UTILISATEUR INSA</label>
                                        <input name="login" maxlength="128" class="form-control" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <label>MOT DE PASSE INSA</label>
                                        <input name="pass" class="form-control" type="password" value=""/>
                                    </div>
                                    <input  class="btn-two btn-block btn btn-default" type="submit" value="Connexion"/>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

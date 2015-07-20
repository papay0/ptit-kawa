<h5 class="side-section-title">Utilisateur INSA</h5>
<form action="index.php?page=login" style="margin-left: 5%; width: 90%;" role="form"  method="post" accept-charset="utf-8">
    <div style="display:none;">
        <input type="hidden" name="_method" value="POST"/>
    </div>
    <div class="form-group required">
        <input name="login" maxlength="128" class="form-control" type="text"/>
    </div>
    <h6>MOT DE PASSE INSA</h6>
    <div class="form-group">
        <input name="pass" class="form-control" type="password" />
    </div>
    <input  class="btn-two btn-block btn btn-default" type="submit" value="Connexion"/>
</form>
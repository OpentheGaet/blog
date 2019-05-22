<div class="container" id="register">
    <form class="col-md-12" method="post" action="index.php">
        <div class="form-group">
            <label for="login">Votre login</label>
            <input type="text" name="login" class="form-control" id="login">
        </div>
        <div class="form-group">
            <label for="pass-1">Mot de passe</label>
            <input type="password" name="pass" class="form-control" id="pass-1">
        </div>
        <div class="form-group">
            <label for="pass-2">Confirmer mot de passe</label>
            <input type="password" class="form-control" id="pass-2">
        </div>
        <input type="hidden" name="date" value="<?= date("Y-m-d") ?>">
        <input type="hidden" name="level" value="2">
        <input type="hidden" name="action"  value="Register">
        <input type="hidden" name="method" value="getRegister">
        <input type="hidden" name="php">
        <input type="hidden" name="tk_php" value='<?= $_SESSION['query']['component-register'] ?>'>
        <input type="button" id="send-reg-pass" value="send">
    </form>
    <div id="register-success" style="display:none">
        <p>Yes you are registered</p>
        <div id="fetch-user">
        </div>
    </div>
    <script src="views/user/components-register/js/component-register.js"></script>
</div>

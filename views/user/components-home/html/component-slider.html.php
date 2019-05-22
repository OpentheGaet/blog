<div id="component-slider">
    <button id="press-connect">connect</button>
    <button id="canceld-connect">canceld</button>
    <div id="component-connector" class="container">
        <form class="col-md-4" method="post" id="form-connect">
            <div class="form-group">
                <label for="login">Votre login</label>
                <input type="text" class="form-control" name="login" id="login">
            </div>
            <div class="form-group">
                <label for="password">Votre mot de passe</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <input type="button" id="send-log-pass" class="log-pass" value="Send">
            <a href="?action=Register" class="log-pass">Register</a>
            <button type="submit" id="send-data" hidden>
        </form>
        <script src="views/user/components-home/js/component-connector.js"></script>    
    </div>
    <div id="slider-accessories">
        <button id="before"><img src="web/img/slider/accessories/arrowheads-pointing-to-the-left.png" alt=""></button>
        <button id="pause"><img src="web/img/slider/accessories/pause.png" alt=""></button>
        <button id="play" style="display:none"><img src="web/img/slider/accessories/play-button-sing.png" alt=""></button>
        <button id="next"><img src="web/img/slider/accessories/forward-button.png" alt=""></button>
    </div>
    <script src="views/user/components-home/js/component-slider.js"></script>
</div>

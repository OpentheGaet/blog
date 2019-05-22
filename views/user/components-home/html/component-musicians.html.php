
<div id="title">
    <h1>Welcome to Music Store</h1>
</div>
<div id="components-musicians" class="container">
    <div id="component-albums" class="col-md-3 intro">
        <h3>Album</h3>
        <img src="web/img/home/music-album.png" id="ajax-album-show" alt="">
        <img src="web/img/home/music-album.png" id="ajax-album-hide" alt="" style="display:none">
        <input type="hidden" value="1" id="ajax-album-val">
        <input type="hidden" value='<?= $_SESSION['query']['component-album'] ?>' id="token-cpnt-album">
        <script src="views/user/components-home/js/component-albums.js"></script>
    </div>
    <div id="component-styles" class="col-md-3 intro">
        <h3>Style</h3>
        <img src="web/img/home/style.png" id="ajax-style-show" alt="">
        <img src="web/img/home/style.png" id="ajax-style-hide" alt="" style="display:none">
        <input type="hidden" value="1" id="ajax-style-val">
        <input type="hidden" value='<?= $_SESSION['query']['component-style'] ?>' id="token-cpnt-style">
        <script src="views/user/components-home/js/component-styles.js"></script>
    </div>
    <div id="component-artists" class="col-md-3 intro">
        <h3>Artist</h3>
        <img src="web/img/home/artist.png" id="ajax-artist-show" alt="">
        <img src="web/img/home/artist.png" id="ajax-artist-hide" alt="" style="display:none">
        <input type="hidden" value="1" id="ajax-artist-val">
        <input type="hidden" value='<?= $_SESSION['query']['component-artist'] ?>' id="token-cpnt-artist">
        <script src="views/user/components-home/js/component-artists.js"></script>
    </div>
    <script src="views/user/components-home/components-musicians.js"></script>
    <link href="web/css/blog.css" rel="stylesheet" type="text/css">
</div>
<div class="container" id="show-info" style="display:none">
</div>
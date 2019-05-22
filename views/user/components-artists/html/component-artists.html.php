<div id="title">
    <h1>Our Artists</h1>
</div>
<div class="container">
<?php foreach($fetch as $art) :?>
    <div class="col-md-3 intro artists">
        <p class="text-primary"><b><?=$art['art_nom']?></b></p>
    </div>
<?php endforeach ;?>
</div>

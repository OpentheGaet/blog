<div id="warp-container">
<?php $album = $fetch; if($album != false):?>
    <div class="container">
        <div class="col-md-4">
            <img src="web/img/Albums/<?=$album['alb_image']?>" alt="<?=$album['alb_image']?>'" id="alb-image">
        </div>
        <div class="col-md-8" id="album-info">
            <h3><?=$album['alb_nom']?></h3>
            <p>Artist : <?=$album['art_nom']?>.</p>
            <p>Album name : <?=$album['alb_nom']?>.</p>
            <p>Date of parution : <?=$album['alb_date']?>.</p>
            <p>Music style : <?=$album['gen_nom']?>.</p>
            <p class="text-primary">Price : <?=$album['alb_prix']?> €.</p>
        </div>
    </div>
<?php else :?>
    <div class="container no-found">
        <div class="col-md-12">
            <p>Sorry, the album you have requested for was not found.</p>
        </div>
    </div>
<?php endif ?>
</div>
<div id="title">
    <h1>Our Styles</h1>
</div>
<div class="container">
<?php foreach($fetch as $sty) :?>
    <div class="col-md-3 intro styles">
        <p class="text-primary"><b><?=$sty['gen_nom']?></b></p>
    </div>
<?php endforeach; ?>
</div>
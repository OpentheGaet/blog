<div id="title">
    <h1>Our Albums</h1>
</div>
<div class="container">
<?php foreach($fetch as $alb) :?>
    <div class="col-md-4">
        <a href="?action=Album&amp;param=<?=$alb['alb_id']?>"><img src="web/img/Albums/<?=$alb['alb_image']?>" alt="<?=$alb['alb_image']?>" class="albs-images"></a>
    </div>
<?php endforeach ;?>
</div>


<section id="contents" class="main">
<p> Retrouvez ici tout les chapitres ! </p>

<?php 
foreach($billets as $billet): ?>
    <p><a class="contents" href ="<?php echo $billet->url; ?>"><?php echo $billet-> titre;?> </a></p>
    <p><?php echo $billet->extrait;?></p>
<?php endforeach; ?> 

</section>
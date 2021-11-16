<section id="contents" class="main">
<p> Retrouvez ici tout les chapitres ! </p>

<?php 
foreach($billets as $billet): ?>
    <h3><a class="contents" href ="<?php echo $billet->url; ?>"><?php echo $billet-> titre;?> </a></h3>
    <p>Mis en ligne le : <?php echo $billet->date_publi;?></p>
<?php endforeach; ?> 

</section>
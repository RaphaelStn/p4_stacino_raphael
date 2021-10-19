<p> Retrouvez ici tout les chapitres ! </p>

<?php foreach(App::getInstance()->getTable('Billet')->all() as $billet): ?>
<h3> <a href ="<?php echo $billet->url; ?>"><?php echo $billet-> titre;?> </a></h3>
<p> <?php echo $billet-> date_creation;?> </p>
<?php endforeach; ?> 
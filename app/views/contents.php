<?php  // On init l'instance unique App via function static et singleton, stocké dans $app. $app nous permet d'appeler les différentes tables selon leur nom (billet, comm).
$app = App::getInstance();
$app->setTitle('Chapitres');
?>

<section id="contents" class="main">
<p> Retrouvez ici tout les chapitres ! </p>

<?php 
    foreach($app->getTable('Billet')->all() as $billet): 
?>

<h3> <a href ="<?php echo $billet->url; ?>"><?php echo $billet-> titre;?> </a></h3>
<p> <?php echo $billet-> date_creation;?> </p>

<?php endforeach; ?> 

</section>
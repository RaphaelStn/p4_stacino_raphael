<?php  // On init l'instance unique App via function static et singleton, stocké dans $app. $app nous permet d'appeler les différentes tables selon leur nom (billet, comm).
$app = App::getInstance();
$app->setTitle('Chapitres');
?>

<section id="contents" class="main">
<p> Retrouvez ici tout les chapitres ! </p>

<?php 
    foreach($app->getTable('Billet')->all() as $billet): 
?>

<p><a class="contents" href ="<?php echo $billet->url; ?>"><?php echo $billet-> titre;?> </a></p>
<p><?php echo $billet->extrait;?></p>

<?php endforeach; ?> 

</section>
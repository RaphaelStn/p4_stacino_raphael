<?php  // On init l'instance unique App via function static et singleton, stocké dans $app. $app nous permet d'appeler les différentes tables selon leur nom (billet, comm).
$app = App::getInstance();
$billet = $app->getTable('billet')->find($_GET['id']);
$app->setTitle($billet->titre);
if($billet === false) {
    $app->notFound();
}
?>

<section id="chapitre" class="main">
<!-- On recupère un chapitre -->
<h3> <?php echo $billet -> titre; ?> </h3>
<p> <?php echo $billet -> date_creation; ?> </p>
<p> <?php echo $billet -> contenu; ?> </p>

<?php foreach($app->getTable('Comm')->all() as $comm): ?>
        <h3> <?php echo $comm -> pseudo;?> </h3>
        <p> <?php echo $comm -> contenu;?> </p>
<?php endforeach; ?>
</div>
</section>

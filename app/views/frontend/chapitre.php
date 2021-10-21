<?php  // On init l'instance unique App via function static et singleton, stocké dans $app. $app nous permet d'appeler les différentes tables selon leur nom (billet, comm).

$app = App::getInstance();
$billet = $app->getTable('billet')->find($_GET['id']);
if($billet === false) {
    $app->notFound();
}
$app->setTitle($billet->titre);
if(!empty($_POST) AND isset($_POST['post_com'])) {
    $result = $app->getTable('Comm')->create(['pseudo' => $_POST['pseudo'], 'contenu' => $_POST['commentaire'], 'id_billet' => $_GET['id']]);
}
?>

<section id="chapitre" class="main">

<!-- On recupère un chapitre -->
<h3> <?php echo $billet -> titre; ?> </h3>
<p> <?php echo $billet -> contenu; ?> </p>
<hr>

<!-- Formulaire de création de commentaires -->
<p> Vous pouvez laisser un commentaire en remplissant le formulaire ci-dessous.</p>
<form method='post'>
    <p><input type="text" name="pseudo", placeholder="Votre Pseudo"/></p>
    <textarea type="textarea" name="commentaire" cols="40" rows="4"></textarea>
    <p><button class="btn btn-primary" type="submit" name="post_com">Poster</button></p>
</form>



<!-- On affiche les commentaires -->
<table class="table">
    <tbody>
        <?php foreach($app->getTable('Comm')->all() as $comm): ?>
        <tr> 
            <td><?php echo $comm -> pseudo;?></td>
            <td><?php echo $comm -> contenu;?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</section>

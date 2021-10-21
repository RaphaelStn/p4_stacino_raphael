<?php  // On init l'instance unique App via function static et singleton, stocké dans $app. $app nous permet d'appeler les différentes tables selon leur nom (billet, comm).

$app = App::getInstance();
$billet = $app->getTable('billet')->find($_GET['id']);
if($billet === false) {
    $app->notFound();
}
$app->setTitle($billet->titre);
if(!empty($_POST) AND isset($_POST['post_comm'])) { // On post le commentaire
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
    <p><button class="btn btn-primary" type="submit" name="post_comm">Poster</button></p>
</form>


<?php // Signalement du commentaire.
if(!empty($_POST) AND isset($_POST['report_comm'])) { 
    $result = $app->getTable('Comm')->report($_POST['comm_id']);
    if($result) {
        ?>
        <div class="btn btn-warning">
            Le commentaire à été signalé! 
        </div>
    <?php
    }
}
?>

<!-- On affiche les commentaires -->
<table class="table">
    <tbody>
        <?php foreach($app->getTable('Comm')->all() as $comm): ?>
        <tr> 
            <td><?php echo $comm -> pseudo;?></td>
            <td><?php echo $comm -> contenu;?></td>
            <td>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="comm_id" value="<?php echo $comm->comm_id;?>">
                    <button class="btn btn-warning"  type="submit" name="report_comm"><i class="fas fa-exclamation"></i></button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</section>

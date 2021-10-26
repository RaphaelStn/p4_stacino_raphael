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
<!-- On affiche les commentaires -->
<?php
if($success_report) {
    ?>
    <div class="btn btn-success">Le commentaire à signalé</div>
    <?php
}
?>
<table class="table">
    <tbody>
        <?php foreach($comms as $comm): ?>
        <tr> 
            <td><?php echo $comm -> pseudo;?></td>
            <td><?php echo $comm -> contenu;?></td>
            <td>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="comm_id" value="<?php echo $comm -> comm_id;?>">
                    <button class="btn btn-warning"  type="submit" name="report_comm"><i class="fas fa-exclamation"></i></button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</section>

<section id="chapitre" class="main">

<!-- On recupère un chapitre -->
<h3> <?php echo $billet -> titre; ?> </h3>
<p> Publié le : <?php echo date("d/m/Y", strtotime($billet->date_publi)); ?> </p>
<p> <?php echo $billet -> contenu; ?> </p>
<hr>

<!-- Formulaire de création de commentaires -->
<p> Vous pouvez laisser un commentaire en remplissant le formulaire ci-dessous.</p>
<form method='post'>
    <div class="col-sm-6">    
        <input class ="form-control form-control" type="text" name="pseudo" maxlength="20" placeholder="Votre Pseudo"/>
        <textarea class ="form-control form-control" type="textarea" name="commentaire" cols="40" maxlength="255" rows="4" placeholder="votre commentaire"></textarea>
        <div>
            <button class="btn btn-primary" type="submit" name="post_comm">Poster</button>
            <?php
                if($success_report) {
            ?>
                <div class="btn nav-admin btn-success">Le commentaire à signalé</div>
            <?php
            }
            ?>
        </div>
    </div>
</form>
<!-- On affiche les commentaires -->
</br>
<table class="table table-hover">
    <tbody>
        <?php foreach($comms as $comm): ?>
        <tr> 
            <td><?php echo $comm -> pseudo;?></td>
            <td><?php echo $comm -> contenu;?></td>
            <td>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="comm_id" value="<?php echo $comm -> comm_id;?>">
                    <button class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Signaler le commentaire" data-offset="0, 15" type="submit" name="report_comm"><i class="fas fa-exclamation"></i></button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</section>

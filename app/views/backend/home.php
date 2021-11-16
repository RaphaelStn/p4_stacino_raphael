<section class="main" id="adminpage">
<h1> Interface d'administration </h1>
<p> Ici vous pouvez éditer chaque chapitres, ou ajouter un chapitre. Vous pouvez également gérer les commentaires d'un chapitre en éditant le chapitre. 
    Un chapitre sera publié au moment de la date défini.</p>
<form method="post" action="">
    <a class="btn btn-success" href="./index.php?action=add">Ajouter un chapitre</a>
    <button class="btn btn-secondary nav-admin" type="submit" name="disconnect">Se déconnecter</button>
</form>
<table class="table table-hover table-responsive-xl">
    <thead>
        <tr>
            <td>Titre</td>
            <td>Date de publication</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($billets as $billet): ?>
        <tr>
            <td><?php echo $billet->titre;?></td>
            <td>
                <?php
                    if($billet->date_publi === null) {
                        echo 'Date de publication non défini';
                    } else 
                    echo date("d/m/Y", strtotime($billet->date_publi));
            ?></td>
            <td>
                <a class="btn btn-primary" href=".\index.php?action=edit&id=<?php echo $billet->id;?>"> Editer </a>
                <form action="?action=delete" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?php echo $billet->id;?>">
                    <button class="btn btn-danger" type="submit" name="delete" onclick="return confirm('Voulez-vous vraiment supprimer le chapitre?');">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach;?>
    </tody>
</table>


<p> Ces commentaires ont été signalé par les utilisateurs, validez pour confirmer le commentaire, sinon supprimez-le.</p>
<?php
if($success_validate) {
    ?>
    <div class="btn btn-success">Le commentaire à été sauvegardé</div>
    <?php
}
if($success_delete) {
    ?>
    <div class="btn btn-success">Le commentaire à été supprimé</div>
    <?php
}
?>
<table class="table table-hover table-responsive-xl">
    <thead>
        <tr>
            <td>Pseudo</td>
            <td>Contenu</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reports as $report): ?>
        <tr>
            <td><?php echo $report->pseudo;?></td>
            <td><?php echo $report->contenu;?></td>
            <td>
                <form action="" method="post" style="display: inline;">
                    <input type="hidden" name="comm_id" value="<?php echo $report->comm_id;?>">
                    <button class="btn btn-success" type="submit" name="valider">Valider</button>
                </form>
            </td>
            <td>
            <form action="" method="post" style="display: inline;">
                    <input type="hidden" name="comm_id" value="<?php echo $report->comm_id;?>">
                    <button class="btn btn-danger" type="submit" name="refuser">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach;?>
    </tody>
</table>
</section>
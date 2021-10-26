<section class="main" id="adminpage">
<h1> Interface d'administration </h1>
<p> Ici vous pouvez éditer chaque chapitres, ou ajouter un chapitre. Vous pouvez également gérer les commentaires d'un chapitre en éditant le chapitre. </p>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($billets as $billet): ?>
        <tr>
            <td><?php echo $billet->id;?></td>
            <td><?php echo $billet->titre;?></td>
            <td>
<<<<<<< HEAD
                <a class="btn btn-primary" href=".\index.php?action=edit&id=<?php echo $billet->id;?>"> Editer </a>
=======
                <a class="btn btn-primary" href="..\index.php?action=edit&id=<?php echo $billet->id;?>"> Editer </a>
>>>>>>> d0735e22d50eaeeb5eabf92dd4771d8c717a85f5
                <form action="?action=delete" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?php echo $billet->id;?>">
                    <button class="btn btn-danger" type="submit" name="delete" onclick="return confirm('Voulez-vous vraiment supprimer le chapitre?');">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach;?>
    </tody>
</table>

<form method="post" action="">
<<<<<<< HEAD
    <a class="btn btn-success" href="./index.php?action=add">Ajouter un chapitre</a>
=======
    <a class="btn btn-success" href="../index.php?action=add">Ajouter un chapitre</a>
>>>>>>> d0735e22d50eaeeb5eabf92dd4771d8c717a85f5
    <button class="btn btn-secondary nav-admin" type="submit" name="disconnect">Se déconnecter</button>
</form>
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
<table class="table">
    <thead>
        <tr>
            <td>Chapitre</td>
            <td>Pseudo</td>
            <td>Contenu</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reports as $report): ?>
        <tr>
            <td><?php echo $report->comm_id;?></td>
            <td><?php echo $report->pseudo;?></td>
            <td><?php echo $report->contenu;?></td>
            <td>
                <form action="" method="post" style="display: inline;">
                    <input type="hidden" name="comm_id" value="<?php echo $report->comm_id;?>">
                    <button class="btn btn-success" type="submit" name="valider">Valider</button>
                </form>
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
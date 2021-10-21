<?php 
use Core\Auth\DBAuth;

$app = App::getInstance();
$app-> setTitle('Page Admin');
$auth = new DBAuth($app->getdb());
$billets = $app->getTable('billet')->all();
?>
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
                <a class="btn btn-primary" href="..\public\admin.php?action=edit&id=<?php echo $billet->id;?>"> Editer </a>
                <form action="?action=delete" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?php echo $billet->id;?>">
                    <button class="btn btn-danger" type="submit" name="delete">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach;?>
    </tody>
</table>
<?php
if(isset($_POST['disconnect'])){
    unset($_SESSION['auth']);
    header('location:index.php');
}
?>

<form method="post" action="?">
    <a class="btn btn-success" href="../public/admin.php?action=add">Ajouter un chapitre</a>
    <button class="btn btn-secondary nav-admin" type="submit" name="disconnect">Se déconnecter</button>
</form>
<p> Ces commentaires ont été signalé par les utilisateurs, validez pour confirmer le commentaire, sinon supprimez-le.</p>
<?php
$reports = $app->getTable('comm')->getReported();
if(!empty($_POST) AND isset($_POST['refuser'])) { // Suppression du commentaire
    $result = $app->getTable('Comm')->delete($_POST['comm_id']);
    if($result) {
        ?>
        <div class="btn btn-success">
            Le commentaire à été Supprimé ! 
        </div>
    <?php
    }
}
if(!empty($_POST) AND isset($_POST['valider'])) { // validation du commentaire
    $result = $app->getTable('Comm')->removeReport($_POST['comm_id']);
    if($result) {
        ?>
        <div class="btn btn-success">
            Le commentaire à été validé ! 
        </div>
    <?php
    }
}
$reports = $app->getTable('comm')->getReported();
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
            <td><?php echo $report->titre;?></td>
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
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
</section>
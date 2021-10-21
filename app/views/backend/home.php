<?php 
use Core\Auth\DBAuth;
use Core\HTML\Form;

$app = App::getInstance();
$app-> setTitle('Page Admin');
$auth = new DBAuth($app->getdb());
$billets = $app->getTable('billet')->all();
?>
<h1> Page admin <h1>
<p> Ici vous pouvez éditer chaque chapitres, ou ajouter un chapitre </p>
<a href="../public/admin.php?action=add">Ajouter un chapitre ! </a>
<table class="blueTable">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Date de création</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($billets as $billet): ?>
        <tr>
            <td><?php echo $billet->id;?></td>
            <td><?php echo $billet->titre;?></td>
            <td><?php echo $billet->date_creation;?></td>
            <td>
                <a href="..\public\admin.php?action=edit&id=<?php echo $billet->id;?>"> Editer </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tody>
</table>
<?php
if(isset($_POST['disconnect'])){
    unset($_SESSION['auth']);
    header('location:index.php');
}
$form = new Form($_POST);
?>

<form method="post">
<?php echo $form->submit('disconnect', 'Se déconnecter');?>
</form>
</section>
<?php 

$app::getInstance();
$app-> setTitle('Edition');
if(!empty($_POST) AND isset($_POST['update'])) {
    $result = $app->getTable('billet')->update($_GET['id'], [ 'titre' => $_POST['titre'], 'contenu' => $_POST['contenu']]);
    if($result) {
        ?> 
        <div class="btn btn-success"> Le chapitre à été mis à jour. </div>
        <?php
    }
}
$billet = $app -> getTable('billet')->find($_GET['id']);

?>

<section id="id" class="main">
<p> Vous pouvez ici éditer votre chapitre </p>
<form method="post">
<input type="text" name="titre" value="<?php echo $billet->titre;?>"/>
<textarea name='contenu'>
    <?php echo $billet->contenu;?>
</textarea>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      height:'450px'
   });
</script>
<button class="btn btn-primary" type="submit" name="update">Mettre à jour</button>
<a class="btn btn-success" href="..\public\admin.php"> Retour au menu admin</a>


<!-- administration des commentaires -->
<?php
if(!empty($_POST) AND isset($_POST['deleteComm'])) {
    $result = $app->getTable('Comm')->delete($_POST['comm_id']);
    if($result) {
    }
}
?>
<table class="table">
    <tbody>
        <?php foreach($app->getTable('Comm')->all() as $comm): ?>
        <tr> 
            <td><?php echo $comm -> pseudo;?></td>
            <td><?php echo $comm -> contenu;?></td>
            <td>                
                <form action="" method="post" style="display: inline;">
                    <input type="hidden" name="comm_id" value="<?php echo $comm->comm_id;?>">
                    <button class="btn btn-danger" type="submit" name="deleteComm">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</section>

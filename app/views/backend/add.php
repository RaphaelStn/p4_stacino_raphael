<?php 
use Core\HTML\Form;

$app::getInstance();
$app-> setTitle('Ajout');

if(!empty($_POST AND isset($_POST['create']))) {
    $result = $app->getTable('billet')->create(['titre' => $_POST['titre'], 'contenu' => $_POST['contenu']]);
    if($result) {
        ?> 
        <div class="success"> Le chapitre à été crée. </div>
        <?php
    }
}
$form = new Form($_POST);
?>

<section id="id" class="main">
<p> Vous pouvez ici ajouter un nouveau chapitre</p>
<form method="post">
<?php echo $form->input('titre', null, null);?>
<textarea name='contenu'>
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
<?php echo $form->submit('create','Ajouter');?>
<a href="..\public\admin.php"> Retour au menu admin</a>
</section>
<?php 
use Core\HTML\Form;

$app::getInstance();
$app-> setTitle('Edition');
if(!empty($_POST AND isset($_POST['update']))) {
    $result = $app->getTable('billet')->update($_GET['id'], [ 'titre' => $_POST['titre'], 'contenu' => $_POST['contenu']]);
    if($result) {
        ?> 
        <div class="success"> Le chapitre à été mis à jour. </div>
        <?php
    }
}
$billet = $app -> getTable('billet')->find($_GET['id']);
$form = new Form($_POST);

?>

<section id="id" class="main">
<p> Vous pouvez ici éditer votre chapitre </p>
<form method="post">
<?php echo $form->input('titre', null,  $billet->titre);?>
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
<?php echo $form->submit('update','Mettre à jour');?>
<a href="..\public\admin.php"> Retour au menu admin</a>
</section>

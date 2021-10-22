<section id="id" class="main">
<p> Vous pouvez ici ajouter un nouveau chapitre</p>
<form method="post">
<input type="text" name="titre"/>
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
<button class="btn btn-primary" type="submit" name="create">Ajouter le chapitre</button>
<a class="btn btn-success" href="..\public\index.php?action=admin"> Retour au menu admin</a>
<?php
if($success_add) {
    ?>
    <div class="btn btn-success">Le chapitre à été ajouté</div>
    <?php
}
?>
</section>
<section id="id" class="main">
<p> Vous pouvez ici éditer votre chapitre </p>
<form method="post">
    <p>Titre : </p>
    <input type="text" name="titre" maxlength="20" value="<?php echo $billet->titre;?>"/>
    <p> </br> Date de publication : </p>
    <input type="date" name="date" value="<?php echo $billet->date_publi;?>"/>
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
</form>
<a class="btn btn-success" href=".\index.php?action=admin"> Retour au menu admin</a>

<table class="table">
    <tbody>
        <?php foreach($comms as $comm): ?>
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

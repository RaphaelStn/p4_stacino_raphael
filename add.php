<?php // On récupère la dabatase en local host, avec erreur
try {
	        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
?>

<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset="utf-8">
    <meta name="description" content="Blog de Jean Forteroche, auteur et écrivain.">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <title>Blog de Jean Forteroche</title>
    <link href="./assests/style.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/pa1f95o2vkvnul9irycx24w2i8h35vyjunuuukwvcl9gt7af/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
<!-- Header -->
<header>
    <?php include('./includes/header.php'); ?>
</header>
<section>
    <form action= "./add.php" method ="post">
        <textarea name="contenu"> 
        <?php 
            if(isset($_GET['id'])) { // On vérifie une ID dans l'URL, si présente, on affiche dans TINY MCE le contenu correspondant à l'ID
                $reponse = $bdd -> prepare('SELECT * FROM billets WHERE id = :id');
                $reponse -> execute(array('id' => $_GET['id']));
                while ( $donnee = $reponse->fetch()) {
                    echo $donnee['contenu'];
                }
            }
        ?>
        </textarea>
        <script>
            tinymce.init({ // Initiatlisaion du TINYMCE
                selector: 'textarea',
                plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
                toolbar_mode: 'floating',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                height : '480',
                
            });
        </script>
        <p> Titre du chapitre : <input type='text' name='titre' value= '<?php 
            if(isset($_GET['id'])) { // On vérifie une ID dans l'URL, si présente, on affiche dans input titre le titre correspondant l'ID
                $reponse = $bdd -> prepare('SELECT * FROM billets WHERE id = :id');
                $reponse -> execute(array('id' => $_GET['id']));
                while ( $donnee = $reponse->fetch()) {
                    echo $donnee['titre'];
                }
            }
        ?>'/> </p>
        <input type="hidden" name="id" class="idBillet" value ='<?php // On ajoute une input hidden pour récuperer l'ID et la réinjecter dans notre form en methode POST, et si pas d'id, on donne une value NULL pour l'affiche du bouton "supprimer".
            if(isset($_GET['id'])) {
                echo $_GET['id'];
            }
            else {
                echo 'null';
            }
        ?>'/>
        <input type="submit" name="submit" value="Enregistrer"/>
        <input type="submit" name="delete" class="deleteBtn" style="visibility:hidden;" value="Supprimer le billet" onclick="return confirm('Êtes-vous sur de vouloir supprimer le billet?')"/>
        
        <script> // Un petit script pour cacher le button supprimer si aucune ID dans l'URL, donc nouveau billet.
            let deleteBtn = document.querySelector(".deleteBtn");
            let idBillet = document.querySelector(".idBillet").value;
            if(idBillet != 'null') {
                deleteBtn.style.visibility ="visible";
            }
        </script>
        <?php
        if (isset($_POST['submit']) AND !empty($_POST['titre']) AND !empty($_POST['contenu'])) { // On vérifie les valeurs recu via POST
            if($_POST['id'] != 'null') { // Si on a un ID recu via POST, le button submit va update le contenu de la database
                $reponse = $bdd -> prepare('UPDATE billets SET titre = :titre, contenu = :contenu WHERE id = :id');
                $reponse -> execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu'], 'id' => $_POST['id']));
            }
            else { // Sinon on crée une nouvelle entrée
                $reponse = $bdd -> prepare('INSERT INTO billets (date_creation, titre, contenu) VALUE (NOW(), :titre, :contenu)');
                $reponse -> execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu']));
                echo "<script>alert(\"la variable est nulle\")</script>";
            }
        }
        else if(isset($_POST['delete']) AND !empty($_POST['id'])) { // Et si on selectionne l'input delete et qu'on a une ID valide, on supprimer l'entrée correspondante
            $reponse = $bdd -> prepare('DELETE FROM billets WHERE id = :id');
            $reponse -> execute(array('id' => $_POST['id']));
        }
    ?>
    </form>
</section>
</body>
</html>
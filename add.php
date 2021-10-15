<?php
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
            if(isset($_GET['id'])) { // On vérifie une ID dans l'URL pour éditer 
                $id = ($_GET['id']);
                $reponse = $bdd->prepare('SELECT * FROM billets WHERE id = ?');
                $reponse->execute(array($_GET['id'] = "$id"));
                while ( $donnee = $reponse->fetch()) {
                    echo $donnee['contenu'];
                }
            }
        ?>
        </textarea>
        <script>
            tinymce.init({
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
            if(isset($_GET['id'])) { // On vérifie une ID dans l'URL pour éditer 
                $id = ($_GET['id']);
                $reponse = $bdd->prepare('SELECT * FROM billets WHERE id = ?');
                $reponse->execute(array($_GET['id'] = "$id"));
                while ( $donnee = $reponse->fetch()) {
                    echo $donnee['titre'];
                }
            }
        ?>'/> </p>
        <input type="hidden" name="id" value ='<?php
            if(isset($_GET['id'])) {
                echo $_GET['id'];
            }
        ?>'/>
        <input type="submit" name="submit"/>
        <?php
        if (isset($_POST['contenu']) AND isset($_POST['titre'])) {
            $contenu = $_POST['contenu'];
            $titre = $_POST['titre'];
            if(!empty($_POST['id'])) {
                $reponse = $bdd->prepare('UPDATE billets SET titre = :titre, contenu = :contenu WHERE billets . id = :id');
                $reponse -> execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu'], 'id' => $_POST['id']));
            }
            else {
            $reponse = $bdd->query("INSERT INTO billets (date_creation, titre, contenu) VALUE (NOW(),'$titre','$contenu')");
            }
        }
    ?>
    </form>
</section>
</body>
</html>
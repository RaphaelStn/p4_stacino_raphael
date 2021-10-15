<?php
try {
    // On récupère notre Database
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
</head>
<body>
<!-- Header -->
<header>
    <?php include('./includes/header.php'); ?>
</header>
<!-- Section chapitres -->
<section id="chapitres">
<!-- Récupération des chapitres -->
<?php
    $reponse = $bdd->query('SELECT * FROM billets');
    while ( $donnee = $reponse->fetch()) {
?>
<div>
    <?php 
        if(isset($_GET['id'])) { // On vérifie une ID dans l'URL A CHANGER POUR UNE REQUETE EN :id !!!
            $id = ($_GET['id']);
            $reponse = $bdd->prepare('SELECT * FROM billets WHERE id = ?');
            $reponse->execute(array($_GET['id'] = "$id"));
            while ( $donnee = $reponse->fetch()) {
                echo '<h1>' . $donnee['titre'] . '</h1>';
                echo  $donnee['contenu'];
            }
        }
    ?>
    </br>
    <a href='./contents.php'> Retour à la séléction de chapitre</a>
</div>
<?php
    }
    $reponse->closeCursor();
?>
</section>
</body>
</html>
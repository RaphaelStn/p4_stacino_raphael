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
</head>
<body>
<!-- Header -->
<header>
    <?php include('./includes/header.php'); ?>
</header>
<!-- Section chapitres -->
<section>
<!-- Récupération des chapitres -->
<?php
    $reponse = $bdd->query('SELECT * FROM billets');
    while ( $donnee = $reponse->fetch()) {
?>
<div>
    <?php 
        if(isset($_GET['id'])) { // On affiche le chapitre via l'URL et la méthode GET
            $reponse = $bdd->prepare('SELECT * FROM billets WHERE id = :id');
            $reponse->execute(array('id' => $_GET['id']));
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
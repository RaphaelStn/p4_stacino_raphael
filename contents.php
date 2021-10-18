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
    $reponse = $bdd->query('SELECT * FROM billets ORDER BY titre');
    while ( $donnee = $reponse->fetch()) {
?>
<div class="chapitre">
        <a href='./chapitre.php?id=<?php echo $donnee['id'];?>'> <h3 class="titre-billets"> <?php echo $donnee['titre'];?> </h3></a> <!-- On séléctionne le bon chapitre grâce à la transmission de l'ID dans les paramètres de l'URL -->
        <p class="date-creation-billets"> <?php echo $donnee['date_creation'];?> </p> 
</div>
<?php
    }
    $reponse->closeCursor();
?>
</section>
</body>
</html>
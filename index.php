<!-- Récupération de la DB -->
<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
}
?>
<!-- Début de l'HTML -->
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
<!-- Section blog -->
<section id="blog">
<!-- Récupération des billets -->
<?php
    $reponse = $bdd->query('SELECT * FROM billets');
while ( $donnee = $reponse->fetch()) {
?>
<div class="billets">
    <h3 class="titre-billets"> <?php echo $donnee['titre'];?> </h3>
    <p class="date-creation-billets"> <?php echo $donnee['date_creation'];?> </p>
    <p class="contenu-billets"> <?php echo $donnee['contenu']; ?> </p>
<?php
}
$reponse->closeCursor();
?>
</section>
</body>
</html>
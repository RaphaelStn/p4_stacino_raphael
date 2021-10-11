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
    <h2> Bienvenue sur le blog de Jean Forteroche</h2> 
    <p>
        Vous pouvez retrouver ici les 3 derniers chapitres du nouveau livre de Jean Forteroche, 
        ou vous pouvez naviguer dans le menu pour retrouver l'intégralité des chapitres
    </p>
<!-- Récupération des billets -->
<?php
    try {
	    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    $reponse = $bdd->query('SELECT * FROM (SELECT * FROM billets ORDER BY id DESC LIMIT 3) lastNrows_subquery ORDER BY id');
    while ( $donnee = $reponse->fetch()) {
?>
<div class="billets">
    <div class="billets-div">
        <h3 class="titre-billets"> <?php echo $donnee['titre'];?> </h3>
        <p class="date-creation-billets"> <?php echo $donnee['date_creation'];?> </p>
        <p class="contenu-billets"> <?php echo substr($donnee['contenu'],0,300)?>  ... <a href=''> Lire plus</a></p>
    </div> 
<?php
}
$reponse->closeCursor();
?>
</section>
</body>
</html>
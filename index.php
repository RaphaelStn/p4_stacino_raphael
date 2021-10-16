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
<!-- Section blog -->
<section>
    <h2> Bienvenue sur le blog de Jean Forteroche</h2> 
    <p>
        Vous pouvez retrouver ici les 3 derniers chapitres du nouveau livre de Jean Forteroche, 
        ou vous pouvez naviguer dans le menu pour retrouver l'intégralité des chapitres
    </p>
<!-- Récupération des billets -->
<?php
    $reponse = $bdd->query('SELECT * FROM (SELECT * FROM billets ORDER BY id DESC LIMIT 3) lastNrows_subquery ORDER BY titre'); // Selection des trois dernières entrées de chapitre
    while ( $donnee = $reponse->fetch()) {
?>
<div class="billets">
    <div class="billets-div">
        <h3> <?php echo $donnee['titre'];?> </h3>
        <p> <?php echo $donnee['date_creation'];?> </p>
        <p> <?php echo substr($donnee['contenu'],0,300)?>  ... <a href='./chapitre.php?id=<?php echo $donnee['id'];?>'> Lire plus</a></p> <!-- Max 300 caractère dans la préview & transmission de l'ID du chapitre dans l'URL pour une récupération GET-->
    </div> 
<?php
}
$reponse->closeCursor();
?>
</section>
</body>
</html>
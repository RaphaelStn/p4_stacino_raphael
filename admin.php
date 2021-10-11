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
<section id="admin">    
        <?php
    if (isset($_POST['mot_de_passe']) AND isset($_POST['identifiant']) AND $_POST['mot_de_passe'] ==  'admin' AND $_POST['identifiant'] == 'admin') {
    ?>
        <h1>Page Administrateur</h1>
        <p>
        Ici vous pouvez ajouter, modifier et supprimer les chapitres, ainsi que les commentaires sur les différents chapitres.
        </p>
        <?php
    }
    else
    {
        echo '<p>Mot de passe incorrect <a href="./connexion.php"> Réessayer</a></p>';
    }
    ?>
    
</section>  
</body>
</html>
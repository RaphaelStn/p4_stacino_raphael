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
<section>    
<?php // A AJOUTER ICI, un local storage pour l'actualistation et les retours en arrières
    // if (isset($_POST['mot_de_passe']) AND isset($_POST['identifiant']) AND $_POST['mot_de_passe'] =='admin' AND $_POST['identifiant'] == 'admin') { A CHANGER
    if ($_POST['mot_de_passe'] == '' AND $_POST['identifiant'] == '') { // TEMPORAIRE A MODIFIER pour les biens des tests
?>
    <h1>Page Administrateur</h1>
    <p>
        Ici vous pouvez ajouter, modifier et supprimer les chapitres, ainsi que les commentaires sur les différents chapitres. 
        <a href="./add.php"> Cliquez ici pour ajouter un billet</a>
        Ou cliquez sur un chapitre pour l'éditer
    </p>
    <?php
        $reponse = $bdd->query('SELECT * FROM billets ORDER BY titre');
        while ( $donnee = $reponse->fetch()) {
    ?>
    <div>
        <a href='./add.php?id=<?php echo $donnee['id'];?>'> <h3 class="titre-billets"> <?php echo $donnee['titre'];?> </h3></a>
        <p> <?php echo $donnee['date_creation'];?> </p> 
    </div>
    <?php
        }
        $reponse->closeCursor();
    }
    else
    {
        echo '<p>Mot de passe incorrect <a href="./connexion.php"> Réessayer</a></p>';
    }
?>
</section>  
</body>
</html>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset="utf-8">
    <meta name="description" content="Blog de Jean Forteroche, auteur et écrivain.">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <title>Blog de Jean Forteroche</title>
    <link href="./assests/style.css" rel="stylesheet">
<body>
<header>
    <?php include('./includes/header.php'); ?>
</header>

<p>Veuillez entrer un identifiant et mot de passe</p>
    <form action="admin.php" method="post">
        <p>
        <input type="text" placeholder="Identifiant" name="identifiant"/>
        <input type="password" placeholder="Mot de passe" name="mot_de_passe" />
        <input type="submit" value="Valider" />
        </p>
    </form>
    </body>
</html>
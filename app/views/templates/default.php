<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset="utf-8">
    <meta name="description" content="Blog de Jean Forteroche, auteur et écrivain.">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <title>Blog de Jean Forteroche</title>
    <link href="..\public\css\style.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/pa1f95o2vkvnul9irycx24w2i8h35vyjunuuukwvcl9gt7af/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
<header>
<nav id="menu">        
    <div class="element_menu">
        <h1> Blog de Jean Forteroche</h1>
        <ul>
            <li>
                <a href="..\public\index.php?action=home">Accueil</a>
            </li>
            <li>
                <a href="..\public\index.php?action=contents"">Chapitres</a>
            </li>
            <li>
                <a href="..\public\index.php?action=about"">A propos</a>
            </li>
            <li>
                <a hhref="..\public\index.php?action=home"'> Se connecter </a>
            </li>
        </ul>
    </div>    
</nav>
</header>
<section>
    <?php echo $content; ?>
</section>
</body>
</html>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset="utf-8">
    <meta name="description" content="Blog de Jean Forteroche, auteur et écrivain.">
    <title> <?php echo Core\Controller\Controller::getTitle(); ?> </title>
    <link href=".\public\css\style.css" rel="stylesheet">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://use.typekit.net/nac1xck.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/pa1f95o2vkvnul9irycx24w2i8h35vyjunuuukwvcl9gt7af/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">J. Forteroche</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./index.php?action=home"><i class="fas fa-home"></i> Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./index.php?action=contents"><i class="fas fa-list"></i> Chapitres</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./index.php?action=about"><i class="fas fa-book-open"></i> A propos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-admin";" href="
        <?php
        $auth = new Core\Auth\DBAuth(App::getInstance()->getDb());
        if(!$auth->logged()) {
         echo './index.php?action=login';
        } else {
        echo './index.php?action=admin';
        }?>"><i class="far fa-user"></i> Interface d'administration</a>
      </li>
    </ul>
  </div>
</nav>
</header>

<?php echo $content; ?>

</body>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script src="https://kit.fontawesome.com/db9607f191.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
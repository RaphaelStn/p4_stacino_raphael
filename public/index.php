<?php
define('ROOT', dirname(__DIR__)); // On définit une variable ROOT pour naviguer dans les dossiers plus facilement.
require  ROOT . '/app/App.php';
App::load(); // Load() Initialise la session et les AutoLoaders des namespaces CORE et APP.

// On utilise ensuite le GET action pour récuperer le view à afficher, selon un modèle défault.
if(isset($_GET['action'])) {
    $action = $_GET['action'];
}
else {
    $action = 'home';
}

ob_start();
switch ($action) {
    case 'home' : 
        require ROOT . '/app/views/frontend/home.php';
        break;
    case 'contents' : 
        require ROOT . '/app/views/frontend/contents.php';
        break;
    case 'about' : 
        require ROOT . '/app/views/frontend/about.php';
        break;
    case 'chapitre' : 
        require ROOT . '/app/views/frontend/chapitre.php';
        break;
    case 'login' : 
        require ROOT . '/app/views/backend/login.php';
        break;


}
$content = ob_get_clean();
require ROOT . '/app/views/templates/default.php';
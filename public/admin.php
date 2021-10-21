<?php
use Core\Auth\DbAuth;
define('ROOT', dirname(__DIR__)); // On définit une variable ROOT pour naviguer dans les dossiers plus facilement.
require  ROOT . '/app/App.php';
App::load(); // Load() Initialise la session et les AutoLoaders des namespaces CORE et APP.
$app = App::getInstance();

// On utilise ensuite le GET action pour récuperer le view à afficher, selon un modèle défault.
if(isset($_GET['action'])) {
    $action = $_GET['action'];
}
else {
    $action = 'home';
}
$auth = new DBAuth($app->getDb());
if(!$auth->logged()) {
    $app->forbidden();
}

ob_start();
switch ($action) {
    case 'home' : 
        require ROOT . '/app/views/backend/home.php';
        break;
    case 'contents' : 
        require ROOT . '/app/views/backend/contents.php';
        break;
    case 'about' : 
        require ROOT . '/app/views/backend/about.php';
        break;
    case 'chapitre' : 
        require ROOT . '/app/views/backend/chapitre.php';
        break;
    case 'edit' : 
        require ROOT . '/app/views/backend/edit.php';
        break;
    case 'add' : 
        require ROOT . '/app/views/backend/add.php';
        break;
    case 'delete': 
        require ROOT . '/app/views/backend/delete.php';
        break;
}
$content = ob_get_clean();
require ROOT . '/app/views/templates/default.php';
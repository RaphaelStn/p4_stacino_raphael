<?php
use App\Controller\Frontend\FrontendController;
use App\Controller\Backend\BackendController;

define('ROOT', __DIR__); // On définit une variable ROOT pour naviguer dans les dossiers plus facilement.
require  ROOT . '/app/App.php';

App::load(); // Load() Initialise la session et les AutoLoaders des namespaces CORE et APP.


if(isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
$action = 'home';
}

switch ($action) {
    case 'home' : 
        $controller = new FrontendController();
        $controller->home();
        break;
    case 'contents' : 
        $controller = new FrontendController();
        $controller->contents();
        break;
    case 'about' : 
        $controller = new FrontendController();
        $controller->about();
        break;
    case 'chapitre' : 
        $controller = new FrontendController();
        $controller->chapitre();
        break;
    case 'login' : 
        $controller = new FrontendController();
        $controller->login();
        break;
    case 'admin' : 
        $controller = new BackendController();
        $controller->admin();
        break;
    case 'edit' : 
        $controller = new BackendController();
        $controller->edit();
        break;
    case 'add' : 
        $controller = new BackendController();
        $controller->add();
        break;
    case 'delete': 
        $controller = new BackendController();
        $controller->delete();
        break; 
    case '404':
        $controller = new FrontendController();
        $controller->e404();
}

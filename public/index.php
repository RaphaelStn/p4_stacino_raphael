<?php
define('ROOT', dirname(__DIR__));
require  ROOT . '/app/App.php';
App::load();


if(isset($_GET['action'])) {
    $action = $_GET['action'];
}
else {
    $action = 'home';
}

ob_start();
switch ($action) {
    case 'home' : 
        require ROOT . '/app/views/home.php';
        break;
    case 'contents' : 
        require ROOT . '/app/views/contents.php';
        break;
    case 'about' : 
        require ROOT . '/app/views/about.php';
        break;
    case 'chapitre' : 
        require ROOT . '/app/views/chapitre.php';
        break;
}
$content = ob_get_clean();
require ROOT . '/app/views/templates/default.php';
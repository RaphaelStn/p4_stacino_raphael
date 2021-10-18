<?php 
require '..\app\Autoloader.php';
App\Autoloader::register();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
else {
    $action = 'home';
}
//Initialisation des objets.
$db = new App\Database('blog');

//Initiatisation des différents pages.
ob_start();
switch ($action) {
    case 'home' : 
        require '..\app\views\home.php';
        break;
    case 'contents' : 
        require '..\app\views\contents.php';
        break;
    case 'about' : 
        require '..\app\views\about.php';
        break;
    case 'chapitre' : 
        require '..\app\views\chapitre.php';
        break;
}
$content = ob_get_clean();
require '..\app\views\templates\default.php'

?>
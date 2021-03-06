<?php
namespace Core\Controller;

class Controller {

    protected $viewpath;
    protected $template;

    protected function render($view, $variable =[]) { 
        ob_start();
        extract($variable); // On recupère les variables transmises dans les controllers enfants, pour les donner à la page
        require ($this -> viewpath . $view . '.php');
        $content = ob_get_clean();
        require($this->viewpath . 'templates/' . $this->template . '.php');

    }
    public function getTitle() { // getter pour le titre.
        return $this -> title;
    }
    protected function setTitle($title) { // setter pour le titre.
        return  $this -> title = $title . ' | ' . $this -> title;
    }
    protected  function NotFound() {
        header ("HTTP/1.0 404 Not Found");
        header('Location: index.php?action=404');
    }
    protected function forbidden() { 
        header ("HTTP/1.0 403 Forbidden");
        header('Location: index.php?action=404');
    }
}
<?php 
namespace App\Table;

class Billet{
    public function __get($param) {
        $method = 'get' . ucfirst($param);
        return $this -> $method();

    }
    public function getUrl() {
        return 'index.php?action=chapitre&id=' . $this->id;
    }
    public function getExtrait() {
        $html = '<p>' . substr($this->contenu, 0, 200) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">Lire la suite</a></p>';
        return $html;
    }
}
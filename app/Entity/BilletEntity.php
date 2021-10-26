<?php
namespace App\Entity;
use \Core\Entity\Entity;

class BilletEntity extends Entity{

    public function getUrl() { // On renvoie une URL.
        return 'index.php?action=chapitre&id=' . $this->id;
    }
    public function getExtrait() { // On renvoie un extrait de 200 caractère.
        $html = '<p>' . substr($this->contenu, 0, 200) . '...</p>';
        $html .= '<p><a href="' . $this->url . '">Lire la suite</a></p>';
        return $html;
    }
}
?>
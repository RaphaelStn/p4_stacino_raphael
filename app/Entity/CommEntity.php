<?php
namespace App\Entity;
use \Core\Entity\Entity;

class CommEntity extends Entity {
    
    public function getUrl() { // On renvoie une URL.
        return 'index.php?action=commentaires&id=' . $this->id;
        }
}
?>
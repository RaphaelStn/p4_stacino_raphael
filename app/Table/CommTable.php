<?php
namespace App\Table;
use \Core\Table\Table;

class CommTable extends Table { // Effectue la query défini dans la classe parente Table
    public function all() {
        return $this -> query("SELECT billets.id, comms.pseudo, comms.contenu as contenu 
                                FROM billets LEFT JOIN comms ON id_billets = billets.id WHERE billets.id=?", [$_GET['id']]);
    }
}
?>
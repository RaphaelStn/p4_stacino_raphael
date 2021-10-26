<?php
namespace App\Table;
use \Core\Table\Table;

class CommTable extends Table { // Effectue la query défini dans la classe parente Table
    public function all() {
        return $this -> query("SELECT billets.id, comms.pseudo, comms.contenu as contenu, comms.id as comm_id FROM billets LEFT JOIN comms ON id_billet = billets.id WHERE billets.id=?", [$_GET['id']]);
    }

    public function create($fields) {
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v) {
            $sql_parts[] = "$k=?";
            $attributes[] = $v;
        }
        $sql_part = implode(',',$sql_parts);
        return $this->query("INSERT INTO comms SET $sql_part", $attributes, true);
    }

    public function delete($id) {
        return $this->query("DELETE FROM comms WHERE comms.id=?", [$id], true);
    }

    public function report($id) {
        return $this->query("UPDATE comms  SET reported = '1' WHERE id=?",$id);
    }

    public function getReported() {
        return $this -> query("SELECT comms.pseudo, comms.contenu as contenu, comms.id as comm_id, billets.titre as titre FROM billets LEFT JOIN comms ON id_billet = billets.id WHERE reported = '1'");
    }

    public function removeReport($id){
        return $this->query("UPDATE comms  SET reported = '0' WHERE comms.id=?",[$id], true);
    }
}
?>
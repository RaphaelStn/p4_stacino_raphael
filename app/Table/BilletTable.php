<?php
namespace App\Table;
use \Core\Table\Table;
use \App;

class BilletTable extends Table { // Effectue la query défini dans la classe parente Table
    public function getThreeLast() {
        return $this -> query('SELECT * FROM (SELECT * FROM billets ORDER BY titre DESC LIMIT 3) lastNrows_subquery ORDER BY id');
    }

    public function find($id) {
        return $this -> query("SELECT * FROM billets WHERE id=?", [$id], true);
    }

    public function all() {
        return $this -> query("SELECT * FROM billets ORDER BY id ");
    }

    public function update($id, $fields) {
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v) {
            $sql_parts[] = "$k=?";
            $attributes[] = $v;
        }
        $sql_part = implode(',',$sql_parts);
        $attributes[] = $id;
        return $this->query("UPDATE billets SET $sql_part WHERE id=?", $attributes, true);
    }

    public function create($fields) {
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v) {
            $sql_parts[] = "$k=?";
            $attributes[] = $v;
        }
        $sql_part = implode(',',$sql_parts);
        return $this->query("INSERT INTO billets SET $sql_part", $attributes, false);
    }
    
    public function delete($id) {
        return $this->query("DELETE FROM billets WHERE id=?", [$id], true);
    }
}
?>
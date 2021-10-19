<?php
namespace App\Table;
use \Core\Table\Table;
use \App;

class BilletTable extends Table {
    public function getThreeLast() {
        return $this -> query('SELECT * FROM (SELECT * FROM billets ORDER BY titre DESC LIMIT 3) lastNrows_subquery ORDER BY titre');
    }
    public function find($id) {
        return $this -> query("SELECT * FROM billets WHERE id=?", [$id], true);
    }
    public function all() {
        return $this -> query("SELECT * FROM billets ORDER BY titre");
    }
}
?>
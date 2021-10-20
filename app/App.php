<?php
use Core\Database\MysqlDatabase;
use Core\Config;

class App {
    
    private static $_instance;
    public $title = 'J. Forteroche';
    private $db_instance;

    public static function load(){ // load les Autoloader et le sessionstart().
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/Core/Autoloader.php';
        Core\Autoloader::register();
    }
    public static function getInstance() { // On initialise via une unique instance static et un 'singleton'.
        if(self::$_instance === null){ 
            self::$_instance = new App();
        }
        return self::$_instance;
    }
    public function getTable($name) { // On initialise les DB selon leur nom, et en injectant la config de la db(db_pass etc)
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this -> getDb()); // On retourne par exemple \App\Table\BilletTable(db_instance) où db_instance est MysqlDatabase('blog','localhost'etc).
    }
    public function getDb() { // On init la db via le fichier config
        $this -> config = Config::getInstance(ROOT . '\config\config.php');
        if($this -> db_instance === null){
           return $this -> db_instance = new MysqlDatabase($this -> config -> get('db_name'), $this -> config -> get('db_user'), $this -> config -> get('db_pass'), $this -> config -> get('db_host'));

        } else {
            return $this -> db_instance;
        }
    }
    public function getTitle() { // getter pour le titre.
        return $this -> title;
    }
    public function setTitle($title) { // setter pour le titre.
        return  $this -> title = $title . ' | ' . $this -> title;
    }
    public  function NotFound() { // 404 not found.
        header ("HTTP/1.0 404 Not Found");
        header('Location:index.php?action=404');
    }
}

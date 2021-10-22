<?php 
namespace App\Controller;
use Core\Controller\Controller;

class AppController extends Controller{
    
    protected $template = 'default';
    protected $title = 'J. Forteroche';

    public function __construct() {
        $this->viewpath = ROOT . '/app/views/';
    }
    protected function loadModel($model_name) {
        $this -> $model_name = \App::getInstance()->getTable($model_name);
    }

}
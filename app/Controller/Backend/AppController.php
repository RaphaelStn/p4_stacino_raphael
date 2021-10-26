<?php 
namespace App\Controller\Backend;
Use \Core\Auth\DBAuth;

class AppController extends \App\Controller\Frontend\AppController {
    
    public function __construct(){
        parent::__construct();
        $auth = new DBAuth(\App::getInstance()->getDb());
        if(!$auth->logged()) {
            $this->forbidden();
        }
    }
}
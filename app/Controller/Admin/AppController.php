<?php 
namespace App\Controller\Admin;
Use \Core\Auth\DbAuth;

class AppController extends \App\Controller\AppController {
    public function __construct(){
        parent::__construct();
        $auth = new DBAuth(\App::getInstance()->getDb());
        if(!$auth->logged()) {
            $this->forbidden();
        }
    }
}
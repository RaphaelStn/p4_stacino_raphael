<?php 
namespace App\Controller;
use App\Controller\AppController;
use Core\Auth\DBAuth;

Class FrontendController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('billet');
        $this->loadModel('comm');
    }

    public function home() {
        $billets = $this->billet->getThreeLast();
        $this->setTitle("Accueil");
        $this-> render('frontend/home', compact('billets'));
    } 

    public function contents() {
        $billets = $this->billet->all();
        $this->setTitle("Chapitres");
        $this-> render('frontend/contents', compact('billets'));
    }

    public function chapitre() {
        $success_report = false;
        $billet = $this-> billet ->find($_GET['id']);
        $this->setTitle($billet->titre);
        if($billet === false) {
                $this->notFound();
            }
         // POST du commentaire
        if(!empty($_POST) AND isset($_POST['post_comm'])) { 
            $result = $this->comm->create(['pseudo' => $_POST['pseudo'], 'contenu' => $_POST['commentaire'], 'id_billet' => $_GET['id']]);
        }
        $comms = $this -> comm-> all();
        // SIGNALEMENT du commentaire
        if(!empty($_POST) AND isset($_POST['report_comm'])) {
            $result = $this->comm->report($_POST['comm_id']);
            if($result) {
                $success_report=true;
            }
        }
        $this-> render('frontend/chapitre', compact('billet', 'comms','success_report'));
    }
    public function about() {
        $billets = $this->billet->getThreeLast();
        $this->setTitle("A propos");
        $this-> render('frontend/about', compact('billets'));
    }
    public function login() {
        $errors=false;
        $this-> setTitle('Connexion');
        if(!empty($_POST) AND isset($_POST['connect'])){
            $auth = new DBAuth(\App::getInstance()->getdb());
            if($auth -> login($_POST['username'], $_POST['password'])) {
                header('Location: index.php?action=admin');
            }else {
                $errors = true;
            }
        }
        $this->render('frontend/login', compact('errors'));
    }
}
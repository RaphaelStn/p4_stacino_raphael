<?php 
namespace App\Controller\Backend;
use App\Controller\Backend\AppController;

class BackendController extends AppController {
    
    public function __construct() {
        parent::__construct();
        $this->loadModel('billet');
        $this->loadModel('comm');
    }
    public function admin() {
        $success_delete=false;
        $success_validate=false;
        $this->setTitle('Admin');
        $billets =$this->billet->all();
        //Logique du bouton de déconnexion
        if(isset($_POST['disconnect'])){
            unset($_SESSION['auth']);
            header('location:index.php');
        }
        //Logique de la suppression d'un commentaire.
        if(!empty($_POST) AND isset($_POST['refuser'])) { // Suppression du commentaire
            $result = $this->comm->delete($_POST['comm_id']);
            if($result) {
                $success_delete=true;  // On renvoie une confirmation
            }
        }
        if(!empty($_POST) AND isset($_POST['valider'])) { // validation du commentaire
            $result = $this->comm->removeReport($_POST['comm_id']);
            if($result) {
                $success_validate=true;  // On renvoie une confirmation
            }
        }
        $reports = $this->comm->getReported();
        $this->render('backend/home', compact('billets', 'reports', 'success_delete', 'success_validate'));
    }
    public function edit() {
        $success_update=false;
        $success_delete=false;
        $date_publi = null;
        $this->setTitle('Edition');
        //Logique du bouton edition
        if(!empty($_POST) AND isset($_POST['update'])) {
            if(!empty($_POST['date'])) {
                $date_publi = $_POST['date'];
            }
            $result = $this->billet->update($_GET['id'], ['titre' => htmlspecialchars($_POST['titre']), 'contenu' => $_POST['contenu'], 'date_publi' => $date_publi]);
            if($result) {
                $success_update=true;  // On renvoie une confirmation
            }
        }
        $billet = $this->billet->find($_GET['id']);
        //Logique du bouton suppression commentaire
        if(!empty($_POST) AND isset($_POST['deleteComm'])) {
            $result = $this->comm->delete($_POST['comm_id']);
            if($result) {
                $success_delete=true;  // On renvoie une confirmation
            }
        }
        $comms = $this -> comm -> all();
        $this->render('backend/edit', compact('billet','comms', 'success_update', 'success_delete'));
    }
    public function delete() {
        //Logique de la suppression d'un chapitre selon ID
        if(!empty($_POST) AND isset($_POST['delete'])) {
            $result = $this->billet->delete($_POST['id']);
            if($result) {
            header('location: index.php?action=admin');
            }
        }
    }
    public function add() {
        $success_add=false;
        $date_publi = null; // Par défaut, la date est null
        $this->setTitle('Ajout');
        if(!empty($_POST AND isset($_POST['create']))) {
            if(!empty($_POST['date'])) { // Si la date est renseignée, on la rentre en variable, sinon elle reste null
                $date_publi = $_POST['date'];
            }
            $result = $this->billet->create(['titre' => htmlspecialchars($_POST['titre']), 'contenu' => $_POST['contenu'], 'date_publi' => $date_publi]);
            if($result) {
                $success_add=true; // On renvoie une confirmation
            }
        }
        $this->render('backend/add', compact('success_add'));
    }
}
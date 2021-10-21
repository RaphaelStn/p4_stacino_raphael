<?php
use Core\HTML\Form;
use Core\Auth\DBAuth;

$app = App::getInstance();
$app-> setTitle('Connexion');
if(!empty($_POST) AND isset($_POST['connect'])){
    $auth = new DBAuth($app->getdb());
    if($auth -> login($_POST['username'], $_POST['password'])) {
        header('Location: admin.php');
    } else {
        ?>
        <div class='error'>
            <p>Identifiant ou mot de passe incorrect.</p>
        <div>
        <?php
    }
}
$form = new Form($_POST);
?>

<section id="login" class="main">
<form method="post">
    <?php echo $form->input('username', "Nom d'utilisateur");?>
    <?php echo $form->password('password', "Mot de passe");?>
    <?php echo $form-> submit('connect', 'Se Connecter');?>
</form>
</section>

<?php
if($errors) {
    ?>
        <div class='error'>
            <p class="btn btn-danger">Identifiant ou mot de passe incorrect.</p>
        <div>
    <?php 
}
?>

<section id="login" class="main">
<form method="post">
    <p><input type="text" name="username" placeholder="Nom d'utilisateur"/></p>
    <p><input  type="password" name="password" placeholder="Mot de passe"/></p>
    <p><button class="btn btn-primary" type="submit" name="connect">Se connecter</button></p>
</form>
</section>

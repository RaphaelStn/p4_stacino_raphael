<?php 
$post = $db -> prepare('SELECT * FROM billets WHERE id = ?', [$_GET['id']], 'App\Table\Billet', true);
?>
<h3> <?php echo $post -> titre; ?> </h3>
<p> <?php echo $post -> date_creation; ?> </p>
<p> <?php echo $post -> contenu; ?> </p>
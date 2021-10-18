<p> Retrouvez ici tout les chapitres ! </p>

<?php foreach($db->query('SELECT * FROM billets ORDER BY titre', 'App\Table\Billet') as $post): ?>
<h3> <a href ="<?php echo $post->url; ?>"><?php echo $post-> titre;?> </a></h3>
<p> <?php echo $post-> date_creation;?> </p>
<?php endforeach; ?>

    <h1> Bienvenue sur le blog de Jean Forteroche</h1> 
    <p>
        Vous pouvez retrouver ici les 3 derniers chapitres du nouveau livre de Jean Forteroche, 
        ou vous pouvez naviguer dans le menu pour retrouver l'intégralité des chapitres
    </p>
<div class="homepage">  
    <?php foreach($db->query('SELECT * FROM (SELECT * FROM billets ORDER BY titre DESC LIMIT 3) lastNrows_subquery ORDER BY titre', 'App\Table\Billet') as $post): ?>
    <div class="extrait-div">
        <h3> <?php echo $post-> titre;?> </h3>
        <p> <?php echo $post-> date_creation;?> </p>
        <p> <?php echo $post-> extrait; ?> </p>
    </div>
    <?php endforeach; ?>
</div
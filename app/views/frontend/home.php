<section id="accueil" class="main">
    <h1> Bienvenue sur le blog de Jean Forteroche</h1> 
    <p>
        Vous pouvez retrouver ici les 3 derniers chapitres du nouveau livre de Jean Forteroche, 
        ou vous pouvez naviguer dans le menu pour retrouver l'intégralité des chapitres
    </p>
    <div class="homepage">  
        <?php 
        foreach($billets as $billet):
        ?>
        <div class="extrait-div">
            <h3> <?php echo $billet -> titre;?> </h3>
            <p> <?php echo $billet -> extrait; ?> </p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

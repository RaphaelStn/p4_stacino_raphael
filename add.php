
            }
        ?>'/> </p>
        <input type="hidden" name="id" class="idBillet" value ='<?php // On ajoute une input hidden pour récuperer l'ID et la réinjecter dans notre form en methode POST, et si pas d'id, on donne une value NULL pour l'affiche du bouton "supprimer".
            if(isset($_GET['id'])) {
                echo $_GET['id'];
            }
            else {
                echo 'null';
            }
        ?>'/>
        <input type="submit" name="submit" value="Enregistrer"/>
        <input type="submit" name="delete" class="deleteBtn" style="visibility:hidden;" value="Supprimer le billet" onclick="return confirm('Êtes-vous sur de vouloir supprimer le billet?')"/>
        
        <script> // Un petit script pour cacher le button supprimer si aucune ID dans l'URL, donc nouveau billet.
            let deleteBtn = document.querySelector(".deleteBtn");
            let idBillet = document.querySelector(".idBillet").value;
            if(idBillet != 'null') {
                deleteBtn.style.visibility ="visible";
            }
        </script>
        <?php
        if (isset($_POST['submit']) AND !empty($_POST['titre']) AND !empty($_POST['contenu'])) { // On vérifie les valeurs recu via POST
            if($_POST['id'] != 'null') { // Si on a un ID recu via POST, le button submit va update le contenu de la database
                $reponse = $bdd -> prepare('UPDATE billets SET titre = :titre, contenu = :contenu WHERE id = :id');
                $reponse -> execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu'], 'id' => $_POST['id']));
            }
            else { // Sinon on crée une nouvelle entrée
                $reponse = $bdd -> prepare('INSERT INTO billets (date_creation, titre, contenu) VALUE (NOW(), :titre, :contenu)');
                $reponse -> execute(array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu']));
                echo "<script>alert(\"la variable est nulle\")</script>";
            }
        }
        else if(isset($_POST['delete']) AND !empty($_POST['id'])) { // Et si on selectionne l'input delete et qu'on a une ID valide, on supprimer l'entrée correspondante
            $reponse = $bdd -> prepare('DELETE FROM billets WHERE id = :id');
            $reponse -> execute(array('id' => $_POST['id']));
        }
    ?>
    </form>
</section>
</body>
</html>
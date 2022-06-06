<?php 


    try{
        $pdo = new PDO('mysql:host=localhost;dbname=web','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $pdo->prepare("SELECT * FROM stage INNER JOIN entreprise WHERE stage.ID_entreprise 
        = entreprise.ID_entreprise");
        $result = $query->execute();
        $posts = $query->fetchAll();
        ?>
           
            <?php foreach($posts as $post) : ?>
            <div class="offre_carte">
                <?php
                    if (isset($_SESSION['Droits']) && $_SESSION['Droits'] == 'Etudiant')
                    {
                ?>               
                
                    <a href="ajouter_fav.php?ID_stage=<?= $post['ID_stage']?>" id="bouton_fav">☆</a>
                
                <?php } ?>
                
                <!-- <h3><b>ID : </b><?= $post['ID_stage'] ?></h3> -->
                <h3><b>Nom entreprise : </b><?= $post['Nom_entreprise'] ?></h3>
                <p><b>Role : </b><?= $post['Role'] ?></p>
                <p><b>Compétence : </b><?= $post['Competences'] ?></p>
                <p><b>Localité : </b><?= $post['Localite'] ?></p>
                <p><b>Promo : </b><?= $post['Type_promotion'] ?></p>
                <p><b>Durée : </b><?= $post['Duree'] ?></p>
                <p><b>Rémunération : </b><?= $post['Base_de_remuneration'] ?>€</p>
                <p><b>Date de l'offre : </b><?= $post['Date_offre'] ?></p>
                <p><b>Nombres places : </b><?= $post['Nombre_places'] ?></p>
                
                <?php
                
                    if (isset($_SESSION['Droits'])) {
                        if ($_SESSION['Droits'] == 'entreprise') {
                ?>
                
                            <a href="supprimer.php?ID_stage=<?= $post['ID_stage']?>">Supprimer</a>
                            <a href="modifier.php?ID_stage=<?= $post['ID_stage']?>">Modifier</a><br>
                
                <?php
                        }
                        if ($_SESSION['Droits'] == 'Etudiant') {
                ?>
                            
                            <a href="../mail/envoyer_des_mails.php" class="btn btn-dark" role="button" aria-pressed="true">Postuler</a>
                            <br>
                <?php
                        }

                    }
                ?>
                    

            </div>
            <br>
            <?php endforeach ?>
        
        <?php
        
    }
    catch(PDOException $e){
    echo "failed" .$e->getMessage();
    }

?>

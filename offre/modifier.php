<?php

    try{
        $pdo = new PDO('mysql:host=localhost;dbname=web','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $pdo->prepare("SELECT * FROM stage WHERE ID_stage = :id");
        $query->bindValue(':id', $_GET['ID_stage'], PDO::PARAM_INT);

        $result = $query->execute();
        
        if($result){
            $message = "Offre de stage supprimé";
            $contact = $query->fetch();
            // var_dump($contact);
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CESI ton stage</title>
    <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./style_offre.css">
    
</head>
<body>
<!------ NAVBAR ------>
<header class="container-fluid header">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CESI ton stage</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../../site_acceuil.html"><i class="fas fa-home"></i>  Acceuil</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../offre.php"><i class="fas fa-search"></i>  Offre</a>
            </li>
            <!--<li class="nav-item active">
              <a class="nav-link " href="#">??????</a>
            </li>-->
          </ul>
          <ul class="navbar-nav ml-auto">
            <form action="../../inscription/inscription.html">
              <button class="btn btn1">S'inscrire</button>
            </form>
            <form action="../../connection/connection.html">
              <button class="btn btn2">Se connecter</button>
            </form>
          </ul>
        </div>
      </nav>
      
</header>
<!------ Banniere  --->
<div class="container banner">
    <div class="row justify-content-center">
      <form action="f_modifier.php" method="post">
      <div class="offre">

      <input type="hidden" name="ID_stage" value="<?= $contact['ID_stage']; ?>">
        
        <legend>
            <h1 class="titre">Modifier une offre</h1>
        </legend>
        <br>

        <!-- Informations à compléter -->
        <legend>
            <h2 class="titre">Rôle</h2>
        </legend>
        <input type="text" placeholder="Rôle" class="case" name="role" required value="<?= $contact['Role']; ?>">
        <legend>
            <h2 class="titre">Offre</h2>
        </legend>
        <input type="text" placeholder="Offre" class="case" name="offre" required value="<?= $contact['Offre']; ?>">
        <legend>
            <h2 class="titre">Compétence</h2>
        </legend>
        <input type="text" placeholder="Compétence" class="case" name="competence" required value="<?= $contact['Competences']; ?>">
        <legend>
            <h2 class="titre">Promotion</h2>
        </legend>
        <select class="case" id="promotion" name="promotion" required value="<?= $contact['Type_promotion']; ?>">
            <option>Première année </option>
            <option>Deuxième année </option>
            <option>Troisième année </option>
            <option>Quatrième année </option>
            <option>Cinquième année </option>
          </select>
        <legend>
            <h2 class="titre">Durée</h2>
        </legend>
        <input type="text" placeholder="Durée" class="case" name="duree" required value="<?= $contact['Duree']; ?>">
        <legend>
            <h2 class="titre">Rémunération</h2>
        </legend>
        <input type="number" placeholder="Rémunération" class="case" name="remuneration" required value="<?= $contact['Base_de_remuneration']; ?>">
        <legend>
            <h2 class="titre">Date de l'offre</h2>
        </legend>
        <input type="date" class="case" name="date_offre" required> value="<?= $contact['Date_offre']; ?>"
        <legend>
            <h2 class="titre">Nombre de place</h2>
        </legend>
        <input type="number" placeholder="Nombre de place" class="case" name="place" required value="<?= $contact['Nombre_places']; ?>">

        <div class="bouton_formulaire">
            
            <input class="btn_valider btn-default btn-outline-success" type="submit" value="Enregistrer">
        </div>


        </div>
      </form>
    </div>
    <br><br><br>
</div>

<!-- Footer -->
<div class="footer bg-dark">
  <div class="container inner-footer">
    <div class="footer-items">
      <a href="https://fr-fr.facebook.com/"><i class="fab fa-facebook facebook fa-2x"></i></a>
      <a href="https://www.instagram.com/"><i class="fab fa-instagram instagram fa-2x"></i></a>
      <a href="https://twitter.com/"><i class="fab fa-twitter twitter fa-2x"></i></a>
      <a href="https://www.youtube.com/"><i class="fab fa-youtube youtube fa-2x"></i></a>
    </div>
  </div>
  <div class="footer-copyright text-center py-3 text-light">© 2021 Copyright:
    <a href="https://mdbootstrap.com/"> CESItachance.com</a>
  </div>
</div>
  <!-- Footer -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
            <?php
        }
        else{
            $message = "Echec suppression";
        }
        
    }
    catch(PDOException $e){
    echo "failed" .$e->getMessage();
    }

    // header("location: ./offre.php");
?>

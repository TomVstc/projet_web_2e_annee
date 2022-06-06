<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./style_offre.css">
</head>
<body>
<header class="container-fluid header">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CESI ton stage</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../site_acceuil.html"><i class="fas fa-home"></i>  Acceuil</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="./offre.php"><i class="fas fa-search"></i>  Offre</a>
            </li>
            <li class="nav-item active">
            <a class="nav-link " href="./ajouter_offre/ajouter_offre.html"><i class="fas fa-plus-square"></i>  Ajoutez une offre</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <form action="../inscription/inscription.html">
              <button class="btn btn1">S'inscrire</button>
            </form>
            <form action="../connection/connection.html">
              <button class="btn btn2">Se connecter</button>
            </form>
          </ul>
        </div>
      </nav>
</header>
<div class="container-fluid banner">
    <div class="container">
<?php

if(isset($_POST['role'])){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=web','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $role = $_POST["role"];
        // $offre = $_POST["offre"];
        // echo $role;
        $query = $pdo->prepare("SELECT * FROM stage INNER JOIN entreprise WHERE 
        stage.ID_entreprise = entreprise.ID_entreprise AND Role = '$role'");
        $result = $query->execute();
        $posts = $query->fetchAll();
        // print_r($posts);
        ?>
           
            <?php foreach($posts as $post) : ?>
            <div class="offre_carte">
                <h3><b>Nom entreprise : </b><?= $post['Nom_entreprise'] ?></h3>
                <p><b>Role : </b><?= $post['Role'] ?></p>
                <p><b>Compétence : </b><?= $post['Competences'] ?></p>
                <p><b>Localité : </b><?= $post['Localite'] ?></p>
                <p><b>Promo : </b><?= $post['Type_promotion'] ?></p>
                <p><b>Durée : </b><?= $post['Duree'] ?></p>
                <p><b>Rémunération : </b><?= $post['Base_de_remuneration'] ?>€</p>
                <p><b>Date de l'offre : </b><?= $post['Date_offre'] ?></p>
                <p><b>Nombres places : </b><?= $post['Nombre_places'] ?></p>
                
            </div>
            <br>
            <?php endforeach ?>
        
        <?php 
    }
    catch(PDOException $e){
    echo "failed" .$e->getMessage();
    }
}
else{
}
?>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  </div>

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



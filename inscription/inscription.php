<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CESI ton stage</title>
    <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./inscription.css">

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
                        <a class="nav-link" href="../site.php"><i class="fas fa-home"></i>  Acceuil</a>
                    </li>
                    <?php
                        if (isset($_SESSION['Droits']))
                        {
                    ?> 
                            <li class="nav-item active">
                                <a class="nav-link" href="./offre/offre.php"><i class="fas fa-search"></i>  Offre</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link " href="./offre/ajouter_offre/ajouter_page.php"><i class="fas fa-plus-square"></i>  Ajoutez une offre</a>
                            </li>
                            
                    <?php  
                        }
                    ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!--<form action="./inscription/inscription.html">
              <button class="btn btn1">S'inscrire</button>
            </form>-->
                    <form action="../connection/connection_page.php">
                        <button class="btn btn2">Se connecter</button>
                    </form>
                </ul>
            </div>
        </nav>

    </header>
    <!------ Banniere  --->
    <div class="container-fluid banner">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-4 inscription etudiant">
                    <form action="./formulaire_etudiant/formulaire_etudiant.html">
                        <button class="btn_inscription " id="btn_etudiant">Etudiant</button></form>
                </div>

                <div class="col-sm-4 inscription tuteur">
                    <form action="./formulaire_tuteur/formulaire_tuteur.html">
                        <button class="btn_inscription " id="btn_entreprise">Tuteur</button></form>
                </div>

                <div class="col-sm-4 inscription entreprise">
                    <form action="formulaire_entreprise/formulaire_entreprise.html">
                        <button class="btn_inscription " id="btn_tuteur">Entreprise</button></form>
                </div>
            </div>
            <div><br><br><br><br><br><br><br><br><br>
            </div>
        </div>
        <!------ Footer  --->
        <!-- Footer -->
        <div class="footer bg-dark">
            <div class="container inner-footer">
                <div class="footer-items">
                    <a href="https://fr-fr.facebook.com/"><i class="fab fa-facebook facebook "></i></a>
                    <a href="https://www.instagram.com/"><i class="fab fa-instagram instagram "></i></a>
                    <a href="https://twitter.com/"><i class="fab fa-twitter twitter "></i></a>
                    <a href="https://www.youtube.com/"><i class="fab fa-youtube youtube "></i></a>
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
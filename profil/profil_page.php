<?php session_start();

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
    <link rel="stylesheet" href="./style_connection.css">

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
                        <a class="nav-link col" href="../site.php"><i class="fas fa-home"></i>  Acceuil</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link col" href="../offre/offre.php"><i class="fas fa-search"></i>  Offre</a>
                    </li>
                    
                </ul>




                <?php
                    
                    
                    if(isset($_SESSION['Login']) && isset($_SESSION['Droits']))
                    {
                        if ($_SESSION['Droits'] != "Etudiant") {
                            ?>
                            <li class="nav-item active ">
                                <a class="nav-link col" href="./offre/ajouter_offre/ajouter_page.php"><i class="fas fa-plus-square"></i>  Ajoutez une offre</a>
                            </li>
                        
                <?php
                        }
                ?>
                        <ul class="navbar-nav ml-auto" >
                            <div class="container">
                                <div class="row">
                                    <div class="col " id="loginconnexion"> 
                                        <?php
                                            echo $_SESSION['Login'];
                                        ?>
                                    </div>
                                    <div class="col " id="droits"> 
                                        <?php
                                            echo $_SESSION['Droits'];
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <form action="../connection/deconnexion.php" >
                                <button class="btn btn1">Deconnexion</button>
                            </form>
                                                            
                        </ul>
                <?php

                    }
                    else
                    {
                ?>
                
                        <ul class="navbar-nav ml-auto">
                            <form action="../inscription/inscription.html">
                                <button class="btn btn1">S'inscrire</button>
                            </form>
                            
                        </ul>
                <?php
                    }
                ?>







            </div>
        </nav>

    </header>

    <!------ Connexion  --->
<form action="./profil_db.php" method="POST" >
        <div class="container banner">
            <div class="row justify-content-center">
            <?php //var_dump($_SESSION); ?>
                <div class="inscription">
                    <div class="text-center col-md col-md-offset bg-light " id="container2"><h1>Profil</h1></div>
                    
                        <label for="inputLogin" id="labelLogin"><strong>Nom</strong></label><br>
                        <label for="inputLogin" id="labelLogin"><?php echo $_SESSION['Nom']; ?></label><br>
                        <label for="inputLogin" id="labelLogin"><strong>Prenom</strong></label><br>
                        <label for="inputLogin" id="labelLogin"><?php echo $_SESSION['Prenom']; ?></label><br>
                        <label for="inputLogin" id="labelLogin"><strong>Centre</strong></label><br>
                        <label for="inputLogin" id="labelLogin"><?php echo $_SESSION['Centre']; ?></label><br>
                        <label for="inputLogin" id="labelLogin"><strong>Promotion</strong></label><br>
                        <label for="inputLogin" id="labelLogin"><?php echo $_SESSION['Promotion']; ?></label>
   
                    </div>
                    
                </div>
                <h2>Favoris offre : </h2>
                <?php require './liste_fav.php'?>
            <br><br><br>
        </div>
    
</form>


    
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
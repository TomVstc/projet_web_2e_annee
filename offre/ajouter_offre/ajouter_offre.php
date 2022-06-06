
<?php
try{
    $connexion = new PDO('mysql:host=localhost;dbname=web','root','');

    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $role = $_POST["role"];
    $offre = $_POST["offre"];
    $competence = $_POST["competence"];
    $promotion =  $_POST["promotion"];
    $duree = $_POST["duree"];
    $remuneration = $_POST["remuneration"];
    $date_offre = $_POST["date_offre"];
    $place = $_POST["place"];
    


    $insertion = $connexion->prepare("INSERT INTO stage(Role, Offre, Competences, Type_Promotion, Duree
    , Base_de_remuneration, Date_offre, Nombre_places, Nombre_de_stagiaires_CESI, ID_compte, ID_entreprise) 
    VALUES ('$role', '$offre', '$competence', '$promotion', '$duree', '$remuneration', '$date_offre', 
    '$place','10', '1', '4')");

    $insertion->execute();

    /* $insertion = $connexion->prepare("INSERT INTO compte(Nom, Prenom, Centre, Promotion_assigne, ID_profil) 
    VALUES ('$nom', '$prenom', '$centre', '$promotion', (SELECT ID_profil FROM profil 
    WHERE Login = '$login' AND Mot_de_passe = '$mot_de_passe'))");

    $insertion->execute(); */
    
}
catch(PDOException $e){
    echo "failed" .$e->getMessage();
}

header("location: ../offre.php");

?>
<?php
try{
    $connexion = new PDO('mysql:host=localhost;dbname=web','root','');

    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $centre =  $_POST["centre"];
    $promotion = $_POST["promotion"];

    $login = $_POST["mail"];
    $mot_de_passe = $_POST["password"];
    $type = $_POST['type'];

    $insertion = $connexion->prepare("INSERT INTO profil(Login, Mot_de_passe, Droits) 
    VALUES ('$login', '$mot_de_passe', '$type')");

    $insertion->execute();

    $insertion = $connexion->prepare("INSERT INTO compte(Nom, Prenom, Centre, Promotion_assigne, ID_profil) 
    VALUES ('$nom', '$prenom', '$centre', '$promotion', (SELECT ID_profil FROM profil 
    WHERE Login = '$login' AND Mot_de_passe = '$mot_de_passe'))");

    $insertion->execute(); 
    
}
catch(PDOException $e){
    echo "failed" .$e->getMessage();
}

header("location: formulaire_etudiant.html");

?>
<?php
try{

        var_dump($_POST);

        $connexion = new PDO('mysql:host=localhost;dbname=web','root','');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $nom = $_POST['nom'];
        $secteur = $_POST['fournisseur'];
        $localite = $_POST['departement'];
        $nb_stag = $_POST['nb_stage'];

        $login = $_POST["mail"];
        $mot_de_passe = $_POST['password'];
        $entreprise = "entreprise";
        
        $insertion = $connexion->prepare("INSERT INTO profil(Login, Mot_de_passe, Droits) 
        VALUES ('$login', '$mot_de_passe', '$entreprise')");

        $insertion->execute();

        $insertion = $connexion->prepare("INSERT INTO entreprise(Nom_entrerprise, Secteur_activites, Localite, Nombre_stagiaires_CESI, ID_profil) 
        VALUES ('$nom', '$secteur', '$localite', '$nb_stag', (SELECT ID_profil FROM profil 
        WHERE Login = '$login' AND Mot_de_passe = '$mot_de_passe'))");

        $insertion->execute();
    
}
catch(PDOException $e){
    echo "Echec" .$e->getMessage();
}

header("location: ../../site.php"); 

?>


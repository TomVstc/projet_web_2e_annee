<?php

    try{
        $pdo = new PDO('mysql:host=localhost;dbname=web','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $pdo->prepare("UPDATE stage set Role=:role, Offre=:offre, Competences=:competence,
        Type_promotion=:promotion, Duree=:duree, Base_de_remuneration=:remuneration, Date_offre=:date_offre, 
        Nombre_places=:place WHERE ID_stage=:id LIMIT 1");

        $query->bindValue(':id', $_POST['ID_stage'], PDO::PARAM_INT);

        $query->bindValue(':role', $_POST["role"], PDO::PARAM_STR);
        $query->bindValue(':offre', $_POST["offre"], PDO::PARAM_STR);
        $query->bindValue(':competence', $_POST["competence"], PDO::PARAM_STR);
        $query->bindValue(':promotion', $_POST["promotion"], PDO::PARAM_STR);
        $query->bindValue(':duree', $_POST["duree"], PDO::PARAM_STR);
        $query->bindValue(':remuneration', $_POST["remuneration"], PDO::PARAM_INT);
        $query->bindValue(':date_offre', $_POST["date_offre"], PDO::PARAM_STR);
        $query->bindValue(':place', $_POST["place"], PDO::PARAM_STR);
        

        $result = $query->execute();
        
        if($result){
            $message = "Offre de stage supprimé";
        }
        else{
            $message = "Echec suppression";
        }
        
    }
    catch(PDOException $e){
    echo "failed" .$e->getMessage();
    }

    header("location: ./offre.php");
?>

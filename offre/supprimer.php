<?php

    try{
        $pdo = new PDO('mysql:host=localhost;dbname=web','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $pdo->prepare("DELETE FROM stage WHERE ID_stage=:id LIMIT 1");
        $query->bindValue(':id', $_GET['ID_stage'], PDO::PARAM_INT);

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

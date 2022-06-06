<?php

    try{
        $pdo = new PDO('mysql:host=localhost;dbname=web','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $pdo->prepare("DELETE FROM wishlist WHERE ID_wish=:id LIMIT 1");
        $query->bindValue(':id', $_GET['ID_stage'], PDO::PARAM_INT);

        $result = $query->execute();
        
        if($result){
            //$message = "Offre de stage supprimé des favoris";
            echo $message;
        }
        else{
            $message = "Echec suppression";
            echo $message;

        }
        
    }
    catch(PDOException $e){
    echo "failed" .$e->getMessage();
    }

    header("location: ./profil_page.php");
?>

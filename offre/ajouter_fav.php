<?php session_start();

    try{
        var_dump($_SESSION);
        $pdo = new PDO('mysql:host=localhost;dbname=web','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        

        $query = $pdo->prepare("INSERT INTO wishlist (ID_compte, ID_offre) VALUES (:id_compte,:id_offre)");
        $query->bindValue(':id_offre', $_GET['ID_stage'], PDO::PARAM_INT);
        $query->bindValue(':id_compte', $_SESSION['ID_compte'], PDO::PARAM_INT);

        $result = $query->execute();
        
        if($result){
            $message = "Offre ajouté à la wish list";
            echo $message;
        }
        else{
            $message = "Echec de l'ajout à la wish list";
            echo $message;
        }
        
    }
    catch(PDOException $e){
    echo "failed" .$e->getMessage();
    }

    header("location: ../profil/profil_page.php");
?>

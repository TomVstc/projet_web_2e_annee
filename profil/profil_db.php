<?php session_start();



try {
    
    $connexion = new PDO('mysql:host=localhost;dbname=web', 'root', '');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $Login_session = $_SESSION['Login'];

    
    
        $q = $connexion->prepare("SELECT * FROM `compte` INNER JOIN `profil` ON `compte`.`ID_profil` = `profil`.`ID_profil` WHERE '$Login_session' = Login ");
        $q->execute();
        $resultq = $q->fetch();
        
        if(isset($resultq))
        {
            var_dump($_SESSION);
            $_SESSION['ID_compte'] = $resultq['ID_compte'];
            $_SESSION['Nom'] = $resultq['Nom'];
            $_SESSION['Prenom'] = $resultq['Prenom'];
            $_SESSION['Centre'] = $resultq['Centre'];
            $_SESSION['Promotion'] = $resultq['Promotion_assigne'];
            var_dump($_SESSION); 
            header("location: ./profil_page.php" );
        }

        
}

catch(PDOException $e){
    echo "failed" .$e->getMessage();
}


?>
<?php session_start();

try {
    
    $connexion = new PDO('mysql:host=localhost;dbname=web', 'root', '');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $mailconnexion = $_POST['clogin'];
    $mdpconnexion = $_POST['cpassword'];

    if (!empty($mailconnexion) && !empty($mdpconnexion)) 
    {
        $q = $connexion->prepare("SELECT * FROM profil WHERE Login = '$mailconnexion' AND Mot_de_passe =  '$mdpconnexion'");
        $q->execute();
        $resultq = $q->fetch();
        
        if($mailconnexion == $resultq['Login'] && $mdpconnexion == $resultq['Mot_de_passe'])
        {
            $_SESSION['Login'] = $resultq['Login'];
            $_SESSION['Droits'] = $resultq['Droits'];
            header("location: ../site.php" );
        }

        else
        {
            header("location: connection_page.php?log_err=false_login");
        }
        echo"Reussi";
    }

    else
    {
        header("location: connection_page.php?log_err=empty");
    }
}

catch(PDOException $e){
    echo "failed" .$e->getMessage();
}


?>
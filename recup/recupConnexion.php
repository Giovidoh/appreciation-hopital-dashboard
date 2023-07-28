<?php
    session_start();

    // LES TYPES D'UTILISATEURS
    $admin = 'admin';
    $user = 'user';

    if(isset($_POST['send'])){
        $id = addslashes($_POST['identifiant']);
        $mdp = addslashes($_POST['mdp']);

        //Vérifier si les données entrées sont valides
        $sql = "SELECT IdentifiantUt, TypeUt
                FROM utilisateur
                WHERE IdentifiantUt = '$id'
                AND MdpUt = '$mdp';";
        $resultat = mysqli_query($connexion, $sql);
        $row = mysqli_fetch_assoc($resultat);
        if($row){
            $_SESSION['id'] = $id;
            $_SESSION['type'] = $row['TypeUt'];
            header("Location:accueil.php");
        }else{
            $message="Identifiant ou mot de passe incorrect !";
        }
    }





?>
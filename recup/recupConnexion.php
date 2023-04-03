<?php
    session_start();

    if(isset($_POST['send'])){
        $id = addslashes($_POST['identifiant']);
        $mdp = addslashes($_POST['mdp']);

        //Vérifier si les données entrées sont valides
        $sql = "SELECT *
                FROM utilisateur
                WHERE IdentifiantUt='$id'
                AND MdpUt = '$mdp';";
        $resultat = mysqli_query($connexion, $sql);
        $row = mysqli_fetch_all($resultat);
        if($row){
            $_SESSION['id'] = $id;
            header("Location:index.php");
        }else{
            $message="Identifiant ou mot de passe incorrect !";
        }
    }





?>
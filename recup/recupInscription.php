<?php

    if(isset($_POST['send'])){
        $nom = addslashes($_POST['nom']);
        $prenom = addslashes($_POST['prenom']);
        $id = addslashes($_POST['identifiant']);
        $mdp = addslashes($_POST['mdp']);

        //Vérifier si l'identifiant existe
        $sql = "SELECT *
                FROM utilisateur
                WHERE IdentifiantUt='$id';";
        $resultat = mysqli_query($connexion, $sql);
        $row = mysqli_fetch_all($resultat);
        if($row){
            $message = "Un autre utilisateur utilise déjà cet identifiant ! Choisissez-en un autre.";
            $type = "failure";
        }else{
            //Insérer le nouvel utilisateur dans la bdd
            $sql = "INSERT INTO utilisateur
                    VALUES(NULL, '$nom', '$prenom', '$id', '$mdp');";
            $resultat = mysqli_query($connexion, $sql);
            if($resultat){
                $message = "L'utilisateur '$id' a été ajouté.";
                $type = "success";
            }else{
                $message = "Une erreur est survenue lors de l'ajout de l'utilisateur '$id' ! Veuillez réessayer.";
                $type = "failure";
            }
        }
    }





?>
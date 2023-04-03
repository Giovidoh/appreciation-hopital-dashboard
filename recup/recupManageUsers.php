<?php
    //SUPPRESSION D'UN UTILISATEUR
    if(isset($_POST['oui'])){
        $num = $_POST['numero'];

        $sql = "DELETE FROM utilisateur
                WHERE NumUt = $num;";
        $resultat = mysqli_query($connexion, $sql);
        if($resultat){
            $message = "L'utilisateur portant le numéro $num a été supprimé avec succès !";
            $type = "success";
        }else{
            header("Location:manageUsers.php");
        }
    }


?>
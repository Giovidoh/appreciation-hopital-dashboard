<?php
    if(isset($_POST['sendParameters'])){
        if($_POST['pharmacyName'] !== ""){
            //Mettre à jour le nom de la pharmacie
            $nom = addslashes(trim($_POST['pharmacyName']));
            $sql = "UPDATE parametres
                    SET NomCentre = \"$nom\"";
            $result = mysqli_query($connexion, $sql);
            if($result){
                $nom_sans_antislashes = stripslashes($nom);
                $message1 = "Le nom de la pharmacie est : <br> $nom_sans_antislashes";
                $type1 = "success";
            }
        }

        if($_POST['libelle1'] !== ""){
            //Mettre à jour le nom de la pharmacie
            $libelle1 = addslashes(trim($_POST['libelle1']));
            $sql = "UPDATE parametres
                    SET Libelle1 = \"$libelle1\"";
            $result = mysqli_query($connexion, $sql);
            if($result){
                $libelle1_sans_antislashes = stripslashes($libelle1);
                $message2 = "La question à poser pour l'appréciation est : <br> $libelle1_sans_antislashes";
                $type2 = "success";
            }
        }

        if($_POST['libelle2'] !== ""){
            //Mettre à jour le nom de la pharmacie
            $libelle2 = addslashes(trim($_POST['libelle2']));
            $sql = "UPDATE parametres
                    SET Libelle2 = \"$libelle2\"";
            $result = mysqli_query($connexion, $sql);
            if($result){
                $libelle2_sans_antislashes = stripslashes($libelle2);
                $message3 = "Le titre pour d'invitation au commentaire est : <br> $libelle2_sans_antislashes";
                $type3 = "success";
            }
        }
    }
?>
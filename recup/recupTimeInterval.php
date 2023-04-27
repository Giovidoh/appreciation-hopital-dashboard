<?php
    if(isset($_POST['beginningDate']) && isset($_POST['endingDate'])){
        extract($_POST);
        //Vérifier les exceptions
        if(strtotime($beginningDate) > strtotime($endingDate)){
            //Réinitialiser les dates
            $beginningDate = NULL;
            $endingDate = NULL;

            //Message d'échec
            $message = "La date de début doit être inférieure ou égale à la date de fin !";
            $type = "failure";
        }else{
            //Formater et affecter les dates pour l'affichage du message de succès
            $beginningDate_msg = date("d/m/Y", strtotime($beginningDate));
            $endingDate_msg = date("d/m/Y", strtotime($endingDate));

            //Message de succès
            $message = "Voici les observations faites entre $beginningDate_msg et $endingDate_msg : ";
            $type = "success";

            //Formater et affecter les dates pour les requêtes
            $beginningDate = date("Y-m-d", strtotime($beginningDate));
            $endingDate = date("Y-m-d", strtotime($endingDate));
        }
    }else if(isset($_POST['resetAll'])){
        //Réinitialiser les dates
        $beginningDate = NULL;
        $endingDate = NULL;
    }
?>
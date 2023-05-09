<?php
    //CONNEXION À LA BDD
    include("../php-partials/connectionDB.php");

    if(isset($_POST['sendExportInExcel']) && isset($_POST['filename'])){
        extract($_POST);
        header('Content-Type: text/csv;');
        header("Content-Disposition: attachment; filename=" . $filename . ".csv");

        $sql = "SELECT NumObs, AppreciationObs, CommentaireObs, NomObs, ContactObs, DateObs
                FROM observation;";
        $result = mysqli_query($connexion, $sql);

        //En-tête du tableau
        echo mb_convert_encoding('"N°";"Appréciations";"Commentaires";"Nom";"Contact";"Date"' . "\n", "ISO-8859-1", "UTF-8");

        while($rows = mysqli_fetch_assoc($result)){
            echo mb_convert_encoding('"'.$rows['NumObs'].'";"'.$rows['AppreciationObs'].'";"'.$rows['CommentaireObs'].'";"'.$rows['NomObs'].'";"'.$rows['ContactObs'].'";"'.$rows['DateObs'].'"', 'ISO-8859-1', 'UTF-8') ."\n";
        }

    }
    
//FERMETURE DE LA CONNEXION A LA BDD
mysqli_close($connexion);


?>
<!-- FUNCTIONS -->
<?php
    require_once("php-partials/functions.php");
?>

<!-- NOM DE LA PAGE -->
<?php
    $name = "Tableau de bord"
?>

<!-- HEADER -->
<?php
    require_once("php-partials/header.php");
?>

<!-- CONNEXION À LA BDD -->
<?php
    include("php-partials/connectionDB.php");
?>

<!-- LES DIFFÉRENTS TYPES D'APPRÉCIATIONS -->
<?php
    $TresSatisfait = "Très satisfait";
    $Satisfait = "Satisfait";
    $PeuSatisfait = "Peu satisfait";
    $PasDuToutSatisfait = "Pas du tout satisfait";
?>

<!-- SELECTIONNER LES NOMBRES DES APPRÉCIATION DE LA BDD -->
<?php
    // Nombre de Très satisfait
    $sql = "SELECT COUNT(*) as nombre
            FROM observation
            WHERE AppreciationObs = \"$TresSatisfait\"; ";
    $resultat = mysqli_query($connexion, $sql);
    $row = mysqli_fetch_assoc($resultat);
    if($row){
        $nbreTresSatisfait = $row['nombre'];
    }

    // Nombre de Satisfait
    $sql = "SELECT COUNT(*) as nombre
            FROM observation
            WHERE AppreciationObs = \"$Satisfait\"; ";
    $resultat = mysqli_query($connexion, $sql);
    $row = mysqli_fetch_assoc($resultat);
    if($row){
        $nbreSatisfait = $row['nombre'];
    }

    // Nombre de Peu satisfait
    $sql = "SELECT COUNT(*) as nombre
            FROM observation
            WHERE AppreciationObs = \"$PeuSatisfait\"; ";
    $resultat = mysqli_query($connexion, $sql);
    $row = mysqli_fetch_assoc($resultat);
    if($row){
        $nbrePeuSatisfait = $row['nombre'];
    }

    // Nombre de Pas du tout satisfait
    $sql = "SELECT COUNT(*) as nombre
            FROM observation
            WHERE AppreciationObs = \"$PasDuToutSatisfait\"; ";
    $resultat = mysqli_query($connexion, $sql);
    $row = mysqli_fetch_assoc($resultat);
    if($row){
        $nbrePasDuToutSatisfait = $row['nombre'];
    }
?>

<!-- MAIN -->
    <main class="dashboard-main">

        <span class="dashboard-main-heading__title">Statistiques</span>

        <div class="dashboard-main-heading">
            <div class="dashboard-main-heading__box">
                <div class="dashboard-main-heading__box__appreciation">
                    <span>Très satisfait</span>
                </div>
                
                <div class="dashboard-main-heading__box__count">
                    <span>
                        <?php
                            echo $nbreTresSatisfait;
                        ?>
                    </span>
                </div>
            </div>

            <div class="dashboard-main-heading__box">
                <div class="dashboard-main-heading__box__appreciation">
                    <span>Satisfait</span>
                </div>
                
                <div class="dashboard-main-heading__box__count">
                    <span>
                        <?php
                            echo $nbreSatisfait;
                        ?>
                    </span>
                </div>
            </div>

            <div class="dashboard-main-heading__box">
                <div class="dashboard-main-heading__box__appreciation">
                    <span>Peu statisfait</span>
                </div>
                
                <div class="dashboard-main-heading__box__count">
                    <span>
                        <?php
                            echo $nbrePeuSatisfait;
                        ?>
                    </span>
                </div>
            </div>

            <div class="dashboard-main-heading__box">
                <div class="dashboard-main-heading__box__appreciation">
                    <span>Pas du tout satisfait</span>
                </div>
                
                <div class="dashboard-main-heading__box__count">
                    <span>
                        <?php
                            echo $nbrePasDuToutSatisfait;
                        ?>
                    </span>
                </div>
            </div>
        </div>

        <span class="dashboard-main-answers__title">Liste des réponses des clients</span>

        <div class="dashboard-main-answers">
            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Choix effectué par le client</th>
                        <th>Nom & Prénoms</th>
                        <th>Contact</th>
                        <th>Commentaire du client</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $sql = "SELECT NumObs, AppreciationObs, CommentaireObs, NomObs, ContactObs
                                FROM observation
                                ORDER BY NumObs DESC;";
                        $resultat = mysqli_query($connexion, $sql);
                        while($rows = mysqli_fetch_assoc($resultat)):
                    ?>
                            <tr>
                                <td><?= $rows['NumObs']; ?></td>
                                <td><?= $rows['AppreciationObs']; ?></td>
                                <td><?= $rows['NomObs']; ?></td>
                                <td><?= $rows['ContactObs']; ?></td>
                                <td><?= $rows['CommentaireObs']; ?></td>
                            </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>
        </div>
        
    </main>
    

</body>
</html>
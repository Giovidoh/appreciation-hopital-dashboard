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

<!-- RÉCUPÉRATION DES DONNÉES DE L'INTERVALLE DE TEMPS -->
<?php
    include("recup/recupTimeInterval.php");
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
    if(isset($beginningDate) && isset($endingDate)){
        $sql = "SELECT COUNT(*) as nombre
                FROM observation
                WHERE AppreciationObs = \"$TresSatisfait\"
                AND DateObs BETWEEN '$beginningDate' AND '$endingDate';";
    }else{
        $sql = "SELECT COUNT(*) as nombre
                FROM observation
                WHERE AppreciationObs = \"$TresSatisfait\";";
    }
    $resultat = mysqli_query($connexion, $sql);
    $row = mysqli_fetch_assoc($resultat);
    if($row){
        $nbreTresSatisfait = $row['nombre'];
    }

    // Nombre de Satisfait
    if(isset($beginningDate) && isset($endingDate)){
        $sql = "SELECT COUNT(*) as nombre
                FROM observation
                WHERE AppreciationObs = \"$Satisfait\"
                AND DateObs BETWEEN '$beginningDate' AND '$endingDate';";
    }else{
        $sql = "SELECT COUNT(*) as nombre
                FROM observation
                WHERE AppreciationObs = \"$Satisfait\";";
    }
    $resultat = mysqli_query($connexion, $sql);
    $row = mysqli_fetch_assoc($resultat);
    if($row){
        $nbreSatisfait = $row['nombre'];
    }

    // Nombre de Peu satisfait
    if(isset($beginningDate) && isset($endingDate)){
        $sql = "SELECT COUNT(*) as nombre
                FROM observation
                WHERE AppreciationObs = \"$PeuSatisfait\"
                AND DateObs BETWEEN '$beginningDate' AND '$endingDate';";
    }else{
        $sql = "SELECT COUNT(*) as nombre
                FROM observation
                WHERE AppreciationObs = \"$PeuSatisfait\";";
    }
    $resultat = mysqli_query($connexion, $sql);
    $row = mysqli_fetch_assoc($resultat);
    if($row){
        $nbrePeuSatisfait = $row['nombre'];
    }

    // Nombre de Pas du tout satisfait
    if(isset($beginningDate) && isset($endingDate)){
        $sql = "SELECT COUNT(*) as nombre
                FROM observation
                WHERE AppreciationObs = \"$PasDuToutSatisfait\"
                AND DateObs BETWEEN '$beginningDate' AND '$endingDate';";
    }else{
        $sql = "SELECT COUNT(*) as nombre
                FROM observation
                WHERE AppreciationObs = \"$PasDuToutSatisfait\";";
    }
    $resultat = mysqli_query($connexion, $sql);
    $row = mysqli_fetch_assoc($resultat);
    if($row){
        $nbrePasDuToutSatisfait = $row['nombre'];
    }
?>

<!-- OVERLAY -->
<div id="overlay"></div>

<!-- MAIN -->
    <main class="dashboard-main">
        <!-- AFFICHER DES MESSAGES -->
        <?php
            if(isset($message) && isset($type)):
        ?>
            <p class="failure-success-message <?= $type; ?>">
                <?php
                    echo $message;
                ?>
            </p>
        <?php
            endif;
        ?>
        <fieldset class="dashboard-main-time">
            <legend class="dashboard-main-time__title">Intervalle de temps</legend>
            <form class="dashboard-main-time__form" method="POST">

                <div>
                    <label for="">Date début</label>
                    <input name="beginningDate" type="date" required>
                </div>

                <div>
                    <label for="">Date fin</label>
                    <input name="endingDate" type="date" required>
                </div>

                <div class="dashboard-main-time__form__submit">
                    <input name="sendTime" type="submit" value="OK">
                </div>
            </form>

            <form class="dashboard-main-time__form-reset" method="POST">
                <input name="resetAll" type="submit" value="Réinitialiser">
            </form>

        </fieldset>
        <fieldset class="dashboard-main-stats">
            <legend class="dashboard-main-stats__title">Statistiques</legend>
                <div class="dashboard-main-stats__box">
                    <div class="dashboard-main-stats__box__appreciation">
                        <span>Très satisfait</span>
                    </div>
                    
                    <div class="dashboard-main-stats__box__count">
                        <span>
                            <?php
                                echo $nbreTresSatisfait;
                            ?>
                        </span>
                    </div>
                </div>

                <div class="dashboard-main-stats__box">
                    <div class="dashboard-main-stats__box__appreciation">
                        <span>Satisfait</span>
                    </div>
                    
                    <div class="dashboard-main-stats__box__count">
                        <span>
                            <?php
                                echo $nbreSatisfait;
                            ?>
                        </span>
                    </div>
                </div>

                <div class="dashboard-main-stats__box">
                    <div class="dashboard-main-stats__box__appreciation">
                        <span>Peu statisfait</span>
                    </div>
                    
                    <div class="dashboard-main-stats__box__count">
                        <span>
                            <?php
                                echo $nbrePeuSatisfait;
                            ?>
                        </span>
                    </div>
                </div>

                <div class="dashboard-main-stats__box">
                    <div class="dashboard-main-stats__box__appreciation">
                        <span>Pas du tout satisfait</span>
                    </div>
                    
                    <div class="dashboard-main-stats__box__count">
                        <span>
                            <?php
                                echo $nbrePasDuToutSatisfait;
                            ?>
                        </span>
                    </div>
                </div>
        </fieldset>

        <fieldset class="dashboard-main-answers">
            <legend class="dashboard-main-answers__title">Liste des réponses des clients</legend>

            <div class="dashboard-main-answers__heading">
                <button id="exportExcelBtn" class="dashboard-main-answers__heading__export">
                    <img src="images/excel.svg" alt="icône du logo d'excel">
                    Exporter en Excel
                </button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Choix effectué par le client</th>
                        <th>Nom & Prénoms</th>
                        <th>Contact</th>
                        <th>Commentaire du client</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if(isset($beginningDate) && isset($endingDate)){
                            $sql = "SELECT NumObs, AppreciationObs, CommentaireObs, NomObs, ContactObs, DateObs
                                    FROM observation
                                    WHERE DateObs BETWEEN '$beginningDate' AND '$endingDate'
                                    ORDER BY NumObs DESC;";
                        }else{
                            $sql = "SELECT NumObs, AppreciationObs, CommentaireObs, NomObs, ContactObs, DateObs
                                    FROM observation
                                    ORDER BY NumObs DESC;";
                        }
                        
                        $resultat = mysqli_query($connexion, $sql);
                        while($rows = mysqli_fetch_assoc($resultat)):
                    ?>
                            <tr>
                                <td><?php echo $rows['NumObs']; ?></td>
                                <td><?php echo $rows['AppreciationObs']; ?></td>
                                <td><?php echo $rows['NomObs']; ?></td>
                                <td><?php echo $rows['ContactObs']; ?></td>
                                <td><?php echo $rows['CommentaireObs']; ?></td>
                                <td><?php echo date("d/m/Y", strtotime($rows['DateObs'])); ?></td>
                            </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>
        </fieldset>

        <!-- FORMULAIRE DE DÉFINITION DU NOM DU FICHIER EXCEL -->
        <div id="excel-filename-form" class="excel-filename-form">
            <div class="excel-filename-form__close">
                &times;
            </div>
            <h3>Entrez le nom sous lequel la liste sera exportée : </h3>
            <form action="recup/exportExcel.php" method="POST">
                <input id="filename" name="filename" type="text" required>
                <input name="sendExportInExcel" type="submit" value="Exporter">
            </form>
        </div>
        
    </main>


    <!-- JS -->
    <script src="js/accueil.js"></script>
</body>
</html>
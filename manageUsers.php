<!-- FUNCTIONS -->
<?php
    require_once("php-partials/functions.php");
?>

<!-- NOM DE LA PAGE -->
<?php
    $name = "Gérer les utilisateurs"
?>

<!-- HEADER -->
<?php
    require_once("php-partials/header.php");
?>

<!-- CONNEXION À LA BDD -->
<?php
    include("php-partials/connectionDB.php");
?>

<!-- MAIN -->
    <main class="manageUsers-main">

        <span class="manageUsers-main-usersList__title">Liste des utilisateurs</span>

        <div class="manageUsers-main-usersList">
            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nom & Prénoms</th>
                        <th>Type d'utilisateur</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $sql = "SELECT NumUt, NomUt, PrenomUt, TypeUt
                                FROM utilisateur;";
                        $resultat = mysqli_query($connexion, $sql);
                        while($rows = mysqli_fetch_assoc($resultat)):
                    ?>
                            <tr>
                                <td><?= $rows['NumUt']; ?></td>
                                <td><?= $rows['NomUt'] . ' ' . $rows['PrenomUt']; ?></td>
                                <td><?= $rows['TypeUt']; ?></td>
                                <td></td>
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
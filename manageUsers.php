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
                                FROM utilisateur
                                ORDER BY NumUt DESC;";
                        $resultat = mysqli_query($connexion, $sql);
                        while($rows = mysqli_fetch_assoc($resultat)):
                    ?>
                            <tr>
                                <td><?= $rows['NumUt']; ?></td>
                                <td><?= $rows['NomUt'] . ' ' . $rows['PrenomUt']; ?></td>
                                <td><?= $rows['TypeUt']; ?></td>
                                <td><button class="manageUsers-main-usersList__deleteUser delete" value="<?= $rows['NumUt']; ?>">Supprimer</button></td>
                            </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>
        </div>
        
        <div id="manageUsers-main-overflow" class="manageUsers-main-overflow"></div>

        <div id="manageUsers-main-confirmation" class="manageUsers-main-confirmation">
            <span id="closing-cross" class="manageUsers-main-confirmation__closing-cross">&times;</span>
            <span class="manageUsers-main-confirmation__question">Voulez-vous réellement supprimer cet utilisateur ?</span>
            <form class="manageUsers-main-confirmation__form" method="POST">
                <div class="manageUsers-main-confirmation__form__info">
                    <input id="num" class="manageUsers-main-confirmation__form__info__num" value="">
                    <span id="identifiant" class="manageUsers-main-confirmation__form__info__id">Giovanni</span>
                </div>
                <div class="manageUsers-main-confirmation__form__buttons">
                    <input name="oui" type="submit" class="manageUsers-main-confirmation__form__buttons__oui" value="Oui">
                    <input name="non" type="submit" class="manageUsers-main-confirmation__form__buttons__non" value="Non">
                </div>
            </form>
        </div>

    </main>
    

    <script src="js/manageUsers.js"></script>
</body>
</html>
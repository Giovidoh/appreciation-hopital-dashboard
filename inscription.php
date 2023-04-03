<!-- FUNCTIONS -->
<?php
    require_once("php-partials/functions.php");
?>

<!-- NOM DE LA PAGE -->
<?php
    $name = "Création des utilisateurs";
?>

<!-- HEADER -->
<?php
    require_once("php-partials/header.php");
?>

<!-- CONNEXION À LA BDD -->
<?php
    include("php-partials/connectionDB.php");
?>

<!-- RECUPERATION DES DONNÉES ENTRÉES -->
<?php
    include("recup/recupInscription.php");
?>

<!-- MAIN -->

    <main class="inscription-main">
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
        <div class="inscription-main-form">
            <h3 class="inscription-main-form__heading">Veuillez renseigner les champs ci-dessous pour créer un nouvel utilisateur</h3>
            <form class="inscription-main-form__form" method="POST" autocomplete="off">
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="text" name="prenom" placeholder="Prénom(s)" required>
                <input type="text" name="identifiant" placeholder="Identifiant" required>
                <input type="password" name="mdp" placeholder="Mot de passe" required>
                <select name="type" id="" required>
                    <option value="" selected disabled>Choisissez le type de l'utilisateur</option>
                    <option value="admin">administrateur</option>
                    <option value="user">utilisateur</option>
                </select>

                <input type="submit" name="send" value="Envoyer">
            </form>

        </div>
    </main>
    

</body>
</html>

<!-- FERMETURE DE LA CONNEXION À LA BDD -->
<?php
    mysqli_close($connexion);
?>
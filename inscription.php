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

<!-- MAIN -->
    <main class="inscription-main">
        <div class="inscription-main-form">
            <h3 class="inscription-main-form__heading">Veuillez renseigner les champs ci-dessous pour créer un nouvel utilisateur</h3>
            <form class="inscription-main-form__form" method="POST" autocomplete="off">
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="text" name="prenom" placeholder="Prénom(s)" required>
                <input type="text" name="identifiant" placeholder="Identifiant" required>
                <input type="text" name="mdp" placeholder="Mot de passe" required>

                <input type="submit" value="Envoyer">
            </form>

        </div>
    </main>
    

</body>
</html>
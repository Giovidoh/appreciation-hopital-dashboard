<!-- FUNCTIONS -->
<?php
    require_once("php-partials/functions.php");
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
                <input type="text" name="nom" placeholder="Nom">
                <input type="text" name="prenom" placeholder="Prénom(s)">
                <input type="text" name="identifiant" placeholder="Identifiant">
                <input type="text" name="mdp" placeholder="Mot de passe">

                <input type="submit" value="Envoyer">
            </form>

        </div>
    </main>
    

</body>
</html>
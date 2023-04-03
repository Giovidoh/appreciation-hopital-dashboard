<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <title>Connexion</title>
</head>
<body>

    <!-- MAIN -->
    <main class="connexion-main">
        <div class="connexion-main-form">
            <h3 class="connexion-main-form__heading">Veuillez vous authentifier pour accéder au reste du site </h3>
            <form class="connexion-main-form__form" method="POST" autocomplete="off">
                <input type="text" name="identifiant" placeholder="Identifiant" required>
                <input type="text" name="mdp" placeholder="Mot de passe" required>

                <input type="submit" value="Envoyer">
            </form>

        </div>
    </main>
    
</body>
</html>
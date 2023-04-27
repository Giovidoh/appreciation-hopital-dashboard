<!-- FUNCTIONS -->
<?php
    require_once("php-partials/functions.php");
?>

<!-- NOM DE LA PAGE -->
<?php
    $name = "Paramètres"
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
    include("recup/recupParameters.php");
?>


<!-- MAIN -->

<main class="parameters-main">

    <!-- AFFICHER DES MESSAGES -->
    <?php
        if(isset($message1) && isset($type1)):
    ?>
        <p class="failure-success-message <?= $type1; ?>">
            <?php
                echo $message1;
            ?>
        </p>
    <?php
        endif;
    ?>

    <?php
        if(isset($message2) && isset($type2)):
    ?>
        <p class="failure-success-message <?= $type2; ?>">
            <?php
                echo $message2;
            ?>
        </p>
    <?php
        endif;
    ?>

    <?php
        if(isset($message3) && isset($type3)):
    ?>
        <p class="failure-success-message <?= $type3; ?>">
            <?php
                echo $message3;
            ?>
        </p>
    <?php
        endif;
    ?>
    <div class="parameters-form" method="POST">
        <h3 class="parameters-form__heading">Ici vous pouvez modifier le nom de la pharmacie, ainsi que les questions qui seront affichées aux utilisateurs.</h3>
        <form class="parameters-form__form" method="POST">
            <input name="pharmacyName" type="text" maxlength="30" placeholder="Nom de la pharmacie">
            <input name="libelle1" type="text" maxlength="150" placeholder="Libellé des appréciations">
            <input name="libelle2" type="text" maxlength="150" placeholder="Libellé des commentaires">
            <input name="sendParameters" type="submit" value="Enregistrer">
        </form>
    </div>
</main>
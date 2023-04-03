<?php
    if(isset($_SESSION['id'])):
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <header class="dashboard-side">
        <span class="dashboard-side__title"><?php if($name){ echo $name; }else{ echo "Mon site"; } ?></span>
        <div class="dashboard-side__container">
            <nav>
                <ul>
                    <?php
                        //AJOUT DU MENU
                        echo add_nav_menu();
                    ?>
                    
                    <!-- <li><a class="dashboard-side__link" href="index.php">Dashboard</a></li> -->
                </ul>
            </nav>

            <a class="dashboard-side__link dashboard-side__link--deconnexion" href="deconnexion.php">Déconnexion</a>
        </div>
        
    </header>
<?php
    else: header("Location:connexion.php");

    endif;
?>
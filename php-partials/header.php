<!-- LES TYPES D'UTILISATEURS -->
<?php
    require_once('functions.php');
    
    $admin = 'admin';
    $user = 'user';
?>

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
                        if($_SESSION['type'] === $user){
                            echo add_nav_menu_user();
                        } elseif($_SESSION['type'] === $admin) {
                            echo add_nav_menu_admin();
                        }
                    ?>
                    
                    <!-- <li><a class="dashboard-side__link" href="index.php">Dashboard</a></li> -->
                </ul>
            </nav>

            <a class="dashboard-side__link dashboard-side__link--deconnexion" href="deconnexion.php">Déconnexion</a>
        </div>
        
    </header>
<?php else: ?> 
    <?php
        header("Location:connexion.php");
    ?>
<?php
    endif;
?>
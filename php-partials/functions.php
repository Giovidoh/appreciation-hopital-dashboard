<?php
    session_start();
    
    function dump($variable){
        echo '<pre>';
        var_dump($variable);
        echo '<pre>';
    }

    function add_nav_item(string $link, string $name) : string {
        $class = "dashboard-side__link";
        $link = "/appreciation-hopital-dashboard/" . $link;
        if ($_SERVER['SCRIPT_NAME'] === $link){
            $class .= " dashboard-side__link--active";
        }

        $item = <<< HTML
            <li class="navbar__list__item"> 
                <a class="$class" href="$link">
                    $name
                </a>
            </li>
        HTML;

        return $item;
    }

    function add_nav_menu_user(){
        return
            add_nav_item("index.php", "Tableau de bord");
    }

    function add_nav_menu_admin(){
        return
            add_nav_item("index.php", "Tableau de bord").
            add_nav_item("inscription.php", "Création des utilisateurs").
            add_nav_item("manageUsers.php", "Gérer les utilisateurs").
            add_nav_item("parametres.php", "Paramètres");
    }
?>
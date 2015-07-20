<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">Admin</a>
    <ul class="dropdown-menu">
        <?php if ($_SESSION['admin'] == 'OUI' OR $_SESSION['uploaderPhoto'] == 'OUI')
        {?>
            <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Photos</a>
                <ul class="dropdown-menu">
                    <li><a href="../index.php?page=ajouterAlbum" tabindex="-1" href="wp-sc-accordion.html">Créer album</a></li>
                    <li><a href="../index.php?page=ajouterPhoto" tabindex="-1" href="wp-sc-alerts.html">Ajouter photo à l'album</a></li>
                    <li><a href="../index.php?page=modifierMiniature" tabindex="-1" href="wp-sc-alerts.html">Modifier miniature de l'album</a></li>
                    <li><a href="../index.php?page=modifierDescriptionAlbum" tabindex="-1" href="wp-sc-alerts.html">Add/Modifier description album</a></li>
                    <li><a href="../index.php?page=supprimerAlbum" tabindex="-1" href="wp-sc-alerts.html">Supprimer album</a></li>
                    <li><a href="../index.php?page=supprimerPhoto" tabindex="-1" href="wp-sc-alerts.html">Supprimer photo</a></li>
                </ul>
            </li>
        <?php
        }
        if ($_SESSION['admin'] == 'OUI')
        {
            ?>
            <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Biere du mois</a>
                <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="../index.php?page=modifierBiereDuMois">Changer phrase bière du mois</a></li>
                </ul>
            </li>
            <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Teasers</a>
                <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="../index.php?page=ajouterTeaser">Ajouter Video</a></li>
                    <li><a tabindex="-1" href="../index.php?page=supprimerTeaser">Supprimer Video</a></li>
                </ul>
            </li>
            <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Calendrier</a>
                <ul class="dropdown-menu">
                    <li><a href="../index.php?page=ajouterEvenement" tabindex="-1" href="wp-sc-accordion.html">Créer événement</a></li>
                    <li><a href="../index.php?page=modifierEvenement" tabindex="-1" href="wp-sc-alerts.html">Modifier événement</a></li>
                    <li><a href="../index.php?page=supprimerEvenement" tabindex="-1" href="wp-sc-alerts.html">Supprimer événement</a></li>
                </ul>
            </li>
            <li><a href="../index.php?page=modifierPhraseSlider">Changer phrase page d'accueil</a></li>
            <li><a href="../index.php?page=nombreConnexions">Nombre de connexions</a></li>
            <li><a href="../index.php?page=utilisateurConnecte">Utilisateur connecté</a></li>
            <li><a href="#">Autre chose, on verra en fonction du besoin</a></li>


        <?php
        } ?>

    </ul>
</li>
<header>
    <div id="navOne" class="navbar navbar-wp" role="navigation">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" >
                    <img src="vues/images/logoPKmin.png"  >
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">

                        <a href="index.php" class="dropdown-toggle"  data-hover="dropdown" data-close-others="true">P'tit Kawa</a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?page=about">About us</a></li>
                            <li><a href="index.php?page=pkTeam">PK Team</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="albumPhoto/albumPhoto.php" class="dropdown-toggle" data-hover="dropdown" data-close-others="true">Photos</a>
                    </li>
                    <li class="dropdown">
                        <a href="teaser/teasers.php" class="dropdown-toggle" data-hover="dropdown" data-close-others="true">Vidéos</a>
                    </li>
                    <li class="dropdown">
                        <a href="calendrier/calendrier.php" class="dropdown-toggle"  data-hover="dropdown" data-close-others="true">Calendrier</a>
                    </li>
                    <li class="dropdown">
                        <a href="index.php?page=tournoi" class="dropdown-toggle"  data-hover="dropdown" data-close-others="true">Tournois</a>
                    </li>
                    <li class="dropdown">
                        <a href="index.php?page=boissons" class="dropdown-toggle"  data-hover="dropdown" data-close-others="true">Boissons</a>
                    </li>
                    <li class="dropdown">
                        <a href="index.php?page=vetements" class="dropdown-toggle"  data-hover="dropdown" data-close-others="true">Vêtements</a>
                    </li>
                    <li class="dropdown">
                        <a href="index.php?page=soirees-privees" class="dropdown-toggle"  data-hover="dropdown" data-close-others="true">Soirées privées
                        </a>
                    </li>
                    <?php if ($_SESSION['admin'] == 'OUI' OR $_SESSION['uploaderPhoto'] == 'OUI')
                    {
                        include_once("administrationHEADER.php");
                    }
                    ?>

                    <?php if (isset($_SESSION['prenom']))
                    {
                        include_once("deconnectionHEADER.php");
                    }
                    else
                    {
                        include_once("connexionHEADER.php");
                    }
                    ?>

<!--                    <li class="hidden-xs">-->
<!--                        <a href="#" id="cmdAsideMenu" class="dropdown-toggle dropdown-form-toggle" title="Open sidebar">-->
<!--                            <i class="fa fa-outdent"></i>-->
<!--                        </a>-->
<!--                    </li>-->
                </ul>

            </div>
        </div>
    </div>
</header>
<?php
require_once(dirname(__FILE__).'/../include/functions.php');
?>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="col">
                    <h4>Nous Contacter</h4>
                    <ul>
                        <li>135 Avenue de Rangueil, 31400 Toulouse</li>
                        <li>Téléphone : 06 11 27 62 30
                        <li>Email: <a href="mailto:bar@amicale-insat.fr" title="Email Us">bar@amicale-insat.fr</a></li>
                    </ul>
                </div>
            </div>



            <div class="col-md-3">
                <div class="col col-social-icons">
                    <h4>Follow us</h4>
                    <a href="https://www.facebook.com/barinsa?fref=ts"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.youtube.com/channel/UCrXtMxauQyl22Zt8QAAgf_A"><i class="fa fa-youtube-play"></i></a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col">
                    <h4>About us</h4>
                    <p>
                        <a href="index.php?page=about" class="btn btn-two">Page : About us</a>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col">
                  <?php if (isset($_SESSION["prenom"]) && isset($_SESSION["nom"]))
    {
    ?> <h4><?php echo $_SESSION["prenom"]." ".$_SESSION["nom"]; ?></h4>
                  <?php
    }
    else
    { ?>
    <h4>Users</h4>
    <?php } ?>
                    
                    <ul>
                        <?php
                        $NumberUserConnected = returnNumberUserOnWebSitePK();
                        ?>
                      
                        <?php
                        if ($NumberUserConnected == 0)
                        {
                            echo "<li> Il n'y a actuellement personne connectée.</li>";
                        }
                        elseif ( $NumberUserConnected == 1)
                        {
                            echo "<li>Il n'y a qu'une seule personne connectée.</li>";
                        }
                        else
                        {
                            echo "<li>Il y a ".$NumberUserConnected." personnes actuellement connectées sur le site.</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-lg-9 copyright">
                2014-15 © Arthur Papailhau pour le PK. All rights reserved.
            </div>
            <div class="col-lg-3 footer-logo">

            </div>
        </div>
    </div>
</footer>

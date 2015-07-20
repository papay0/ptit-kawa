<section id="asideMenu" class="aside-menu">
    <form class="form-inline form-search">
        <div class="input-group">

            <span class="input-group-btn">
                <button id="btnHideAsideMenu" class="btn btn-close pull-right" type="button" title="Hide sidebar"><i class="fa fa-times"><?php if (isset($_SESSION['prenom']))
                        {
                            echo "  Bonjour ".$_SESSION['prenom']." ".$_SESSION['nom'];
                        }
                        ?></i></button>
            </span>
        </div>
    </form>

<?php if (!isset($_SESSION['prenom']))
{
    include_once("connexionUsersMenu.php");
}
?>

    <h5 class="side-section-title">Navigation Rapide</h5>
    <div class="nav">
        <ul>
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Calendrier</a>
            </li>
            <li>
                <a href="#">Photos</a>
            </li>
            <li>
                <a href="#">About us</a>
            </li>
            <li>
                <a href="add-users.php">PK team</a>
            </li>
            <li>
                <a href="#">Vetements</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
            <!-- </h4> -->
    </div>


    <h5 class="side-section-title">Social media</h5>
    <div class="social-media">
        <a href="https://www.facebook.com/barinsa?fref=ts"><i class="fa fa-facebook facebook"></i></a>
        <a href="#"><i class="fa fa-youtube-play"></i></a>
    </div>

    <h5 class="side-section-title">Contact information</h5>
    <div class="contact-info">
        <h5>Addresse</h5>
        <p>Adresse du PK</p>

        <h5>Email</h5>
        <p>Mail du PK</p>

        <h5>Phone</h5>
        <p>Tel du PK ? Du prez ?</p>
    </div>
</section>




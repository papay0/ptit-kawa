<?php
require_once("../include/core.php");
require_once("../include/functions.php");
?>

<div style="display: none;" xmlns="http://www.w3.org/1999/html"></div><!DOCTYPE html><html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PK INSA TOULOUSE | ALBUM</title>




    <link rel="icon" href="favicon.png" type="image/png"
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css" media="screen" />

    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/ladda-themeless.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/amicale.css" media="screen" />

    <link href="css/global-style.css" rel="stylesheet" type="text/css" media="screen">


</head>
<body class="wp-theme-1">
<?php include("../vues/headerAlbumPhoto.php") ?>









    <header>

    </header>

    <!--
    -->




<?php
mettrePlusUnDansVuesTableForNumberVisiteOfAlbumPhoto();
$dateToday= date("Y-m-d");
$lastDayInBDD = returnLastDateInBDDVues();

if (returnDateEqualCURDATE($lastDayInBDD) == false)
{
    insertNewDateInNewRow();
}

if (!isset($_SESSION['prenom']))
{
include('../vues/mustBeLogged.php');
}
else
{
    ?>


    <?php

    $nItemsByPages = 9 ;
    $nbDossiers = nombreAlbum();

    ?>

<?php if ($nbDossiers == 0)
{
    ?>
    <center><div class="alert alert-info">
            Il n'y a pas encore d'album photo !
        </div></center>

    <br>
    <br>
<?php
}
?>

    <section class="slice  animate-hover-slide">
        <div class="w-section inverse work">
            <div class="container">





                <?php if ($nbDossiers > $nItemsByPages) { ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="sort-list-btn" style="text-align: center;">
                                <?php
                                $nPages = (int)(($nbDossiers - 1) / $nItemsByPages) + 1 ;
                                for ($i = 0 ; $i < $nPages ; $i++)
                                {
                                    ?>
                                    <button type="button" class="btn btn-five filter <?php echo $i == 0 ? 'active' : '' ; ?>" data-filter=".page-<?php echo $i ; ?>"><?php echo ($i + 1); ?></button>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>



                <?php } ?>



            <section class="slice animate-hover-slide ">
                <div class="w-section inverse">
                    <div class="container">


                        <h3 class="section-title">Album photo</h3>
                        <div class="row">
                            <div class="mixitup mix-paging ">



                                    <?php

                                    $i = 0;
                                    global $bdd;
                                    $reponse = $bdd->query('SELECT (name),(urlname),(id), (date_event), (description) FROM `album` ORDER BY date_event DESC ');

                                    while ($donnees = $reponse->fetch())
                                    {

                                        $adresseMiniature = retourneAdresseFileInBDDPhotoPremiereUploade($donnees['id']);
                                        $adresseMiniatureByUser = retourneAdresseMiniatureAjouteParUser($donnees['id']);


                                        ?>

                                        <div class="col-md-4 mix page-<?php echo (int)($i++ / $nItemsByPages) ; ?>">
                                            <div class="w-box">

                                                <div class="figure">
                                                    <img alt="" src="<?php if (miniatureExiste($donnees['id']) == TRUE)
                                                    {
                                                        echo $adresseMiniatureByUser;
                                                    }
                                                    else
                                                    {
                                                        echo $adresseMiniature;
                                                    }?>" class="img-responsive">
                                                    <div class="figcaption bg-2"></div>
                                                    <div class="figcaption-btn">
                                                        <a href="<?php  echo "voirLesPhotos.php?album=".$donnees['urlname'];?>" class="btn btn-xs btn-one theater"><i class="fa fa-plus-circle"></i> Entrez voir l'album</a>
<!--                                                        <a href="#" class="btn btn-xs btn-one"><i class="fa fa-link"></i> Vidéo de la soirée</a>-->
                                                    </div>
                                                </div>

                                                    <a href="<?php  echo "voirLesPhotos.php?album=".$donnees['urlname'];?>"><h2 class="policeSpecialAlbumPhoto"><?php echo $donnees['name']." :"; ?> </h2></a>
                                                    <p class="policeSpecialAlbumPhoto">
                                                        <?php
                                                            if (descriptionExiste($donnees['id']) ==  TRUE)
                                                            {
                                                                echo "Description : ".$donnees['description'];
                                                            }
                                                        ?>
                                                        <br>
                                                        Date de l'événement : <?php echo $donnees['date_event']; ?>
                                                    </p>

                                            </div>

                                        </div>
                                    <?php
                                    }
                                    ?>





                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
<?php
}
?>



<script type="text/javascript">

    var TimestampDifference = 1404500770000 - new Date().getTime() ;

    var CakePHPURL = "http:\/\/etud.insa-toulouse.fr\/~amicale\/galleries\/view" ;

</script>


<script type="text/javascript" src="js/jquery/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap/bootstrap3.min.js"></script>
<script type="text/javascript" src="js/boomerang/modernizr.custom.js"></script>
<script type="text/javascript" src="js/boomerang/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="js/boomerang/jquery.cookie.js"></script>
<script type="text/javascript" src="js/boomerang/jquery.easing.js"></script>

<script type="text/javascript" src="js/jquery/jquery.flippy.min.js"></script>
<script type="text/javascript" src="js/bootstrap/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/bootstrap/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="js/bootstrap/locales/bootstrap-datepicker.fr.js"></script>
<script type="text/javascript" src="js/bootstrap/spin.min.js"></script>
<script type="text/javascript" src="js/bootstrap/ladda.min.js"></script>
<script type="text/javascript" src="js/bootstrap/bootstrap-jquery-ladda.js"></script>

<!--[if lt IE 9]>

<script type="text/javascript" src="js/boomerang/html5shiv.js"></script>
<script type="text/javascript" src="js/boomerang/respond.min.js"></script>
<![endif]-->


<script type="text/javascript" src="assets/hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="assets/masonry/masonry.js"></script>
<script type="text/javascript" src="assets/page-scroller/jquery.ui.totop.min.js"></script>
<script type="text/javascript" src="assets/mixitup/jquery.mixitup.min.js"></script>
<script type="text/javascript" src="assets/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript" src="assets/easy-pie-chart/jquery.easypiechart.js"></script>
<script type="text/javascript" src="assets/waypoints/waypoints.min.js"></script>
<script type="text/javascript" src="assets/sticky/jquery.sticky.js"></script>
<script type="text/javascript" src="js/boomerang/jquery.wp.custom.js"></script>
<script type="text/javascript" src="assets/layerslider/js/greensock.js"></script>
<script type="text/javascript" src="assets/layerslider/js/layerslider.transitions.js"></script>
<script type="text/javascript" src="assets/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>

<script type="text/javascript" src="js/jquery/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="js/utility.js"></script>
<script type="text/javascript" src="js/amicale.js"></script>

<?php include("../vues/footer.php") ?>
</body>
</html>

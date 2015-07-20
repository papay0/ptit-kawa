<?php
require_once("../include/core.php");
require_once("../include/functions.php");

/**
 * Class and Function List:
 * Function list:
 * Classes list:
 */
$Get_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

?>

<div style="display: none;" xmlns="http://www.w3.org/1999/html"></div><!DOCTYPE html><html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><link href="favicon.ico" type="image/x-icon" rel="icon" /><link href="favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PK INSA TOULOUSE | ALBUM</title>


    <link rel="shortcut icon" type="image/X-ICON" href="favicon.png" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/ladda-themeless.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/amicale.css" media="screen" />

    <link href="css/global-style.css" rel="stylesheet" type="text/css" media="screen">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="zoombox/zoombox.js"></script>

    <link href="zoombox/zoombox.css" rel="stylesheet" type="text/css" media="screen" />

    <script type="text/javascript">
        jQuery(function($){
            $('a.zoombox').zoombox(
                {
                    gallery     : false,
                    theme       : 'prettyphoto'        //available themes : zoombox,lightbox, prettyphoto, darkprettyphoto, simple
                }

            );

            /**
             * Or You can also use specific options
             $('a.zoombox').zoombox({
                theme       : 'zoombox',        //available themes : zoombox,lightbox, prettyphoto, darkprettyphoto, simple
                opacity     : 0.8,              // Black overlay opacity
                duration    : 800,              // Animation duration
                animation   : true,             // Do we have to animate the box ?
                width       : 600,              // Default width
                height      : 400,              // Default height
                gallery     : true,             // Allow gallery thumb view
                autoplay : false                // Autoplay for video
            });
             */
        });
    </script>

   <script type="text/javascript">

        function mettrePlusUn(imageId)
        {


            $.ajax({
                type : 'POST',
                url : "../include/mettrePlusUn.php",
                data: {imageId: imageId },
                timeout : 3000,
    success : function(data) {
             console.log(data.message);
      $("[data-image-id="+imageId+"]").html(data.nbrVotes);
                                           //  document.location.href='maPage';
                },
                error: function() {
                    alert('Vote non MAJ ==> ERROR.'); }

            })

        }

        
    </script>



</head>
<body class="wp-theme-1">
<?php include("../vues/menu.php") ?>
<?php include("../vues/headerAlbumPhoto.php") ?>



    <!--


    -->




    <!-- FIN SI PAS ACCUEIL -->

<?php
if (!isset($_SESSION['prenom']))
{
    include('../vues/mustBeLogged.php');
}
else
{
?>


    <?php
    // Mes variables
    $nItemsByPages = 36;
    $urlname = $_GET['album'];
    $id_album = idAlbum($urlname);
    $nbImages = nombrePhoto($id_album);
    $id_votant = $_SESSION["id"];
    //$id_votant = 7;
    $nbPhotoVote = returnNombrePhotoVote($id_album);

    $topPhoto = returnArray3premierePhotoVote($id_album);
    $topPhotoForVotes = returnArray3premierePhotoVoteAndReturnVites($id_album);
    if (adressIPExist($_SERVER["REMOTE_ADDR"]) == true)
    {
        //majLastVisitWithoutLogin($_SERVER["REMOTE_ADDR"]);
        if ($_SESSION['INSA'] == "OUI")
        {
            majLastVisit($_SESSION["login"]);
        }
        elseif ($_SESSION['INSA'] == "NON")
        {
            majLastVisitUserAmicale($_SESSION["prenom"]." ".$_SESSION["nom"]);
        }
    }
    ?>




    <section class="slice  animate-hover-slide">
        <div class="w-section inverse work">
          
             

<?php if ($nbPhotoVote >= 3)
{

        ?>

                <section class="slice animate-hover-slide ">
                    <div class="w-section inverse">
                        <div class="container">
                          
                          <div class="alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                             <strong>Information :</strong> Vous pouvez voter pour les photos que vous préférez, en cliquant simplement sur le cœur qu'il y a sous la photo ! 
                          </div>

                            <h3 class="section-title">TOP 3</h3>

                            <div class="row">
                                <div class="mixitup mix-paging ">

                                        <div class="col-md-4 ">
                                            <div class="w-box">

                                                <a class="zoombox zgallery2" href=" <?php echo $topPhoto[1];  ?>">
                                                    <img alt="" src="<?php echo $topPhoto["min"][1];  ?>" class="img-responsive">
                                                </a>
                                                <div class="col-xs-1">
                                                    <div class="like-button">
                                                            <span class="button">
                                                                <i>1</i>
                                                            </span>

                                                    </div>
                                                </div>
                                                <div class="col-xs-6" >
                                                    <div  class="like-button">
                                                    <span class="button ">
                                                      <span data-image-id="<?php echo $topPhotoForVotes["id"][1] ?>"><?php echo $topPhotoForVotes["min"][1][1]; ?></span><i class="fa   fa-heart"></i>
                                                      
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-4 ">
                                        <div class="w-box">

                                            <a class="zoombox zgallery2" href="<?php echo $topPhoto[2];  ?>">
                                                <img alt="" src="<?php echo $topPhoto["min"][2];  ?>" class="img-responsive">
                                            </a>
                                            <div class="col-xs-1">
                                                <div class="like-button">
                                                            <span class="button">
                                                                <i>2</i>
                                                            </span>

                                                </div>
                                            </div>
                                            <div class="col-xs-6" >
                                                <div  class="like-button">
                                                    <span class="button ">
                                                       <span data-image-id="<?php echo $topPhotoForVotes["id"][2] ?>"> <?php echo $topPhotoForVotes["min"][2][2]; ?></span><i class="fa   fa-heart"></i>

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="w-box">

                                            <a class="zoombox zgallery2" href="<?php echo $topPhoto[3];  ?>">
                                                <img alt="" src="<?php echo $topPhoto["min"][3];  ?>" class="img-responsive">
                                            </a>
                                            <div class="col-xs-1">
                                                <div class="like-button">
                                                            <span class="button">
                                                                <i>3</i>
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="col-xs-6" >
                                                <div  class="like-button">
                                                    <span class="button ">
                                                       <span data-image-id="<?php echo $topPhotoForVotes["id"][3] ?>"><?php echo $topPhotoForVotes["min"][3][3]; ?></span><i class="fa   fa-heart"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <?php
}
else
{
    ?>

    <center><div class="alert alert-info">
                    Il n'y a pas encore assez de vote pour afficher un TOP 3 !
                </div></center>

    <br>
    <br>
    <?php
}

?>





            <div class="container">

                <?php if ($nbImages > $nItemsByPages) { ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="sort-list-btn" style="text-align: center;">
                                <?php
                                $nPages = (int)(($nbImages - 1) / $nItemsByPages) + 1 ;
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

                            <h3 class="section-title">Photos : <?php  echo returnNomJolieAlbumFromID($id_album);  ?></h3>

                            <div class="row">
                                <div class="mixitup mix-paging ">



                                    <?php

                                    $i = 0;
                                    global $bdd;

                                    $reponse = $bdd->query('SELECT (file),(name), (votes), (urlnamePhoto), (id) FROM `photo` WHERE id_album="'.$id_album.'" ');

                                    while ($donnees = $reponse->fetch())
                                    {



                                        ?>

                                        <div class="col-md-4 mix page-<?php echo (int)($i++ / $nItemsByPages) ; ?>">
                                            <div class="w-box">

                                                <a class="zoombox zgallery1" href="<?php echo $donnees['file']; ?>">
                                                <img alt="" src="../vues/images/album/<?php echo $urlname."/min/".$donnees['name'];?>" class="img-responsive">
                                                </a>






                                                <div class="col-xs-1">
                                                    <div class="like-button">
                                                    <span class="button">
                                                        <a href="../index.php?page=reportPhoto&album=<?php echo $urlname; ?>&photo=<?php echo $donnees['urlnamePhoto']; ?>" target="_blank"> <i class=" fa fa-pencil-square-o"></i> </a>
                                                    </span>

                                                    </div>
                                                </div>









                                                <div class="col-xs-6" >
                                                    <div  class="like-button">
                                                    <span class="button ">
                                                       <span class="ajax-refresh"><span data-image-id="<?php echo $donnees["id"]?>"><?php echo $donnees['votes']; ?></span></span> <a id="detailed" onClick="mettrePlusUn(<?php echo $donnees['id'];?>)" ><i class="fa   fa-heart"></i></a>
                                                    </span>

                                                    </div>
                                                </div>




                                                <div class="col-xs-4" >
                                                    <div class="like-button">
                                                    <span class="button">
                                                        <a href="<?php echo $donnees['file']; ?>" download="<?php echo $donnees['name']; ?>" ><i class=" fa fa-download"></i></a>
                                                    </span>

                                                    </div>
                                                </div>
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
          
          

</div>

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


<?php include("../vues/footerAlbumPhoto.php") ?>
</body>
</html>

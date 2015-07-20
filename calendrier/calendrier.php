<?php
require_once("../include/core.php");
require_once("../include/functions.php");
?>

<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><link href="../favicon.ico" type="image/x-icon" rel="icon" /><link href="favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PK INSA TOULOUSE | CALENDRIER</title>





    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/ladda-themeless.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/amicale.css" media="screen" />

    <link href="css/global-style.css" rel="stylesheet" type="text/css" media="screen">

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier PK</title>
    <meta name="description" content="Flexible Calendar with jQuery and CSS3" />
    <meta name="keywords" content="responsive, calendar, jquery, plugin, full page, flexible, javascript, css3, media queries" />
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/calendar.css" />
    <link rel="stylesheet" type="text/css" href="css/custom_2.css" />
    <script src="js/modernizr.custom.63321.js"></script>


</head>
<body class="wp-theme-1">
<?php include("../vues/headerAlbumPhoto.php") ?>




<br>
<br>


<?php include("calendar.php") ?>



<script type="text/javascript">

    var TimestampDifference = 1404500770000 - new Date().getTime() ;

    var CakePHPURL = "http:\/\/etud.insa-toulouse.fr\/~PK" ;

</script>






<script type="text/javascript" src="assets/hover-dropdown/bootstrap-hover-dropdown.min.js"></script>







<?php include("../vues/footerAlbumPhoto.php") ?>
</body>
</html>

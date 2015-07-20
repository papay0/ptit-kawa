<?php
require_once("include/core.php");
require_once("include/functions.php");
    require_once("include/ImageCache.php"); 
//On inclut le contrôleur s'il existe et s'il est spécifié
if (!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'.php'))
{
    //majLastVisit($_SESSION["login"]);

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
    include 'controleurs/'.$_GET['page'].'.php';
}
else
{
    $dateToday= date("Y-m-d");
    $lastDayInBDD = returnLastDateInBDDVues();
    mettrePlusUnDansVuesTableForNbIndex();
    if (returnDateEqualCURDATE($lastDayInBDD) == false)
    {
        insertNewDateInNewRow();
    }
    mettrePlusUnDansVuesTableForNumerVuesIndexDayByDay();

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
    include 'controleurs/accueil.php';
}

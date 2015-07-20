<?php

//require_once("include/core.php");
require_once(dirname(__FILE__).'/../include/core.php');
//echo "j'ai reussi a inclure le core.php";

//require_once("include/functions.php");
require_once(dirname(__FILE__).'/../include/functions.php');

//
//
//if (isset($_POST['login']) AND (strlen($_POST['login']) != 0) AND isset($_POST['pass']) AND (strlen($_POST['pass']) != 0) AND authenticate($_POST['login'],$_POST['pass']))
//{
//    //echo "passage 1 dans le grand if du  test d'authent";
//    createSession($_POST['login']);
//    global $bdd;
//
//    $NombreUsers = userExiste($_POST['login']);
//    $login = $_POST['login'];
//    $prenom = $_SESSION['prenom'];
//    $prenomNom = $_SESSION['prenomNom'];
//
//    if ($NombreUsers == 0)
//    {
//        // add users in db
//        inserUser($login, $prenom, $prenomNom);
//        //echo "inser done";
//    }
//    //else
//    //{
//      //  echo $_SESSION["prenomNom"] . " existe deja dans la bdd";
//    //}
//    //include(dirname(__FILE__).'/../vues/accueil.php');
//    header('location:.');
//}
//else
//{
//    include(dirname(__FILE__).'/../vues/login.php');
//    //header('location:../vues/login.php');
//}



if (isset($_POST['login']) AND (strlen($_POST['login']) != 0) AND isset($_POST['pass']) AND (strlen($_POST['pass']) != 0) AND authenticate($_POST['login'],$_POST['pass']))
{
  
  
 
  
  
  
    mettrePlusUnDansVuesTable();
    mettrePlusUnDansVuesTableForNumerConnexionsDayByDay();
  
    $login = $_POST['login'];
  $tabNomPrenomINSA = prenomNom($login);
    $_SESSION["login"] = $login;
    $_SESSION['INSA'] = "OUI";
    $_SESSION["prenom"] = $tabNomPrenomINSA["prenom"];
    $_SESSION["nom"] = $tabNomPrenomINSA["nom"];
    if (isAdmin($login) == TRUE)
    {
        $_SESSION['admin'] = "OUI";
    }
    else
    {
        $_SESSION['admin'] = "NON";
    }

    if (isPhotoUploader($login) == TRUE)
    {
        $_SESSION['uploaderPhoto'] = "OUI";
    }
    else
    {
        $_SESSION['uploaderPhoto'] = "NON";
    }
   // if (loginDansBDDAMicale($login) == TRUE)
    //{
      // createSessionAmicale($login);

    // TO DO :
    // Faire une autre fonction en attendant pour simplement rentrer le login de la personne.
        if (userExisteBddPK($login) == FALSE)
        {
            inserUserInBddPK($login, $_SESSION["prenom"], $_SESSION["prenom"]);
        }
        createSessionIDBDDPKForINSA($login);
        majAddrIP($_SERVER["REMOTE_ADDR"], $_SESSION["login"]);
        majLastVisit($_SESSION["login"]);
        header('location:.');
   // }
     //    else
    //{
      //  include(dirname(__FILE__).'/../vues/InsaNonAmicaliste.php');
    //}


}
// il faudra rajouter ici le cas des amicalistes non INSAiens !
elseif (isset($_POST['login']) AND (strlen($_POST['login']) != 0) AND isset($_POST['pass']) AND (strlen($_POST['pass']) != 0) AND isInBddAmicale($_POST['login'], $_POST['pass']))
{
    mettrePlusUnDansVuesTable();
    mettrePlusUnDansVuesTableForNumerConnexionsDayByDay();
    $loginAmicale = $_POST['login'];
    createSessionAmicalePourAmicaliste($_POST['login']);
    if (userExisteBddPKMailAmicale($_POST['login']) == FALSE)
    {
        inserUserInBddPKCompteAmicale($loginAmicale,$_SESSION["prenom"], $_SESSION["prenom"]." ".$_SESSION["nom"] );
    }
    majAddrIPUserAmicale($_SERVER["REMOTE_ADDR"],$_SESSION["prenom"]." ".$_SESSION["nom"]);
    majLastVisitUserAmicale($_SESSION["prenom"]." ".$_SESSION["nom"]);

    createSessionIDBDDPKForAMICALE($loginAmicale);
    header('location:.');
}
else
{
    mettrePlusUnDansVuesTable();
    mettrePlusUnDansVuesTableForNumerConnexionsDayByDay();
    //echo "Identifiant incorrectes";
    include(dirname(__FILE__).'/../vues/login.php');
}
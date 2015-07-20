<?php

if (!isset($_SESSION['prenom']))
{
    // je le commence juste pour pouvoir faire les tests en local, sans le LDAP...
    include(dirname(__FILE__).'/../vues/mustBeLogged.php');
    //include(dirname(__FILE__).'/../vues/albums.php');
}
else
{
    include(dirname(__FILE__).'/../vues/albums.php');
}
?>
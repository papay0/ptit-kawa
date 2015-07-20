<?php
require_once(dirname(__FILE__).'/../include/core.php');
require_once(dirname(__FILE__).'/../include/functions.php');

if ($_SESSION['admin'] == 'OUI')
{
    include(dirname(__FILE__) . '/../vues/ajouterEvenement.php');
}
?>
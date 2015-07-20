<?php
require_once(dirname(__FILE__).'/../include/core.php');
require_once(dirname(__FILE__).'/../include/functions.php');
require_once(dirname(__FILE__).'/../include/imgClass.php');

if ($_SESSION['admin'] == 'OUI')
{
    include_once(dirname(__FILE__) . '/../vues/ajouterTeaser.php');
}
?>
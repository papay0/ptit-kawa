<?php
session_start();

//On se connecte à MySQL

try
{   //ces deux BDD sont pour le site en ligne sur etud

    $bddAmicale = new PDO('mysql:host=localhost;dbname=amicale', 'amicale_admin', '**********', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $bdd = new PDO('mysql:host=localhost;dbname=ptit-kawa', 'ptit-kawa', '**********', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}



?>
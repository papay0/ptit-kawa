<?php
require_once("core.php");
require_once("functions.php");


function mettrePlusUnDansVoteBDDPhoto($imageId)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE photo SET votes=votes+1 WHERE id="'.$imageId.'"');
    $req->execute(array(
	    'id' => $imageId));

}

function mettreMoinsUnDansVoteBDDPhoto($imageId)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE photo SET votes=votes-1 WHERE id="'.$imageId.'"');
    $req->execute(array(
        'id' => $imageId));

}

function returnNbVote($imageId)
{
    global $bdd;
    $reponse = $bdd->query('SELECT (votes) FROM `photo` WHERE id="'.$imageId.'" ');
    $donnees = $reponse->fetch();
    $nbVote = $donnees['votes'];
    return $nbVote;
}

function idExistInBDDVote($idVotant, $imageId)
{
        global $bdd;
        $reponse = $bdd->query('SELECT COUNT(*) AS NombreUsers FROM votes WHERE id_votant="'.$idVotant.'" AND image_id="'.$imageId.'"');

        $donnees = $reponse->fetch();


        $NombreUsers = $donnees[0];

        if ($NombreUsers >= 1)
        {
            return true;
        }
        else
        {
            return false;
        }

}

function addIdVotantInBDDVotes($idVotant, $imageId)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO votes(image_id, id_votant) VALUES(:image_id, :id_votant) ');
    $req->execute(array(
        'image_id' => $imageId,
        'id_votant' => $idVotant));
}

function deleteIdVotantInBDDVotes($idVotant, $imageId)
{
    global $bdd;
    $reponse = $bdd->query('DELETE FROM `votes` WHERE id_votant="'.$idVotant.'" AND image_id="'.$imageId.'" ');
}




   // echo "coucou ";
   // echo $_POST['idDuVotant'];

header('Content-Type: application/json; charset=utf-8');
if (idExistInBDDVote($_SESSION["id"],$_POST['imageId']) != true)
{
    addIdVotantInBDDVotes($_SESSION["id"], $_POST['imageId']);
    mettrePlusUnDansVoteBDDPhoto($_POST['imageId']);
    echo json_encode(array("success"=>true,"message"=>"Vote bien pris en compte","nbrVotes"=>returnNbVote($_POST["imageId"])));
}
else
{
    deleteIdVotantInBDDVotes($_SESSION['id'],$_POST['imageId'] );
    if (returnNbVote($_POST["imageId"] ) > 0 )
    {
       mettreMoinsUnDansVoteBDDPhoto($_POST['imageId']);
	echo json_encode(array("success"=>false,"message"=>"Vous avez déjà voté pour cette photo, le vote est donc décompté","nbrVotes"=>returnNbVote($_POST["imageId"])));
    }
    else
	    echo json_encode(array("success"=>false,"message"=>"Problème de décompte","nbVotes"=>returnNbVote($_POST["imageId"])));

}

?>

<?php
function authenticate($login,$password)
{
    $host_ldap = "srv-ldap1.insa-toulouse.fr";
    $ds = ldap_connect($host_ldap) or die("Impossible de se connecter a LDAP");

    $basedn = "ou=People,dc=insa-toulouse,dc=fr";
    $dn = "uid=$login, ".$basedn;

    $r = @ldap_bind($ds,$dn,$password);
    if($r != FALSE)  {
        return true;
    }
    return false;
}

   function prenomNom($login)
{
    $host_ldap = "srv-ldap1.insa-toulouse.fr";
    $ds=ldap_connect($host_ldap) or die("Impossible de se connecter a LDAP");
        $dn = "dc=insa-toulouse,dc=fr";
        $filter="(uid=".$login.")";
        $restriction = array( "givenname", "sn", "mail","telephonenumber","samaccountname","userpri ncipalname","mobile","mail","ipphone","description ");
        $sr = ldap_search($ds, $dn, $filter, $restriction) ;
        $info = ldap_get_entries($ds, $sr);
        $tab=array();
        //$tab["uid"]=$info[0]["dn"];
        $tab["nom"] = $info[0]["sn"][0];
        $tab["prenom"] = $info[0]["givenname"][0];
        return $tab;
        ldap_close($ds);
}

function userExisteBddPK($login)
{

    global $bdd;
    $reponse = $bdd->query('SELECT COUNT(*) AS NombreUsers FROM Users WHERE login="'.$login.'"');

    $donnees = $reponse->fetch();


    $NombreUsers = $donnees[0];

    if ($NombreUsers == 0)
    {
        return FALSE;
    }
    else
    {
        return TRUE;
    }
}

function userExisteBddPKMailAmicale($mail_amicale)
{

    global $bdd;
    $reponse = $bdd->query('SELECT COUNT(*) AS NombreUsers FROM Users WHERE mailAmicale="'.$mail_amicale.'"');

    $donnees = $reponse->fetch();


    $NombreUsers = $donnees[0];

    if ($NombreUsers == 0)
    {
        return FALSE;
    }
    else
    {
        return TRUE;
    }
}




function createSession($login)
{
//Recuperation dess informations
    $host_ldap = "srv-ldap1.insa-toulouse.fr";
    $ds = ldap_connect($host_ldap) or die("Impossible de se connecter a LDAP");
    $basedn = "ou=People,dc=insa-toulouse,dc=fr";
    $rs = ldap_search($ds,$basedn,"uid=".$login);
    $results = ldap_get_entries($ds,$rs);
    if($results["count"]>=1)
    {
        $info = $results[0];

        $_SESSION["prenom"]=$info["givenname"][0];
        $_SESSION["prenomNom"]=$info["displayname"][0];
        $_SESSION["ID"]=$info["supannetuid"][0];
        $_SESSION['user'] = $login;
    }
}

function inserUserInBddPK($login, $prenom, $prenomNom)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO Users(login, prenom, prenomNom) VALUES(:login, :prenom, :prenomNom)');
    $req->execute(array(
        'login' => $login,
        'prenom' => $prenom,
        'prenomNom' => $prenomNom));
}

function inserUserInBddPKCompteAmicale($mailAmicale, $prenom, $prenomNom)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO Users(mailAmicale, prenom, prenomNom) VALUES(:mailAmicale, :prenom, :prenomNom)');
    $req->execute(array(
        'mailAmicale' => $mailAmicale,
        'prenom' => $prenom,
        'prenomNom' => $prenomNom));
}


function userExisteBDDAmicale($prenom, $nom)
{

    global $bdd;
    // $reponse = $bdd->query('SELECT COUNT(*) AS NombreUsers FROM Users WHERE login="'.$login.'"');
    $reponse = $bdd->query('SELECT COUNT(*) FROM  `newdeal_amicalistes` WHERE lastname="'.$nom.'" AND firstname="'.$prenom.'"');


    $donnees = $reponse->fetch();


    $NombreUsers = $donnees[0];

    return $NombreUsers;
}

function isAdmin($login)
{
    global $bdd;
    $reponse = $bdd->query('SELECT (admin) FROM  `Users` WHERE login="'.$login.'"');
    $donnees = $reponse->fetch();
    if ($donnees['admin'] == 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function isPhotoUploader($login)
{
    global $bdd;
    $reponse = $bdd->query('SELECT (photo) FROM  `Users` WHERE login="'.$login.'"');
    $donnees = $reponse->fetch();
    if ($donnees['photo'] == 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}




function createSessionAmicale($login)
{
    global $bddAmicale;
    $reponse = $bddAmicale->query('SELECT (login),(lastname), (firstname),(id) FROM `newdeal_amicalistes` WHERE login="'.$login.'"');
    $donnees = $reponse->fetch();
    $_SESSION["prenom"] = $donnees["firstname"];
    $_SESSION["nom"] = $donnees["lastname"];
    $_SESSION["login"] = $donnees["login"];
    //$_SESSION["id"] = $donnees["id"];
    $_SESSION['INSA'] = "OUI";

    if (isAdmin($donnees['login']) == TRUE)
    {
        $_SESSION['admin'] = "OUI";
    }
    else
    {
        $_SESSION['admin'] = "NON";
    }

    if (isPhotoUploader($donnees['login']) == TRUE)
    {
        $_SESSION['uploaderPhoto'] = "OUI";
    }
    else
    {
        $_SESSION['uploaderPhoto'] = "NON";
    }


}

function createSessionAmicalePourAmicaliste($mail)
{
    global $bddAmicale;
    $reponse = $bddAmicale->query('SELECT (login),(lastname), (firstname),(id) FROM `newdeal_amicalistes` WHERE mail="'.$mail.'"');
    $donnees = $reponse->fetch();
    $_SESSION["prenom"] = $donnees["firstname"];
    $_SESSION["nom"] = $donnees["lastname"];
    $_SESSION["login"] = $donnees["login"];
    //$_SESSION["id"] = $donnees["id"];
    $_SESSION['INSA'] = "NON";


}

function createSessionIDBDDPKForINSA($login)
{
    global $bdd;
    $reponse = $bdd->query('SELECT (ID) FROM  `Users` WHERE login="'.$login.'"');
    $donnees = $reponse->fetch();
    $_SESSION["id"] = $donnees['ID'];

}

function createSessionIDBDDPKForAMICALE($mailAmicale)
{
    global $bdd;
    $reponse = $bdd->query('SELECT (ID) FROM  `Users` WHERE mailAmicale="'.$mailAmicale.'"');
    $donnees = $reponse->fetch();
    $_SESSION["id"] = $donnees['ID'];

}




function isInBddAmicale($mail, $pass)
{
    global $bddAmicale;
    $reponse = $bddAmicale->query('SELECT COUNT(*) FROM  `newdeal_amicalistes` WHERE mail="'.$mail.'" AND password="'.md5("ami".$pass).'"');
    $donnees = $reponse->fetch();
    $NombreUsers = $donnees[0];
    if ($NombreUsers >= 1)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}





function loginDansBDDAMicale($login)
{
    global $bddAmicale;
    $reponse = $bddAmicale->query('SELECT COUNT(login) AS login FROM `newdeal_amicalistes` WHERE login="'.$login.'"');
    $donnees = $reponse->fetch();
    $NombreUsers = $donnees[0];
    if ($NombreUsers >= 1)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

function enleve_accents($chaine) {
    $reg = '/&(.)(acute|grave|circ|uml|cedil|ring|tilde|slash);/';
    return preg_replace($reg, '\1', htmlentities($chaine, ENT_COMPAT, 'UTF-8'));
}
function enleve_ligatures($chaine) {
    $chaine = str_replace('&szlig;', 'ss', $chaine);
    $reg = '|&([a-zA-Z]{2})lig;|';
    return preg_replace($reg, '\1', $chaine);
}
function suppr_speciaux($chaine) {
    $reg = '|(&[a-zA-Z0-9]*;)|U';
    return preg_replace($reg, '-', $chaine);
}
function is_utf8($string) {
    return !strlen(
        preg_replace(
            ',[\x09\x0A\x0D\x20-\x7E]'            # ASCII
            . '|[\xC2-\xDF][\x80-\xBF]'             # non-overlong 2-byte
            . '|\xE0[\xA0-\xBF][\x80-\xBF]'         # excluding overlongs
            . '|[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}'  # straight 3-byte
            . '|\xED[\x80-\x9F][\x80-\xBF]'         # excluding surrogates
            . '|\xF0[\x90-\xBF][\x80-\xBF]{2}'      # planes 1-3
            . '|[\xF1-\xF3][\x80-\xBF]{3}'          # planes 4-15
            . '|\xF4[\x80-\x8F][\x80-\xBF]{2}'      # plane 16
            . ',sS',
            '', $string));
}

function transformTo_URL($texte) {



    if(!is_utf8($texte))
        $texte = utf8_encode($texte);
    $texte = strtolower(suppr_speciaux(enleve_ligatures(enleve_accents($texte))));
    $reg = '|([^a-z0-9]+)|';
    $texte = preg_replace($reg, '-', $texte);
    return trim($texte, '-');
}

function albumExiste($titre)
{
    global $bdd;
    $reponse = $bdd->query('SELECT COUNT(name) AS titre FROM `album` WHERE name="'.$titre.'"');
    $donnees = $reponse->fetch();
    $NombreUsers = $donnees[0];
    if ($NombreUsers >= 1)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

function creatAlbumInBDD($titre, $date_event, $urlname)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO album(name, date_event, urlname) VALUES(:name, :date_event, :urlname) ');
    $req->execute(array(
        'name' => $titre,
        'date_event' => $date_event,
        'urlname' => $urlname));
}

function creatDir($name)
{
    mkdir(dirname(__FILE__)."/../vues/images/album/".$name, 0755);
    mkdir(dirname(__FILE__)."/../vues/images/album/".$name."/min/", 0755);
}

function idAlbum($urlname)
{
    global $bdd;
    $reponse = $bdd->query('SELECT (id) FROM `album` WHERE urlname="'.$urlname.'"');
    $donnees = $reponse->fetch();
    $id = $donnees["id"];

    return $id;
}

function deleteAlbum($urlname)
{
    global $bdd;
    $reponse = $bdd->query('DELETE FROM `album` WHERE urlname="'.$urlname.'" ');

}

function supprimePhotoAlbumInBDD($idAlbum)
{
    global $bdd;
    $reponse = $bdd->query('DELETE FROM `photo` WHERE id_album="'.$idAlbum.'" ');
}

function recursiveRmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir."/".$object) == "dir") recursiveRmdir($dir."/".$object); else unlink($dir."/".$object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}

function dateEvent($urlname)
{
    global $bdd;
    $reponse = $bdd->query('SELECT (date_event) FROM `album` WHERE urlname="'.$urlname.'"');
    $donnees = $reponse->fetch();
    $date = $donnees["date_event"];

    return $date;
}

function photoExisteDansAlbumID($name, $id_album)
{
    global $bdd;
    $reponse = $bdd->query('SELECT COUNT(name) AS name FROM `photo` WHERE name="'.$name.'" AND id_album="'.$id_album.'"');
    $donnees = $reponse->fetch();
    $NombreUsers = $donnees[0];
    if ($NombreUsers >= 1)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}




function deletePhoto($name, $idAlbum)
{
    global $bdd;
    $reponse = $bdd->query('DELETE FROM `photo` WHERE name="'.$name.'" AND id_album ="'.$idAlbum.'" ');

}

function photoExistInTableVote($file_image)
{
    global $bdd;
    $reponse = $bdd->query('SELECT COUNT(*) FROM `votes` WHERE file_image="'.$file_image.'" ');
    $donnees = $reponse->fetch();
    $NombrePhoto = $donnees[0];
    if ($NombrePhoto >= 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function deletePhotoInTableVote($file_image)
{
    global $bdd;
    $reponse = $bdd->query('DELETE FROM `votes` WHERE file_image="'.$file_image.'" ');

}

function resetMiniaturePhoto($idAlbum)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE photo SET miniature_album = 0 WHERE id_album="'.$idAlbum.'"');
    $req->execute(array(
        'id_album' => $idAlbum));
}

function addMiniatureInBDDPhoto($name)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE photo SET miniature_album = 1 WHERE name="'.$name.'"');
    $req->execute(array(
        'name' => $name));
}

function nombreAlbum()
{
    global $bdd;
    $reponse = $bdd->query('SELECT COUNT(*) FROM `album`');
    $donnees = $reponse->fetch();
    $NombreAlbum = $donnees[0];
    return $NombreAlbum;
}

function returnNomAlbumFromID($id_album)
{
    global $bdd;
    $reponse = $bdd->query('SELECT (urlname) FROM `album` WHERE id="'.$id_album.'"');
    $donnees = $reponse->fetch();

    return $donnees['urlname'];
}

function returnNomJolieAlbumFromID($id_album)
{
    global $bdd;
    $reponse = $bdd->query('SELECT (name) FROM `album` WHERE id="'.$id_album.'"');
    $donnees = $reponse->fetch();

    return $donnees['name'];
}

function retourneAdresseFileInBDDPhotoPremiereUploade($id_album)
{
    global $bdd;
    $urlname = returnNomAlbumFromID($id_album);
    $reponse = $bdd->query('SELECT (name) FROM `photo` WHERE id_album="'.$id_album.'" ORDER BY date_upload LIMIT 0,1');
    $donnees = $reponse->fetch();
    //$file = dirname(__FILE__)."/../vues/images/album/".$urlname."/min/".$donnees['name']."";
    $file = "../vues/images/album/".$urlname."/min/".$donnees['name']."";

    return $file;
}

function retourneAdresseMiniatureAjouteParUser($id_album)
{
    global $bdd;
    $urlname = returnNomAlbumFromID($id_album);
    $reponse = $bdd->query('SELECT (name) FROM `photo` WHERE id_album="'.$id_album.'" AND miniature_album=1');
    $donnees = $reponse->fetch();
    // $file = dirname(__FILE__)."/../vues/images/album/".$urlname."/min/".$donnees['name']."";
    $file = "../vues/images/album/".$urlname."/min/".$donnees['name']."";
    return $file;
}

function miniatureExiste($id_album)
{
    global $bdd;
    $reponse = $bdd->query('SELECT COUNT(*) FROM `photo` WHERE id_album="'.$id_album.'" AND miniature_album=1');
    $donnees = $reponse->fetch();
    $NombreMiniature = $donnees[0];
    if ($NombreMiniature >= 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function nombrePhoto($id_album)
{
    global $bdd;
    $reponse = $bdd->query('SELECT COUNT(*) FROM `photo` WHERE id_album="'.$id_album.'"');
    $donnees = $reponse->fetch();
    $NombrePhoto = $donnees[0];
    return $NombrePhoto;
}

function returnNombrePhotoVote($id_album)
{
    global $bdd;
    $compteur = 1;
    $reponse = $bdd->query('SELECT COUNT(*) FROM `photo` WHERE id_album="'.$id_album.'" AND votes > 0');
    $donnees = $reponse->fetch();
    $NombrePhotoVote = $donnees[0];
    return $NombrePhotoVote;
}

function returnArray3premierePhotoVote($id_album)
{
    global $bdd;
    $topPhoto = array();
    $compteur = 1;
    $reponse = $bdd->query('SELECT (file), (name), (votes) FROM `photo` WHERE id_album="'.$id_album.'" ORDER BY votes DESC, date_upload ASC ');
    while ($donnees = $reponse->fetch() AND $compteur <= 3)
    {
        $nomAlbum = returnNomAlbumFromID($id_album);
        $topPhoto[$compteur] = $donnees['file'];
        $topPhoto["min"][$compteur] = "../vues/images/album/".$nomAlbum."/"."min/".$donnees['name'];
            //"../vues/images/album/".$nomAlbum."/"."/min".$donnees['name'];
        //echo "top min = ".$topPhoto[$compteur]["min"];

        $compteur++;
    }
    return $topPhoto;
}

function returnArray3premierePhotoVoteAndReturnVites($id_album)
{
    global $bdd;
    $topPhoto = array();
    $compteur = 1;
    $reponse = $bdd->query('SELECT (id),(file), (name), (votes) FROM `photo` WHERE id_album="'.$id_album.'" ORDER BY votes DESC, date_upload ASC ');
    while ($donnees = $reponse->fetch() AND $compteur <= 3)
    {
        $nomAlbum = returnNomAlbumFromID($id_album);
        $topPhoto[$compteur] = $donnees['file'];

        //"../vues/images/album/".$nomAlbum."/"."/min".$donnees['name'];
        //echo "top min = ".$topPhoto[$compteur]["min"];
        $topPhoto["min"][$compteur][$compteur] = $donnees['votes'];
              $topPhoto["id"][$compteur] = $donnees['id'];
        $compteur++;
    }
    return $topPhoto;
}

function creatEventInBDD($titre, $urlTitre, $dateEvent)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO event(titre, urlTitre, dateEvent) VALUES(:titre, :urlTitre, :dateEvent) ');
    $req->execute(array(
        'titre' => $titre,
        'urlTitre' => $urlTitre,
        'dateEvent' => $dateEvent));
}

function eventExiste($titre, $dateEvent)
{
    global $bdd;
    $reponse = $bdd->query('SELECT COUNT(*) AS titre FROM `event` WHERE titre="'.$titre.'" AND dateEvent="'.$dateEvent.'"');
    $donnees = $reponse->fetch();
    $NombreEvent = $donnees[0];
    if ($NombreEvent >= 1)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

function modifierEvent($pastDate, $newTitre, $newUrlTitre, $newDate)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE event SET dateEvent = "'.$newDate.'",titre="'.$newTitre.'", urlTitre="'.$newUrlTitre.'" WHERE dateEvent="'.$pastDate.'"');
    $req->execute(array(
        'dateEvent' => $newDate,
        'titre' => $newTitre,
        'urlTitre' => $newUrlTitre
    ));
}

function deleteEvent($dateEvent)
{
    global $bdd;
    $reponse = $bdd->query('DELETE FROM `event` WHERE dateEvent="'.$dateEvent.'" ');

}

function renamePhotoDansServeurToLowerExtension($nameImage, $fileImage)
{
    $ext =  strtolower(substr($nameImage, -3));
    $rest = substr($nameImage, 0, -3);
    $nomImage = $rest.$ext;

    rename($fileImage.$nameImage, $fileImage.$nomImage);
}

function descriptionExiste($id_album)
{
    global $bdd;
    $reponse = $bdd->query('SELECT (description) AS description FROM `album` WHERE id="'.$id_album.'" ');
    $donnees = $reponse->fetch();
    if (strlen($donnees['description']) > 0 AND $donnees['description'] != NULL)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }

}

function addDescriptionINBDD($description, $idAlbum)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE album SET description = "'.$description.'" WHERE id="'.$idAlbum.'"');
    $req->execute(array(
        'description' => $description));
}

function editSentenceSlider($sentence)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE phrases SET phrase_slider = "'.$sentence.'"');
    $req->execute(array(
        'phrase_slider' => $sentence));
}

function mettrePlusUnDansVuesTable()
{
    global $bdd;
    $bdd->exec('UPDATE vues SET nbConnexions=nbConnexions+1 WHERE id=1');
}

function returnNomJolieAlbumFromUrlname($urlnameAlbum)
{
    global $bdd;
    $reponse = $bdd->query('SELECT (name) FROM `album` WHERE urlname="'.$urlnameAlbum.'"');
    $donnees = $reponse->fetch();

    return $donnees['name'];
}

function returnNomJoliePhotoFromUrlnamePhoto($urlnamePhoto)
{
    global $bdd;
    $reponse = $bdd->query('SELECT (name) FROM `photo` WHERE urlnamePhoto="'.$urlnamePhoto.'"');
    $donnees = $reponse->fetch();

    return $donnees['name'];
}

function editSentenceBeer($sentence)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE phrases SET phrase_biereDuMois = "'.$sentence.'"');
    $req->execute(array(
        'phrase_biereDuMois' => $sentence));
}

function mettrePlusUnDansVuesTableForNumberVisiteOfAlbumPhoto()
{
    global $bdd;
    $bdd->exec('UPDATE vues SET vuesPageAlbumPhoto=vuesPageAlbumPhoto+1 WHERE id=1');
}

function mettrePlusUnDansVuesTableForNbIndex()
{
    global $bdd;
    $bdd->exec('UPDATE vues SET nbVuesIndex=nbVuesIndex+1 WHERE id=1');
}

function insertNewDateInNewRow()
{
    global $bdd;
    $today = date("Y-m-d");
    $req = $bdd->prepare('INSERT INTO vues(dateDay) VALUES(:dateDay)');
    $req->execute(array(
        'dateDay' => $today));
}

function returnDateEqualCURDATE($date)
{
    if ($date == date("Y-m-d"))
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

function returnMaxIdTableVues()
{
    global $bdd;
    $reponse = $bdd->query('SELECT id FROM `vues` ORDER BY id DESC LIMIT 1 ');
    $donnees = $reponse->fetch();
    return $donnees['id'];
}

function returnLastDateInBDDVues()
{
    global $bdd;
    $reponse = $bdd->query('SELECT (dateDay) FROM `vues` ORDER BY dateDay DESC, id DESC ');
    $donnees = $reponse->fetch();
    return $donnees['dateDay'];
}

function mettrePlusUnDansVuesTableForNumberVisiteOfAlbumPhotoDayByDay()
{
    global $bdd;
    $idMax = returnMaxIdTableVues();
    $bdd->exec('UPDATE vues SET vuesPageAlbumPhoto=vuesPageAlbumPhoto+1 WHERE id= "'.$idMax.'"');
}

function mettrePlusUnDansVuesTableForNumerConnexionsDayByDay()
{
    global $bdd;
    $idMax = returnMaxIdTableVues();
    $bdd->exec('UPDATE vues SET nbConnexions = nbConnexions+1 WHERE id= "'.$idMax.'"');
}

function mettrePlusUnDansVuesTableForNumerVuesIndexDayByDay()
{
    global $bdd;
    $idMax = returnMaxIdTableVues();
    $bdd->exec('UPDATE vues SET nbVuesIndex = nbVuesIndex+1 WHERE id= "'.$idMax.'"');
}

function addPhotosInBDD($name, $file, $id_album, $date_event, $urlnamePhotoForBDD)
{
    global $bdd;
     //$urlnamePhotoForBDD = transformTo_URL($name);
    //$urlnamePhotoForBDD = "ceci est un test";
    $nameTransform = $name;
    $fileTransform = $file;
    $fileTransform = '../'.$fileTransform;
    $ext =  strtolower(substr($name, -3));
    if ($ext == "png")
    {
        $nameTransform = (substr($name, 0, -3)."jpg");
        $fileTransform = (substr($fileTransform, 0, -3)."jpg");
    }
    $req = $bdd->prepare('INSERT INTO photo(name, file, id_album, date_event, urlnamePhoto) VALUES(:name, :file, :id_album, :date_event, :urlnamePhoto) ');
    $req->execute(array(
        'name' => $nameTransform,
        'file' => $fileTransform,
        'id_album' => $id_album,
        'date_event' => $date_event,
        'urlnamePhoto' => $urlnamePhotoForBDD));
}

function nombreVideo()
{
    global $bdd;
    $reponse = $bdd->query('SELECT COUNT(*) FROM `video` ');
    $donnees = $reponse->fetch();
    $NombreVideo = $donnees[0];
    return $NombreVideo;
}

function makeURLVideoiFrameYouTubeBig($urlVideoYouTube)
{
    $iFrameURLBig = "<iframe width=\"853\" height=\"480\" src=\"//".$urlVideoYouTube."\" frameborder=\"0\" allowfullscreen></iframe>";
    return $iFrameURLBig;
}

function makeURLVideoiFrameYouTubeSmall($urlVideoYouTube)
{
    $iFrameURLSmall = "<iframe width=\"358\" height=\"268\" src=\"//".$urlVideoYouTube."\" frameborder=\"0\" allowfullscreen></iframe>";
    return $iFrameURLSmall;
}


function returnLastVideo()
{
    global $bdd;
    $reponse = $bdd->query('SELECT (urlVideo) FROM `video` ORDER BY id DESC ');
    $donnees = $reponse->fetch();
    return addslashes($donnees['urlVideo']);
}

function nameVideoTeaser()
{
    global $bdd;
    $reponse = $bdd->query('SELECT (name) FROM `video` ORDER BY id DESC ');
    $donnees = $reponse->fetch();
    return $donnees['name'];
}

function addVideoTeaserInBDD($name, $urlVideo, $date_event)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO video (name, urlVideo, date_event) VALUES(:name, :urlVideo, :date_event)');
    $req->execute(array(
        'name' => $name,
        'urlVideo' => $urlVideo,
        'date_event' => $date_event));
}

function deleteVideoTeaser($urlVideo)
{
    global $bdd;
    $reponse = $bdd->query('DELETE FROM `video` WHERE urlVideo="'.$urlVideo.'" ');

}

function returnSumArrayPhoto($array)
{
    $sum = 0;
    foreach ($array[size] as $value) {
        $sum += $value;
    }
    return $sum;
}

function returnTop10Connexion()
{
    global $bdd;
    $topConnexion = array();
    $compteur = 0;
    //$reponse = $bdd->query('SELECT (file), (name), (votes) FROM `photo` WHERE id_album="'.$id_album.'" ORDER BY votes DESC, date_upload ASC ');
    $reponse = $bdd->query('SELECT (id), (nbConnexions), (vuesPageAlbumPhoto), (dateDay), (nbVuesIndex) FROM `vues` WHERE id != 1 ORDER BY nbVuesIndex DESC');
    while ($donnees = $reponse->fetch() AND $compteur <= 10)
    {

        //$topPhoto[$compteur] = $donnees['file'];
        //$topPhoto["min"][$compteur] = "../vues/images/album/".$nomAlbum."/"."min/".$donnees['name'];
        $topConnexion["id"][$compteur] = $donnees['id'];
        $topConnexion["nbConnexions"][$compteur] = $donnees['nbConnexions'];
        $topConnexion["vuesPageAlbumPhoto"][$compteur] = $donnees['nbConnexions'];
        $topConnexion["nbVuesIndex"][$compteur] = $donnees['nbVuesIndex'];
        $topConnexion["dateDay"][$compteur] = $donnees['dateDay'];
        //"../vues/images/album/".$nomAlbum."/"."/min".$donnees['name'];
        //echo "top min = ".$topPhoto[$compteur]["min"];

        $compteur++;
    }
    return $topConnexion;
}

function majLastVisit($login)
{
    global $bdd;
    $date =  date("Y-m-d H:i:s");

    $req = $bdd->prepare('UPDATE Users SET date_derniere_visite="'.$date.'" WHERE login="'.$login.'"');
    $req->execute(array(
        'date_derniere_visite' => $date,
        'login' => $login));
}

function majAddrIP($addrIP, $login)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE Users SET addr_ip="'.ip2long($addrIP).'" WHERE login="'.$login.'"');
    $req->execute(array(
        'addr_ip' => ip2long($addrIP),
        'login' => $login));

}




function majLastVisitWithoutLogin($addrIP)
{
    global $bdd;
    $date =  date("Y-m-d H:i:s");
    $req = $bdd->prepare('UPDATE Users SET date_derniere_visite="'.$date.'" WHERE addr_ip="'.ip2long($addrIP).'"');
    $req->execute(array(
        'date_derniere_visite' => $date,
        'addr_ip' => ip2long($addrIP)));
}

function adressIPExist($adressIP)
{
    global $bdd;
    $reponse = $bdd->query('SELECT COUNT(*) FROM Users WHERE addr_ip="'.ip2long($adressIP).'"');
    $donnees = $reponse->fetch();
    $addr = $donnees[0];
    if ($addr == 0)
    {
        return FALSE;
    }
    else
    {
        return TRUE;
    }
}

function returnNumberUserOnWebSitePK()
{
    global $bdd;
    $date =  date("Y-m-d H:i:s");
    $compteur = 0;
    $reponse = $bdd->query('SELECT (date_derniere_visite) FROM `Users`');
    while ($donnees = $reponse->fetch())
    {
        if (date("Y-m-d H:i:s", strtotime($date) ) <= date("Y-m-d H:i:s", strtotime($donnees['date_derniere_visite']."+ 5 minutes" )))
        {
            $compteur++;
        }
    }
    return $compteur;
}

function returnUserConnected()
{
    global $bdd;
    $date =  date("Y-m-d H:i:s");
    $compteur = 0;
    $reponse = $bdd->query('SELECT (date_derniere_visite),(prenomNom),(id)  FROM `Users` ORDER BY date_derniere_visite DESC');
    $UserConnected = array();
    while ($donnees = $reponse->fetch())
    {
        if (date("Y-m-d H:i:s", strtotime($date) ) <= date("Y-m-d H:i:s", strtotime($donnees['date_derniere_visite']."+ 5 minutes" )))
        {
            $UserConnected["id"][$compteur] = $donnees['id'];
            $UserConnected["date_derniere_visite"][$compteur] = $donnees['date_derniere_visite'];
            $UserConnected["prenomNom"][$compteur] = $donnees['prenomNom'];

            $compteur++;
        }
    }
    return $UserConnected;

}

function majAddrIPUserAmicale($addrIP, $prenomNom)
{
    global $bdd;
    $req = $bdd->prepare('UPDATE Users SET addr_ip="'.ip2long($addrIP).'" WHERE prenomNom="'.$prenomNom.'"');
    $req->execute(array(
        'addr_ip' => ip2long($addrIP),
        'prenomNom' => $prenomNom));

}

function majLastVisitUserAmicale($prenomNom)
{
    global $bdd;
    $date =  date("Y-m-d H:i:s");

    $req = $bdd->prepare('UPDATE Users SET date_derniere_visite="'.$date.'" WHERE prenomNom="'.$prenomNom.'" AND LENGTH(mailAmicale) != 0');
    $req->execute(array(
        'date_derniere_visite' => $date,
        'prenomNom' => $prenomNom));
}

?>
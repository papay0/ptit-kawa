<?php
  



  
if (isset($_POST["envoyer"]) AND isset ($_POST['nomAlbum']))
{
    $sumSizePhotos = returnSumArrayPhoto($_FILES['userfile']);
  echo "taille photo = ".$sumSizePhotos;
    if ($sumSizePhotos <= 128000000)
    {
        if (!empty($_FILES))
        {
            // var
            $file = $_POST["nomAlbum"];
            $id_album = idAlbum($file);
            //

            $uploadDir = "vues/images/album/".$file."/";
            $uploadDirMiniature = "vues/images/album/".$file."/min/";
            $image=$_FILES['userfile'];
            $allow_ext = array("jpg", "png", "gif");
           // echo "<pre>";
            //print_r($image);
            //echo "</pre>";
            //echo "sum = ". returnSumArrayPhoto($image);
            for ($i = 0; $i < count($image['name']); $i++)
            {
                $ext =  strtolower(substr($image['name'][$i], -3));
                $rest = substr($image['name'][$i], 0, -3);
                $nomImage = $rest.$ext;


                if(in_array($ext, $allow_ext))
                {
                    $filePhoto = $uploadDir.$image['name'][$i];
                    $filePhotoLowerEnd = $uploadDir.$nomImage;
                    $date_event = dateEvent($file);
                    $namePhoto = $image['name'][$i];

                    // on ajoute les infos dans la BDD
                    $nameTransform = $nomImage;
                    if ($ext == "png")
                    {
                        $nameTransform = (substr($nomImage, 0, -3)."jpg");
                      //  echo "\n coucou c\'est moi je suis dans le if == png\n";
                       // $fileTransform = (substr($fileTransform, 0, -3)."jpg");
                    }

                    //if (photoExisteDansAlbumID($nomImage, $id_album) != TRUE)
                    if (photoExisteDansAlbumID($nameTransform, $id_album) != TRUE)
                    {
                      
                      //  Img::compress_image($uploadDir.$image['tmp_name'][$i],$uploadDir.$image['tmp_name'][$i], 10);
                      
                       $result = move_uploaded_file($image['tmp_name'][$i], $uploadDir.$namePhoto);
                      
                      
                      // $imagecache = new ImageCache();
                      //$imagecache->cached_image_directory = $uploadDir;
                      //echo "le directory est = ".$namePhoto."\n";
                      //$poubelle = $imagecache->cache( $uploadDir.$namePhoto );
                      
                      
                      
                      $resultat_compress = Img::compress_image($uploadDir.$image['name'][$i], $uploadDir.$image['name'][$i], 40);
                      //echo "\n resultat var compress = \n ".$resultat_compress."\n";
                        Img::creerMin($uploadDir.$image['name'][$i], $uploadDirMiniature,$image['name'][$i], 358, 268);
                        Img::convertirJPG($uploadDir.$image['name'][$i]);
                      // Img::compress_image($uploadDir.$image['name'][$i],$uploadDir.$image['name'][$i], 90);
                        //$nomImage = addslashes($nomImage);
                        $urlnamePhoto = transformTo_URL($nomImage);
                        addPhotosInBDD($nomImage, $filePhotoLowerEnd, $id_album, $date_event, $urlnamePhoto);
                        ?>
                        <section class="slice bg-3">
                            <div class="w-section inverse">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <ul class="list-check">
                                                <li><i class="fa fa-check"></i> <?php echo "Photo ".$image['name'][$i]." uploadé.<br/>";  ?> </li>
                                            </ul>

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
                        <section class="slice bg-3">
                            <div class="w-section inverse">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p>Information :</p>
                                            <ul class="list-check">
                                                <li><i class="fa fa-times"></i> <?php echo $image['name'][$i]." existe déjà.<br/>";  ?> </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php
                    }

                }
                else
                {
                    ?>
                    <section class="slice bg-3">
                        <div class="w-section inverse">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <p>Information :</p>
                                        <ul class="list-check">
                                            <li><i class="fa fa-times"></i> Votre fichier n'est pas une image !</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php
                }
            }
        }
    }
    else
    {
        ?>
        <section class="slice bg-3">
                        <div class="w-section inverse">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <p>Information :</p>
                                        <ul class="list-check">
                                            <li><i class="fa fa-times"></i> La taille des photos dépasse 128 Mo. Si ce n'est pas le cas, envoyez un message à Arthur Papailhau pour qu'il règle ça :)</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
        <?php
    }
}
else{
?>

    <section class="slice bg-3">
        <div class="w-section inverse">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <div class="w-section inverse">
                            <div class="w-box sign-in-wr bg-5">
                                <div class="col-md-9">
                                    <!-- Alerts -->
                                    <div class="wp-example" id="alerts">
                                        <h3 class="section-title">Attention </h3>
                                        <div class="alert alert-danger">
                                            <strong>A lire :</strong> Vous ne devez séléctionner que X (à définir par moi) photos par envoi, il faudra donc en faire plusieurs!!
                                        </div>
                                        <div class="alert alert-danger">
                                            Si vous envoyez les photos, et qu'il n'y a pas marqué :  <strong>Photo xyz uploadé.</strong> et que ça réaffiche exactement la même page (le formulaire), ça veut dire qu'il y a eu trop de photos envoyées d'un coup. Il faut donc renvoyer avec moins de photos.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

<section class="slice bg-3">
        <div class="w-section inverse">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <div class="w-section inverse">
                            <div class="w-box sign-in-wr bg-5">

                                <div class="form-header">
                                    <h2>Formulaire d'ajout de photos :</h2>
                                </div>
                                <div class="form-body">
                                    <p>
                                        Ce formulaire va : ajouter les photos dans le dossier de l'album, et créer des miniatures. Il va également enregistrer le chemin d'accès à la photo dans la base de donnée.

                                    </p>
                                        <form role="form" class="form-light padding-15" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Titre de l'album :</label>
                                            <?php
                                            global $bdd;
                                            $reponse = $bdd->query('SELECT (name),(urlname) FROM `album` ORDER BY date_event DESC LIMIT 0, 20');
                                            ?>
                                            <select class="selectpicker" data-style="btn-info" name="nomAlbum" >
                                                <?php
                                                while ($donnees = $reponse->fetch())
                                                {
                                                    echo "<option value=".$donnees['urlname'].">".$donnees['name']."</option>";
                                                }
                                                echo "</select>";
                                                ?>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Selectionner les photos à ajouter :</label>
                                                <input id="userfile" name="userfile[]" type="file"  multiple="true" > <br>
                                                <button type="submit" name="envoyer" class="btn btn-two pull-right">Envoyer !</button>
                                            </div>
                                        </div>
                                    </form>
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
?>
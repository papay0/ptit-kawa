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
                                    <h3 class="section-title">Nombre de connexions : </h3>
                                    <div class="alert alert-danger">
                                        <h3 class="section-title">Depuis la mise en ligne du site : </h3>
                                        <br>

                                        <?php
                                        global $bdd;
                                        $reponse = $bdd->query('SELECT (nbConnexions), (vuesPageAlbumPhoto), (nbVuesIndex) FROM `vues` WHERE id=1 ');

                                        while ($donnees = $reponse->fetch())
                                        {
                                        ?>
                                        Il y a eu <?php  echo $donnees['nbConnexions']  ?> connexions.<br>
                                        Il y a eu <?php  echo $donnees['vuesPageAlbumPhoto']  ?> personnes dans "album photo".<br>
                                        Il y a eu <?php  echo $donnees['nbVuesIndex']  ?> personnes dans la page d'accueil.<br>


                                        <?php
                                        }
                                        ?>
                                    </div>
				       <h4>Jour par jour : </h4><br>
                <style>
                            .monDiv{
                    height: 700px;
                    text-align: justify;
                    border: 1px solid black;
                    overflow: auto;
                            }

                    </style>

                                <div class="monDiv">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Connexions</th>
                                                <th>Accueil</th>
                                                <th>Vues Album Photo</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                        <?php
                                        global $bdd;
                                        $reponse = $bdd->query('SELECT (id), (nbConnexions), (vuesPageAlbumPhoto), (dateDay), (nbVuesIndex) FROM `vues` ORDER BY id DESC');

                                        while ($donnees = $reponse->fetch())
                                        {
                                        ?>
                                            <tbody>
                                            <tr>
                                                <td><?php echo $donnees['id']; ?></td>
                                                <td><?php echo $donnees['nbConnexions']; ?></td>
                                                <td><?php echo $donnees['nbVuesIndex']; ?></td>
                                                <td><?php echo $donnees['vuesPageAlbumPhoto']; ?></td>
                                                <td><?php echo $donnees['dateDay']; ?></td>
                                            </tr>
                                            </tbody>
                                            <?php
                                        }
                                        ?>
                                        </table>
				                    </div>
                                </div>


                                    <br> <h4>Top 10 du nombre de personnes sur la page d'accueil par jour: </h4><br>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>N</th>
                                                    <th>Connexions</th>
                                                    <th>Accueil</th>
                                                    <th>Vues Album Photo</th>
                                                    <th>Date</th>
                                                </tr>
                                                </thead>
                                                <?php
                                                $compteur = 0;
                                                $top10 = returnTop10Connexion();
                                                while ($compteur < 10)
                                                {
                                                    ?>
                                                    <tbody>
                                                    <tr>
                                                        <td><?php echo $compteur+1; ?></td>
                                                        <td><?php echo $top10["nbConnexions"][$compteur]; ?></td>
                                                        <td><?php echo $top10["nbVuesIndex"][$compteur]; ?></td>
                                                        <td><?php echo $top10["vuesPageAlbumPhoto"][$compteur]; ?></td>
                                                        <td><?php echo $top10["dateDay"][$compteur]; ?></td>
                                                    </tr>
                                                    </tbody>
                                                <?php
                                                    $compteur++;
                                                }
                                                ?>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

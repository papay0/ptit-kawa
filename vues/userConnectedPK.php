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
                                    <h3 class="section-title">Voici la liste des gens sur le site :  </h3>
                                    <div class="alert alert-danger">
                                        <h3 class="section-title">Stats : </h3>
                                        <br>

                                        <?php
                                        //  Variables
                                        $NumberUserConnected = returnNumberUserOnWebSitePK();
                                        ?>
                                        
                                        <?php
                                            if ($NumberUserConnected == 0 || $NumberUserConnected == 1)
                                            {
                                                echo "Il y a ".$NumberUserConnected." personne actuellement sur le site.<br>";
                                            }
                                            else
                                            {
                                                echo "Il y a ".$NumberUserConnected." personnes actuellement sur le site.<br>";
                                            }
                                        ?>

                                    </div>
                                    <h4>Users connected :  </h4><br>
                                    <style>
                                        .monDiv{
                                            height: 700px;
                                            text-align: justify;
                                            border: 1px solid black;
                                            overflow: auto;
                                        }

                                    </style>
                                    <?php
                                    $userConnectedArray = returnUserConnected();
                                    ?>
                                    <div class="monDiv">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nom Prenom</th>
                                                    <th>Date - Heure</th>

                                                </tr>
                                                </thead>
                                                <?php

                                                $userConnectedArray = returnUserConnected();
                                                for ($i = 0; $i < $NumberUserConnected; $i++) {
                                                    ?>
                                                    <tbody>
                                                    <tr>
                                                        <td><?php echo $userConnectedArray["id"][$i];?></td>
                                                        <td><?php echo $userConnectedArray["prenomNom"][$i];?></td>
                                                        <td><?php echo $userConnectedArray["date_derniere_visite"][$i];?></td>
                                                    </tr>
                                                    </tbody>
                                                <?php
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
        </div>
</section>
